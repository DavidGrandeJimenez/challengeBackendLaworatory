<?php
session_start();

require_once './functions.php';
require_once './login.html'; 

$con = connect();   //Crear conexión a la BDD

//Crear la BDD y las tablas necesarias en caso de que no existan todavía
create_db($con); 
create_table($con);

//Insertar los registros en las tablas
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
    'fecha_venta' => '2024-11-22',
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
    'fecha_venta' => '2024-11-15',
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
    'fecha_venta' => '2024-10-10',
    'nombre_articulo' => 'paneles de yeso',
    'cantidad_articulo' => 4000,
    'comprador' => 'Bouwbedrijf van der Meer',
    'referencia_transaccion' => '678901234567890STU',
    'valor_total' => 15000.00
));

insert($con, 'venta', array(
    'venta_empresa' => 1,
    'num_factura' => 'K-2024-12345',
    'fecha_venta' => '2024-12-20',
    'nombre_articulo' => 'aislante termico',
    'cantidad_articulo' => 3500,
    'comprador' => 'Ecological Insulations Ltd.',
    'referencia_transaccion' => '901234567890123VWX',
    'valor_total' => 20750.90
));


insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67890',  
    'fecha_venta' => '2024-10-15',  
    'nombre_articulo' => 'panel acústico',  
    'cantidad_articulo' => 4200,  
    'comprador' => 'Green Build Solutions Inc.',  
    'referencia_transaccion' => 'A12345678901234XYZ',  
    'valor_total' => 25999.75  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67891',  
    'fecha_venta' => '2024-11-05',  
    'nombre_articulo' => 'lana mineral',  
    'cantidad_articulo' => 3800,  
    'comprador' => 'EcoHome Solutions',  
    'referencia_transaccion' => 'B23456789012345XYZ',  
    'valor_total' => 23500.60  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67892',  
    'fecha_venta' => '2024-12-10',  
    'nombre_articulo' => 'placa de yeso',  
    'cantidad_articulo' => 5000,  
    'comprador' => 'Sustainable Interiors Ltd.',  
    'referencia_transaccion' => 'C34567890123456XYZ',  
    'valor_total' => 27899.99  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67893',  
    'fecha_venta' => '2024-10-22',  
    'nombre_articulo' => 'pintura ecológica',  
    'cantidad_articulo' => 3200,  
    'comprador' => 'Green Paint Co.',  
    'referencia_transaccion' => 'D45678901234567XYZ',  
    'valor_total' => 19875.45  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67894',  
    'fecha_venta' => '2024-11-18',  
    'nombre_articulo' => 'vidrio reciclado',  
    'cantidad_articulo' => 4100,  
    'comprador' => 'EcoGlass Industries',  
    'referencia_transaccion' => 'E56789012345678XYZ',  
    'valor_total' => 24599.30  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67895',  
    'fecha_venta' => '2024-12-25',  
    'nombre_articulo' => 'panel solar',  
    'cantidad_articulo' => 2800,  
    'comprador' => 'Solar Future Corp.',  
    'referencia_transaccion' => 'F67890123456789XYZ',  
    'valor_total' => 31200.80  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67896',  
    'fecha_venta' => '2024-10-30',  
    'nombre_articulo' => 'tejas ecológicas',  
    'cantidad_articulo' => 3700,  
    'comprador' => 'Sustainable Roofs Ltd.',  
    'referencia_transaccion' => 'G78901234567890XYZ',  
    'valor_total' => 22899.50  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67897',  
    'fecha_venta' => '2024-11-12',  
    'nombre_articulo' => 'madera reciclada',  
    'cantidad_articulo' => 4500,  
    'comprador' => 'Green Timber Co.',  
    'referencia_transaccion' => 'H89012345678901XYZ',  
    'valor_total' => 27550.70  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67898',  
    'fecha_venta' => '2024-12-05',  
    'nombre_articulo' => 'baldosas ecológicas',  
    'cantidad_articulo' => 3900,  
    'comprador' => 'EcoTiles & Co.',  
    'referencia_transaccion' => 'I90123456789012XYZ',  
    'valor_total' => 23999.95  
));

