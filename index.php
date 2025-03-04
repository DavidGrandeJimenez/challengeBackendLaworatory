<?php
//Página del inicio de sesión 
session_start(); //Se crea la sesión que se utilizará hasta que la persona le dé a logout en otras pantallas

require_once 'funciones.php'; //Se necesita obligatoriamente el archivo de las funciones

require_once 'login.html'; //Se necesita obligatoriamente ese código HTML, que contiene los inputs cuya información será procesada en este script

$con = connect();   //Se ejecuta la función de conectarnos a la BDD (y se guarda en una variable)

create_db($con); //Se crea la BDD "prueba_laworatory" en caso de que no existiese ya
create_table($con); //Se crean en la BDD las tablas necesarias (en caso de que no existiese ya)


if (!empty($_POST['id_company'])) { //Si se ha recibido el nombre del usuario ...
    $_SESSION["company"] = $_POST['id_company']; //Se establece ese nombre como variable de la sesión

    //Se busca el nombre introducido en la tabla de usuarios
    $id = select_field($con, $_POST['id_company'], "id_empresa", "empresa");

    if ($id == -1) { //En caso de que no se haya encontrado el nombre de usuario, se muestra un mensaje de error
        echo "<h3 style='color: darkred'>El ID introducido no coincide con ninguno de nuestra base de datos</h3>";
    } else { //Si se ha encontrado el usuario en la BDD...
        header("Location: report.php");
    }
}
