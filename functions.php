<?php
//Archivo que almacena todas las funciones utilizados por el resto de archivos .php
$credentials = 'server_credentials.txt';

if (file_exists($credentials)) {
    require_once $credentials; //A modo de simulación, se ha guardado las claves de acceso al servidor en un archivo ajeno al actual. Normalmente estaría guardado de un modo seguro o encriptado. Pero para este challenge simplemente se ha guardado en un archivo .txt conservando el código php, por lo que solo hace falta importarlo.
}

//Función de conexión a la base de datos a partir de las credenciales de acceso. Se devuelve el objeto SQL de dicha conexión
function connect()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Habilita excepciones
    try {
        if (isset($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"])) {
            $con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]);
            return $con;
        } else {
            $con = null;
            echo "<p id='error'>Ha ocurrido un problema con el servidor. Sentimos las molestias.<p/>";
            return $con;
        }
    } catch (mysqli_sql_exception $e) {
        $con = null;
        $codigo_error = $e->getCode();
        echo "<p id='error'>Ha ocurrido un problema con el servidor: Código de error $codigo_error. Sentimos las molestias.<p/>";
        return $con;
    }
}

//Función de crear la base de datos en caso de que no existiese antes
function create_db($con)
{
    if (isset($con)) {
        mysqli_query($con, "CREATE DATABASE IF NOT EXISTS challenge_laworatory");
    }
}


function create_table($con)
{
    if (isset($con)) {
        mysqli_select_db($con, "challenge_laworatory");
        mysqli_query($con, "CREATE TABLE IF NOT EXISTS empresa(id_empresa int PRIMARY KEY auto_increment, nombre_empresa varchar(255) UNIQUE NOT NULL)"); //Se establece la primary key y el resto de campos de la tabla empresa.

        //Creación de la tabla venta. Se crean las claves foráneas para que puedan ser eliminadas automáticamente cuando su clave primaria de la tabla empresa sea eliminada.
        mysqli_query($con, "CREATE TABLE IF NOT EXISTS venta(id_venta int PRIMARY KEY auto_increment, venta_empresa int, num_factura varchar(20) NOT NULL, fecha_venta date NOT NULL, nombre_articulo varchar(255), cantidad_articulo int, comprador varchar(255), referencia_transaccion varchar(50) UNIQUE NOT NULL, valor_total decimal(12, 2) NOT NULL, 
        CONSTRAINT fk_usuario FOREIGN KEY (venta_empresa) REFERENCES empresa(id_empresa) ON DELETE CASCADE)");
    }
}
/*
//Función para seleccionar y devolver todos los datos de la tabla pasada por parámetro
function select_all($con, $table, $get_primary)
{
    if (isset($con)) {
        //Se selecciona la BDD por si acaso
        mysqli_select_db($con, "challenge_laworatory");
        $select_column = '*';

        if (!$get_primary) {
            //Se ejecuta el select de los valores deseados de la tabla correspondiente utilizando stmt.
            $stmt2 = mysqli_prepare($con, "SHOW COLUMNS FROM " . $table);
            mysqli_stmt_execute($stmt2);
            $result_col = mysqli_stmt_get_result($stmt2);

            $columns_names = [];
            $counter = 0;
            while ($col = mysqli_fetch_assoc($result_col)) {
                if ($counter > 0) { // Omitir la primera columna
                    $columns_names[] = $col['Field'];
                }
                $counter++;
            }
            $select_column = implode(", ", $columns_names);
            mysqli_stmt_close($stmt2);
        }

        $stmt = mysqli_prepare($con, "SELECT " . $select_column . " FROM " . $table);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); //Se guarda el resultado en una variable

        //Se guarda el resultado como un array asociativo y se devuelve
        $rows = array();
        if (mysqli_num_rows($result) == 0) {
            return -1; //Si no se ha encontrado ningún dato en la tabla (nº de filas es 0) se devuelve un -1
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            mysqli_stmt_close($stmt);
            return $rows;
        }
    }
}*/

//Función para seleccionar y devolver los datos específicos de la tabla deseado (se utiliza un WHERE en la consulta)
function select_field($con, $value_to_check, $field, $table, $all)
{
    if (isset($con)) {
        mysqli_select_db($con, "challenge_laworatory"); //Se selecciona la BDD por si acaso

        $select_goal = '';

        $data_type = substr((string)gettype($value_to_check), 0, 1); //Se detecta el tipo de variable del valor del campo dle WHERE y se guarda como string solo la primera letra de dicho tipo de variable.

        $select_goal = $all ? '*' : $field;
        try {

            //Se buscan los valores deseados en la tabla correspondiente utilizando stmt.
            $stmt = mysqli_prepare($con, "SELECT $select_goal FROM $table WHERE $field = ?;");
            mysqli_stmt_bind_param($stmt, $data_type, $value_to_check);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt); //Se guarda el resultado en una variable

            //Se guarda el resultado como un array asociativo y se devuelve
            if (mysqli_num_rows($result) == 0) {
                return -1; //Si no se ha encontrado ningún dato en la tabla (nº de filas es 0) se devuelve un -1
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                }
                mysqli_stmt_close($stmt);
                return $rows;
            }
        } catch (mysqli_sql_exception $e) {
            $codigo_error = $e->getCode();
            echo "<p id='error'>Error al seleccionar y extraer los datos: Código de error $codigo_error. Sentimos las molestias.<p/>";
        }
    }
}

function insert($con, $table, $array)
{
    if (isset($con)) {
        //$select = select_all($con, $table, 0);
        /*if (compare_equals($select, $array)) {
        } else {*/
            //Se separa las claves y valores del array asociativo en arrays diferentes. Si es necesario utilizarlos como string, se utiliza "implode".
            $keys = array_keys($array);
            $keys = implode(", ", $keys);
            $values = array_values($array);

            //Como es necesario utilizar tantos carácteres "?" como valores que sustituirlos, se utilizan los siguientes comandos.
            $question_marks = array_fill(0, count($values), "?");
            $question_marks = implode(", ", $question_marks);

            //Se selecciona la BDD por si acaso
            mysqli_select_db($con, "challenge_laworatory");

            //Es necesario incluir el tipo de variable de cada uno de los valores que se van a insertar en la tabla, así que recorre el array de valores, se extrae el primer carácter del tipo de variable de cada valor y se concatenan en un mismo string. 
            $types = "";
            foreach ($values as $value) {
                $type = substr((string)gettype($value), 0, 1);
                $types = $types . $type;
            }

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            try {
                //Se insertan los valores deseados en la tabla correspondiente utilizando stmt.
                $stmt = mysqli_prepare($con, "INSERT INTO $table($keys) VALUES($question_marks)");
                mysqli_stmt_bind_param($stmt, $types, ...$values);
                mysqli_stmt_execute($stmt);
            } catch (mysqli_sql_exception $e) {
                $codigo_error = $e->getCode();
                if ($codigo_error != 1062) {
                    echo "<p id='error'>Error al seleccionar y extraer los datos: Código de error $codigo_error. Sentimos las molestias.<p/>";
                }
            }
        //}
    }
}
/*
function compare_equals($array_assoc, $array)
{
    foreach ($array as $key => &$value) {
        if (gettype($value) === 'double') {
            $value = strval($value);
        }
    }
    if ($array_assoc !== -1) {
        foreach ($array_assoc as $each_array) {
            if ($each_array === $array) {
                echo 'son iguales';
                return true;
            }
        }
    }
    return false;
}*/