insert($con, 'venta', array(
    'venta_empresa' => 1,  
    'num_factura' => 'K-2024-67899',  
    'fecha_venta' => '2024-10-08',  
    'nombre_articulo' => 'aislante acústico',  
    'cantidad_articulo' => 3300,  
    'comprador' => 'Silent Home Solutions',  
    'referencia_transaccion' => 'J01234567890123XYZ',  
    'valor_total' => 21050.20  
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
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67900',  
    'fecha_venta' => '2024-10-12',  
    'nombre_articulo' => 'bloques térmicos',  
    'cantidad_articulo' => 4000,  
    'comprador' => 'EcoBuild Supplies',  
    'referencia_transaccion' => 'K12345678901234XYZ',  
    'valor_total' => 26500.40  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67901',  
    'fecha_venta' => '2024-11-22',  
    'nombre_articulo' => 'panel aislante',  
    'cantidad_articulo' => 3500,  
    'comprador' => 'Sustainable Homes Ltd.',  
    'referencia_transaccion' => 'L23456789012345XYZ',  
    'valor_total' => 24875.60  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67902',  
    'fecha_venta' => '2024-12-18',  
    'nombre_articulo' => 'madera laminada',  
    'cantidad_articulo' => 4200,  
    'comprador' => 'GreenWood Industries',  
    'referencia_transaccion' => 'M34567890123456XYZ',  
    'valor_total' => 27999.95  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67903',  
    'fecha_venta' => '2024-10-28',  
    'nombre_articulo' => 'hormigón ecológico',  
    'cantidad_articulo' => 5000,  
    'comprador' => 'EcoConcrete Solutions',  
    'referencia_transaccion' => 'N45678901234567XYZ',  
    'valor_total' => 30550.75  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67904',  
    'fecha_venta' => '2024-11-15',  
    'nombre_articulo' => 'tejas solares',  
    'cantidad_articulo' => 2900,  
    'comprador' => 'Solar Roofing Ltd.',  
    'referencia_transaccion' => 'O56789012345678XYZ',  
    'valor_total' => 31899.30  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67905',  
    'fecha_venta' => '2024-12-02',  
    'nombre_articulo' => 'aislante acústico',  
    'cantidad_articulo' => 3600,  
    'comprador' => 'Silent Homes Co.',  
    'referencia_transaccion' => 'P67890123456789XYZ',  
    'valor_total' => 23950.80  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67906',  
    'fecha_venta' => '2024-10-20',  
    'nombre_articulo' => 'placa de corcho',  
    'cantidad_articulo' => 3300,  
    'comprador' => 'Natural Insulation Ltd.',  
    'referencia_transaccion' => 'Q78901234567890XYZ',  
    'valor_total' => 22789.50  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67907',  
    'fecha_venta' => '2024-11-30',  
    'nombre_articulo' => 'vidrio reciclado',  
    'cantidad_articulo' => 3900,  
    'comprador' => 'EcoGlass Manufacturing',  
    'referencia_transaccion' => 'R89012345678901XYZ',  
    'valor_total' => 25250.70  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67908',  
    'fecha_venta' => '2024-12-08',  
    'nombre_articulo' => 'bloques de adobe',  
    'cantidad_articulo' => 4500,  
    'comprador' => 'Earth Builders Inc.',  
    'referencia_transaccion' => 'S90123456789012XYZ',  
    'valor_total' => 26599.95  
));

insert($con, 'venta', array(
    'venta_empresa' => 2,  
    'num_factura' => 'K-2024-67909',  
    'fecha_venta' => '2024-10-05',  
    'nombre_articulo' => 'pintura ecológica',  
    'cantidad_articulo' => 3100,  
    'comprador' => 'EcoFriendly Paints',  
    'referencia_transaccion' => 'T01234567890123XYZ',  
    'valor_total' => 19875.20  
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
    'num_factura' => 'A-2024-11223',
    'fecha_venta' => '2024-10-05',
    'nombre_articulo' => 'varilla de acero',
    'cantidad_articulo' => 1500,
    'comprador' => 'ArcelorMittal',
    'referencia_transaccion' => '1A2B3C4D5E6F7G8H9I',
    'valor_total' => 45000.90
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'B-2024-44556',
    'fecha_venta' => '2024-10-20',
    'nombre_articulo' => 'lámina galvanizada',
    'cantidad_articulo' => 1200,
    'comprador' => 'Nippon Steel',
    'referencia_transaccion' => '9H8G7F6E5D4C3B2A1Z',
    'valor_total' => 38000.55
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'C-2024-77889',
    'fecha_venta' => '2024-12-10',
    'nombre_articulo' => 'cemento Portland',
    'cantidad_articulo' => 2000,
    'comprador' => 'LafargeHolcim',
    'referencia_transaccion' => 'QWE123RTY456UIO789',
    'valor_total' => 55000.15
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'D-2024-00112',
    'fecha_venta' => '2024-12-25',
    'nombre_articulo' => 'arena sílice',
    'cantidad_articulo' => 1800,
    'comprador' => 'Sibelco',
    'referencia_transaccion' => 'POI987LKJ654MNB321',
    'valor_total' => 32000.80
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'E-2024-33445',
    'fecha_venta' => '2024-11-15',
    'nombre_articulo' => 'gravilla',
    'cantidad_articulo' => 2200,
    'comprador' => 'HeidelbergCement',
    'referencia_transaccion' => 'ZXC123VBN456ASD789',
    'valor_total' => 40000.30
));

