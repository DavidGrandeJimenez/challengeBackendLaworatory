<?php
//Página del inicio de sesión 
session_start(); //Se crea la sesión que se utilizará hasta que la persona le dé a logout en otras pantallas

require 'functions.php'; //Se necesita obligatoriamente el archivo de las funciones

require_once 'login.html'; //Se necesita obligatoriamente ese código HTML, que contiene los inputs cuya información será procesada en este script

$con = connect();   //Se ejecuta la función de conectarnos a la BDD (y se guarda en una variable)

create_db($con); //Se crea la BDD "prueba_laworatory" en caso de que no existiese ya
create_table($con); //Se crean en la BDD las tablas necesarias (en caso de que no existiese ya)

/*
$company_info = array(
    "nombre_empresa" => 'Vodafone'
);

insert($con, 'empresa', $company_info); 
*/

/*
$company_info2 = array(
    "venta_empresa" => 1,
    "num_factura" => 'A-2024-01',
    "fecha_venta" => '2024-08-12',
    "nombre_articulo" => 'Reloj',
    "cantidad_articulo" => 5,
    "comprador" => 'Tiananmen S.A.',
    "valor_total" => 517.68,
);

insert($con, 'venta', $company_info2); 
*/



$company_info = array(
    "venta_empresa" => 1,
    "num_factura" => 'C-2024-01',
    "fecha_venta" => '2025-08-12',
    "nombre_articulo" => 'RelojS',
    "cantidad_articulo" => 10,
    "comprador" => 'Shangai S.A.',
    "valor_total" => 1200.68,
);

$company_info2 = array(
    "nombre_empresa" => 'Vodafone'
);

insert($con, 'venta', $company_info);


if (!empty($_POST['id_company'])) { //Si se ha recibido el nombre del usuario ...
    $_SESSION["company"] = $_POST['id_company']; //Se establece ese nombre como variable de la sesión

    //Se busca el nombre introducido en la tabla de usuarios
    $id = select_field($con, $_POST['id_company'], "id_empresa", "empresa");

    if ($id == -1) { //En caso de que no se haya encontrado el nombre de usuario, se muestra un mensaje de error
        echo "<h3 style='color: darkred'>El ID introducido no coincide con ninguno de nuestra base de datos</h3>";
    } else { //Si se ha encontrado el usuario en la BDD...
        echo "estás dentro, " . $id;
        //header("Location: report.php");
    }
}
