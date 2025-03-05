<?php
//Página del inicio de sesión 
session_start(); //Se crea la sesión que se utilizará hasta que la persona le dé a logout en otras pantallas

require_once 'functions.php'; //Se necesita obligatoriamente el archivo de las funciones

require_once 'login.html'; //Se necesita obligatoriamente ese código HTML, que contiene los inputs cuya información será procesada en este script


$con = connect();   //Se ejecuta la función de conectarnos a la BDD (y se guarda en una variable)

create_db($con); //Se crea la BDD "prueba_laworatory" en caso de que no existiese ya
create_table($con); //Se crean en la BDD las tablas necesarias (en caso de que no existiese ya)


insert($con, 'empresa', array(
    'nombre_empresa' => 'China Construction Eighth Engineering Division Corp., Ltd'
));
insert($con, 'empresa', array(
    'nombre_empresa' => 'Grup Heracles'
));
insert($con, 'empresa', array(
    'nombre_empresa' => 'Heidelberg Materials'
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'A-2024-35128',
    'fecha_venta' => '2024-10-26',
    'nombre_articulo' => 'barrotes de ferralla',
    'cantidad_articulo' => 5000,
    'comprador' => 'HBIS Group',
    'referencia_transaccion' => '951753842679138WAB',
    'valor_total' => 2439.86

));


insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'C-2024-78901',
    'fecha_venta' => '2024-12-01',
    'nombre_articulo' => 'tubos de acero',
    'cantidad_articulo' => 15000,
    'comprador' => 'Neuschwanstein Constructions GmbH',
    'referencia_transaccion' => '123456789012345XYZ',
    'valor_total' => 211800.75
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'D-2024-12345',
    'fecha_venta' => '2024-10-10',
    'nombre_articulo' => 'cemento portland',
    'cantidad_articulo' => 10000,
    'comprador' => 'Constructora Solida S.A.',
    'referencia_transaccion' => '987654321098765ABC',
    'valor_total' => 450000.00
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'E-2024-67890',
    'fecha_venta' => '2024-09-22',
    'nombre_articulo' => 'varillas de acero',
    'cantidad_articulo' => 7500,
    'comprador' => 'Edificaciones Modernas Ltd.',
    'referencia_transaccion' => '456789012345678DEF',
    'valor_total' => 30200.50
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'F-2024-13579',
    'fecha_venta' => '2024-11-08',
    'nombre_articulo' => 'ladrillos refractarios',
    'cantidad_articulo' => 2000,
    'comprador' => 'Industrias Termicas S.A.',
    'referencia_transaccion' => '654321098765432GHI',
    'valor_total' => 10500.75
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'G-2024-24680',
    'fecha_venta' => '2024-09-15',
    'nombre_articulo' => 'tuberia de PVC',
    'cantidad_articulo' => 15000,
    'comprador' => 'Infraestructuras Hidraulicas S.L.',
    'referencia_transaccion' => '789012345678901JKL',
    'valor_total' => 500800.20
));
insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'I-2024-54321',
    'fecha_venta' => '2024-12-15',
    'nombre_articulo' => 'paneles solares',
    'cantidad_articulo' => 500,
    'comprador' => 'Energias Renovables S.A.',
    'referencia_transaccion' => '012345678901234MNO',
    'valor_total' => 120500.00
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'H-2024-98765',
    'fecha_venta' => '2024-11-30',
    'nombre_articulo' => 'aislante térmico',
    'cantidad_articulo' => 3500,
    'comprador' => 'Aislamientos Ecologicos Ltd.',
    'referencia_transaccion' => '345678901234567PQR',
    'valor_total' => 20750.90
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'J-2024-11223',
    'fecha_venta' => '2024-09-10',
    'nombre_articulo' => 'paneles de yeso',
    'cantidad_articulo' => 4000,
    'comprador' => 'Bouwbedrijf van der Meer',
    'referencia_transaccion' => '678901234567890STU',
    'valor_total' => 15000.00
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'K-2024-12345',
    'fecha_venta' => '2024-09-20',
    'nombre_articulo' => 'aislante termico',
    'cantidad_articulo' => 3500,
    'comprador' => 'Ecological Insulations Ltd.',
    'referencia_transaccion' => '901234567890123VWX',
    'valor_total' => 20750.90
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'L-2024-54321',
    'fecha_venta' => '2024-10-15',
    'nombre_articulo' => 'aislante termico',
    'cantidad_articulo' => 5000,
    'comprador' => 'Koelner Dach GmbH',
    'referencia_transaccion' => '234567890123456YZA',
    'valor_total' => 40750.90
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'M-2024-67890',
    'fecha_venta' => '2024-11-20',
    'nombre_articulo' => 'paneles de yeso',
    'cantidad_articulo' => 4000,
    'comprador' => 'Bouwbedrijf van der Meer',
    'referencia_transaccion' => '567890123456789ABC',
    'valor_total' => 15000.00
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'N-2024-78901',
    'fecha_venta' => '2024-12-25',
    'nombre_articulo' => 'tuberia de PVC',
    'cantidad_articulo' => 15000,
    'comprador' => 'Infraestructuras Hidraulicas S.L.',
    'referencia_transaccion' => '890123456789012DEF',
    'valor_total' => 500800.20
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'O-2024-12345',
    'fecha_venta' => '2024-10-05',
    'nombre_articulo' => 'cemento portland',
    'cantidad_articulo' => 10000,
    'comprador' => 'Bouwbedrijf van der Meer',
    'referencia_transaccion' => '6541321654123165PQR',
    'valor_total' => 450000.00
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'P-2024-67890',
    'fecha_venta' => '2024-11-10',
    'nombre_articulo' => 'varillas de acero',
    'cantidad_articulo' => 7500,
    'comprador' => 'Edificaciones Modernas Ltd.',
    'referencia_transaccion' => '987654321098765STU',
    'valor_total' => 30200.50
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'Q-2024-13579',
    'fecha_venta' => '2024-12-08',
    'nombre_articulo' => 'ladrillos refractarios',
    'cantidad_articulo' => 2000,
    'comprador' => 'Industrias Termicas S.A.',
    'referencia_transaccion' => '123456789012345GHI',
    'valor_total' => 10500.75
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'R-2024-24680',
    'fecha_venta' => '2024-10-15',
    'nombre_articulo' => 'tuberia de PVC',
    'cantidad_articulo' => 15000,
    'comprador' => 'Infraestructuras Hidraulicas S.L.',
    'referencia_transaccion' => '234567890123456JKL',
    'valor_total' => 500800.20
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'S-2024-54321',
    'fecha_venta' => '2024-11-15',
    'nombre_articulo' => 'paneles solares',
    'cantidad_articulo' => 500,
    'comprador' => 'Energias Renovables S.A.',
    'referencia_transaccion' => '345678901234567MNO',
    'valor_total' => 120500.00
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'T-2024-98765',
    'fecha_venta' => '2024-12-30',
    'nombre_articulo' => 'aislante termico',
    'cantidad_articulo' => 3500,
    'comprador' => 'Aislamientos Ecologicos Ltd.',
    'referencia_transaccion' => '456789012345678PQR',
    'valor_total' => 20750.90
));

insert($con, 'venta', array(
    'venta_empresa' => 2,
    'num_factura' => 'U-2024-11223',
    'fecha_venta' => '2024-10-20',
    'nombre_articulo' => 'paneles de yeso',
    'cantidad_articulo' => 4000,
    'comprador' => 'Bouwbedrijf van der Meer',
    'referencia_transaccion' => '567890123456789STU',
    'valor_total' => 15000.00
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'W-2024-84964',
    'fecha_venta' => '2024-10-29',
    'nombre_articulo' => 'hormigón armado',
    'cantidad_articulo' => 120,
    'comprador' => 'HBIS Group',
    'referencia_transaccion' => '842697979251375PWT',
    'valor_total' => 50000.12

));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'X-2024-12345',
    'fecha_venta' => '2024-11-15',
    'nombre_articulo' => 'acero inoxidable',
    'cantidad_articulo' => 2500,
    'comprador' => 'ThyssenKrupp AG',
    'referencia_transaccion' => '976464643125197XZQ',
    'valor_total' => 75000.50
));


insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'Y-2024-54321',
    'fecha_venta' => '2024-12-01',
    'nombre_articulo' => 'alambre de cobre',
    'cantidad_articulo' => 1000,
    'comprador' => 'Rio Tinto',
    'referencia_transaccion' => '012340987504681YXZ',
    'valor_total' => 35000.75
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'Z-2024-98765',
    'fecha_venta' => '2024-12-10',
    'nombre_articulo' => 'tubería de PVC',
    'cantidad_articulo' => 800,
    'comprador' => 'Wavin Group',
    'referencia_transaccion' => 'XYZ789UVW123ABC456',
    'valor_total' => 28000.25
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'A-2025-11223',
    'fecha_venta' => '2025-01-05',
    'nombre_articulo' => 'varilla de acero',
    'cantidad_articulo' => 1500,
    'comprador' => 'ArcelorMittal',
    'referencia_transaccion' => '1A2B3C4D5E6F7G8H9I',
    'valor_total' => 45000.90
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'B-2025-44556',
    'fecha_venta' => '2025-01-20',
    'nombre_articulo' => 'lámina galvanizada',
    'cantidad_articulo' => 1200,
    'comprador' => 'Nippon Steel',
    'referencia_transaccion' => '9H8G7F6E5D4C3B2A1Z',
    'valor_total' => 38000.55
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'C-2025-77889',
    'fecha_venta' => '2025-02-10',
    'nombre_articulo' => 'cemento Portland',
    'cantidad_articulo' => 2000,
    'comprador' => 'LafargeHolcim',
    'referencia_transaccion' => 'QWE123RTY456UIO789',
    'valor_total' => 55000.15
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'D-2025-00112',
    'fecha_venta' => '2025-02-25',
    'nombre_articulo' => 'arena sílice',
    'cantidad_articulo' => 1800,
    'comprador' => 'Sibelco',
    'referencia_transaccion' => 'POI987LKJ654MNB321',
    'valor_total' => 32000.80
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'E-2025-33445',
    'fecha_venta' => '2025-03-15',
    'nombre_articulo' => 'gravilla',
    'cantidad_articulo' => 2200,
    'comprador' => 'HeidelbergCement',
    'referencia_transaccion' => 'ZXC123VBN456ASD789',
    'valor_total' => 40000.30
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'F-2025-66778',
    'fecha_venta' => '2025-03-30',
    'nombre_articulo' => 'bloque de hormigón',
    'cantidad_articulo' => 2500,
    'comprador' => 'CRH plc',
    'referencia_transaccion' => 'MNB987VXC654LKJ321',
    'valor_total' => 48000.65
));


if (!empty($_POST['id_company'])) { //Si se ha recibido el nombre del usuario ...
    

    //Se busca el nombre introducido en la tabla de usuarios
    $id = select_field($con, $_POST['id_company'], "id_empresa", "empresa", true);

    if ($id == -1) { //En caso de que no se haya encontrado el nombre de usuario, se muestra un mensaje de error
        echo "<h3 style='color: darkred'>El ID introducido no coincide con ninguno de nuestra base de datos</h3>";
    } else { //Si se ha encontrado el usuario en la BDD...
        echo "<h3 style='color: blue'>Bienvenido, ".$id[0]['nombre_empresa']."</h3><br/><p>Será redireccionado en 2 segundos a su informe trimestral</p>";
        $_SESSION["id_company"] = $id[0]['id_empresa']; //Se establece el ID de la empresa como variable de la sesión
        header("Refresh: 2; URL=report.php");
    }
}