insert($con, 'venta', array(
    'venta_empresa' => 3,
    'num_factura' => 'F-2024-66778',
    'fecha_venta' => '2024-12-30',
    'nombre_articulo' => 'bloque de hormigón',
    'cantidad_articulo' => 2500,
    'comprador' => 'CRH plc',
    'referencia_transaccion' => 'MNB987VXC654LKJ321',
    'valor_total' => 48000.65
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67910',  
    'fecha_venta' => '2024-10-14',  
    'nombre_articulo' => 'ladrillos ecológicos',  
    'cantidad_articulo' => 4200,  
    'comprador' => 'EcoBrick Solutions',  
    'referencia_transaccion' => 'U12345678901234XYZ',  
    'valor_total' => 27500.60  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67911',  
    'fecha_venta' => '2024-11-10',  
    'nombre_articulo' => 'pintura sin VOC',  
    'cantidad_articulo' => 3600,  
    'comprador' => 'Sustainable Coatings',  
    'referencia_transaccion' => 'V23456789012345XYZ',  
    'valor_total' => 22950.80  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67912',  
    'fecha_venta' => '2024-12-05',  
    'nombre_articulo' => 'tejas recicladas',  
    'cantidad_articulo' => 3900,  
    'comprador' => 'EcoRoof Materials',  
    'referencia_transaccion' => 'W34567890123456XYZ',  
    'valor_total' => 24999.90  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67913',  
    'fecha_venta' => '2024-10-27',  
    'nombre_articulo' => 'vidrio templado ecológico',  
    'cantidad_articulo' => 4100,  
    'comprador' => 'GreenGlass Ltd.',  
    'referencia_transaccion' => 'X45678901234567XYZ',  
    'valor_total' => 25999.99  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67914',  
    'fecha_venta' => '2024-11-23',  
    'nombre_articulo' => 'placas de fibra de coco',  
    'cantidad_articulo' => 2800,  
    'comprador' => 'Natural Interiors Inc.',  
    'referencia_transaccion' => 'Y56789012345678XYZ',  
    'valor_total' => 21899.70  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67915',  
    'fecha_venta' => '2024-12-15',  
    'nombre_articulo' => 'aislante de celulosa',  
    'cantidad_articulo' => 3500,  
    'comprador' => 'EcoInsulation Corp.',  
    'referencia_transaccion' => 'Z67890123456789XYZ',  
    'valor_total' => 23550.50  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67916',  
    'fecha_venta' => '2024-10-18',  
    'nombre_articulo' => 'paneles de bambú',  
    'cantidad_articulo' => 4400,  
    'comprador' => 'Sustainable Panels Ltd.',  
    'referencia_transaccion' => 'A78901234567890XYZ',  
    'valor_total' => 26999.30  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67917',  
    'fecha_venta' => '2024-11-08',  
    'nombre_articulo' => 'madera plástica reciclada',  
    'cantidad_articulo' => 4700,  
    'comprador' => 'Recycled Timber Co.',  
    'referencia_transaccion' => 'B89012345678901XYZ',  
    'valor_total' => 28999.95  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67918',  
    'fecha_venta' => '2024-12-20',  
    'nombre_articulo' => 'paneles de corcho',  
    'cantidad_articulo' => 3200,  
    'comprador' => 'EcoCork Solutions',  
    'referencia_transaccion' => 'C90123456789012XYZ',  
    'valor_total' => 21450.25  
));

insert($con, 'venta', array(
    'venta_empresa' => 3,  
    'num_factura' => 'K-2024-67919',  
    'fecha_venta' => '2024-10-30',  
    'nombre_articulo' => 'ladrillos de adobe',  
    'cantidad_articulo' => 5000,  
    'comprador' => 'AdobeBuild Industries',  
    'referencia_transaccion' => 'D01234567890123XYZ',  
    'valor_total' => 29999.80  
));

//Controlar recepción del formulario de login
if ((!empty($_POST['id_company'])) && isset($con)) { //Si se ha recibido el nombre del usuario
    
    //Se busca el ID de la empresa introducido en el login en la BDD
    $id = select_field($con, $_POST['id_company'], "id_empresa", "empresa");

    if ($id == -1) { //Si no se encuentra la empresa en la BDD...
        echo "<h3 class='error'>El ID introducido no coincide con ninguno de nuestra base de datos</h3>";

    } else { //Si se ha encontrado el usuario en la BDD...
        echo "<h3 class='welcome'>Bienvenido, ".$id[0]['nombre_empresa']."</h3><br/><p class='advice'>Será redireccionado en 2 segundos a su informe trimestral</p>";

        //Se establece el ID de la empresa como variable de sesión
        $_SESSION["id_company"] = $id[0]['id_empresa']; 
        mysqli_close($con);
    header("Refresh: 2; URL='./report.php");
    }
}
