<?php
//Archivo que almacena todas las funciones utilizados por el resto de archivos .php

require_once 'server_credentials.txt'; //A modo de simulación, se ha guardado las claves de acceso al servidor en un archivo ajeno al actual. Normalmente estaría guardado de un modo seguro o encriptado. Pero para este challenge simplemente se ha guardado en un archivo .txt conservando el código php, por lo que solo hace falta importarlo.

//Función de conexión a la base de datos a partir de las credenciales de acceso. Se devuelve el objeto SQL de dicha conexión
function connect(){ 
    $con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]) or die("Ha ocurrido un error con la BD");
    return $con;
}

//Función de crear la base de datos en caso de que no existiese antes
function create_db($con){
    mysqli_query($con, "CREATE DATABASE IF NOT EXISTS prueba_laworatory;");
    mysqli_select_db($con, "prueba_laworatory");
}

//Función de crear las tablas requeridas de la BDD en caso de que no existiesen antes
function create_table($con){
    mysqli_query($con, "CREATE TABLE IF NOT EXISTS empresa(id_empresa int PRIMARY KEY auto_increment, nombre_empresa varchar(255)"); //Se establece la primary key y el resto de campos de la tabla empresa.

    //Creación de la tabla venta. Se crean las claves foráneas para que puedan ser eliminadas automáticamente cuando su clave primaria de la tabla empresa sea eliminada.
    mysqli_query($con, "CREATE TABLE IF NOT EXISTS venta(id_venta int PRIMARY KEY auto_increment, venta_empresa int, num_factura varchar(20), fecha_venta date, nombre_articulo varchar(255), cantidad_articulo int, comprador varchar(255), valor_total decimal(12, 2), 
    CONSTRAINT fk_usuario FOREIGN KEY (venta_empresa) REFERENCES empresa(id_empresa) ON DELETE CASCADE)");
}

//Función para seleccionar y devolver todos los datos de la tabla pasada por parámetro
function select_all($con, $table) {
    //Se selecciona la BDD por si acaso
    mysqli_select_db($con, "prueba_laworatory");
    
    //Se ejecuta el select de los valores deseados de la tabla correspondiente utilizando stmt.
    $stmt = mysqli_prepare($con, "SELECT * FROM $table");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); //Se guarda el resultado en una variable

    //Se guarda el resultado como un array asociativo y se devuelve
    $filas = array();
    if (mysqli_num_rows($result) == 0) {
        return -1; //Si no se ha encontrado ningún dato en la tabla (nº de filas es 0) se devuelve un -1
    } else {
        while ($fila = mysqli_fetch_assoc($result)) {
            $filas[] = $fila;
        }
        mysqli_stmt_close($stmt);
        return $filas;
    }
}

//Función para seleccionar y devolver los datos específicos de la tabla deseado (se utiliza un WHERE en la consulta)
function select_field($con, $id, $field, $table){
    
    mysqli_select_db($con, "prueba_laworatory"); //Se selecciona la BDD por si acaso

    $tipo_variable = substr((string)gettype($id), 0, 1); //Se detecta el tipo de variable del valor que se quiere devolver y se guarda como string solo la primera letra de dicho tipo de variable.

    //Se buscan los valores deseados en la tabla correspondiente utilizando stmt.
    $stmt = mysqli_prepare($con, "SELECT $field FROM $table WHERE $field = ?;");
    mysqli_stmt_bind_param($stmt, $tipo_variable, $valor);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); //Se guarda el resultado en una variable

    //Se guarda el resultado como un array asociativo y se devuelve
    if (mysqli_num_rows($result) == 0) {
        return -1; //Si no se ha encontrado ningún dato en la tabla (nº de filas es 0) se devuelve un -1
    } else {
        while ($fila = mysqli_fetch_assoc($result)) {
            $filas[] = $fila;
        }
        mysqli_stmt_close($stmt);
        return $filas;
    }
}

?>