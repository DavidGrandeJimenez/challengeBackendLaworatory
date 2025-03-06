<?php
$credentials = './server_credentials.txt';

if (file_exists($credentials)) {
    require_once $credentials; //A modo de simulación y seguridad, se han guardado las claves de acceso al servidor en un archivo ajeno al actual.
}

//Funciones relacionadas con la BDD y utilzadas en el resto del proyecto.

function connect()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Habilitar excepciones
    try {
        //Encontrar las variables de conexión al servidor
        if (isset($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"])) {
            $con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]);
            return $con;
        } else {
            $con = null;
            echo "<p class='error'>Ha ocurrido un problema con el servidor. Sentimos las molestias.<p/>";
            return $con;
        }
    } catch (mysqli_sql_exception $e) { //Controlar error de conexión
        $con = null;
        $codigo_error = $e->getCode();
        echo "<p class='error'>Ha ocurrido un problema con el servidor: Código de error $codigo_error. Sentimos las molestias.<p/>";
        return $con;
    }
}

function create_db($con)
{
    if (isset($con)) { //Si se recibe la conexión a la BDD
        mysqli_query($con, "CREATE DATABASE IF NOT EXISTS challenge_laworatory");
    }
}


function create_table($con)
{
    if (isset($con)) {  //Si se recibe la conexión a la BDD
        mysqli_select_db($con, "challenge_laworatory");

        //Crear tabla empresa si no existe ya
        mysqli_query($con, "CREATE TABLE IF NOT EXISTS empresa(id_empresa int PRIMARY KEY auto_increment, nombre_empresa varchar(255) UNIQUE NOT NULL)");

        //Crear tabla venta si no existe ya
        mysqli_query($con, "CREATE TABLE IF NOT EXISTS venta(id_venta int PRIMARY KEY auto_increment, venta_empresa int, num_factura varchar(20) NOT NULL, fecha_venta date NOT NULL, nombre_articulo varchar(255), cantidad_articulo int, comprador varchar(255), referencia_transaccion varchar(50) UNIQUE NOT NULL, valor_total decimal(12, 2) NOT NULL, 
        CONSTRAINT fk_usuario FOREIGN KEY (venta_empresa) REFERENCES empresa(id_empresa) ON DELETE CASCADE)");
    }
}

//Función para seleccionar y devolver los datos de la tabla deseada (se utiliza un WHERE en la consulta)
function select_field($con, $value_to_check, $field, $table)
{
    if (isset($con)) {
        mysqli_select_db($con, "challenge_laworatory");

        //Para la consulta con statement: detectar el tipo de variable del valor del WHERE y se guarda como string solo la primera letra del tipo de variable.
        $data_type = substr((string)gettype($value_to_check), 0, 1);

        $rows = array();

        try {

            $stmt = mysqli_prepare($con, "SELECT * FROM $table WHERE $field = ?;");
            mysqli_stmt_bind_param($stmt, $data_type, $value_to_check);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 0) {
                //Si no se ha encontrado ningún dato en la tabla (nº de filas es 0) se devuelve un -1
                return -1;
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                }
                mysqli_stmt_close($stmt);
                return $rows; //Se devuelve el array asociativo de los datos
            }
        } catch (mysqli_sql_exception $e) {
            $codigo_error = $e->getCode();
            echo "<p class='error'>Error al seleccionar y extraer los datos: Código de error $codigo_error. Sentimos las molestias.<p/>";
        }
    }
}

function insert($con, $table, $array)
{
    if (isset($con)) {
        //Separar claves y valores del array asociativo a insertar por statement
        $keys = array_keys($array);
        $keys = implode(", ", $keys);
        $values = array_values($array);

        //Obtención de los signos de interrogación
        $question_marks = array_fill(0, count($values), "?");
        $question_marks = implode(", ", $question_marks);

        mysqli_select_db($con, "challenge_laworatory");

        //Obtener los tipos de variable de los valores a insertar
        $types = "";
        foreach ($values as $value) {
            $type = substr((string)gettype($value), 0, 1); //Primera letra del tipo de variable
            $types = $types . $type;
        }

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $stmt = mysqli_prepare($con, "INSERT INTO $table($keys) VALUES($question_marks)");
            mysqli_stmt_bind_param($stmt, $types, ...$values);
            mysqli_stmt_execute($stmt);
        } catch (mysqli_sql_exception $e) {
            $codigo_error = $e->getCode();

            //Evitar que se muestre el error de clave duplicada si se intenta insertar un registro ya existente
            if ($codigo_error != 1062) {
                echo "<p class='error'>Error al seleccionar y extraer los datos: Código de error $codigo_error. Sentimos las molestias.<p/>";
            }
        }
    }
}
