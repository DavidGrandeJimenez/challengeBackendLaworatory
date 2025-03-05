<?php
session_start();
require_once 'functions.php';
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Si no hay sesión, redirigir
if (empty($_SESSION["id_company"])) {
    header("Location: index.php");
    exit;
}

$connection = connect();

// Procesar logout
if (isset($_POST["logout"])) {
    session_destroy();
    mysqli_close($connection);
    header("Location: index.php");
    exit;
}

// Obtener datos de la tabla 'venta'
$array_rows = select_field($connection, $_SESSION["id_company"], "venta_empresa", "venta");

$total_amount = 0;
$tbody = "";
foreach ($array_rows as $row) {
    extract($row);
    $total_amount += $valor_total;
    $trow = "<tr>
        <td>$venta_empresa</td>
        <td>$num_factura</td>
        <td>$fecha_venta</td>
        <td>$nombre_articulo</td>
        <td>$cantidad_articulo</td>
        <td>$comprador</td>
        <td>$referencia_transaccion</td>
        <td>$valor_total</td>
    </tr>";
    $tbody .= $trow;
}    

$table = "
    <head>
        <link rel='stylesheet' href='styles.css'>
        </link>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>ID de tu empresa</th>
                    <th>Número de factura</th>
                    <th>Fecha de la venta</th>
                    <th>Nombre del artículo</th>
                    <th>Cantidad de artículo</th>
                    <th>Comprador</th>
                    <th>Referencia de transacción SWIFT</th>
                    <th>Valor total</th>
                </tr>
            </thead>
            <tbody>".$tbody."</tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td>
                        <h3>Total: ".$total_amount."€</h3>
                    </td>
                </tr>
            </tfoot>
        </table>
        </body>";
if (isset($_POST["pdf"])) {
    $dompdf = new Dompdf(['chroot' => __DIR__]);
    $dompdf->loadHtml($table);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('archivo.pdf', array("Attachment" => false));
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Ventas</title>
    <link rel="stylesheet" href="styles.css">
    </link>
</head>

<body>
    <header style="text-align: end;">
        <form action="report.php" method="POST">
            <input type="submit" name="logout" value="Logout" style="background-color: darkred; margin-right: 5rem;">
        </form>
    </header>
    <main>
        <h2>Tu informe del último trimestre de 2024:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID de tu empresa</th>
                    <th>Número de factura</th>
                    <th>Fecha de la venta</th>
                    <th>Nombre del artículo</th>
                    <th>Cantidad de artículo</th>
                    <th>Comprador</th>
                    <th>Referencia de transacción SWIFT</th>
                    <th>Valor total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    echo $tbody;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td>
                        <h3>Total: <?= $total_amount ?> €</h3>
                    </td>
                </tr>
            </tfoot>
        </table>
        <form action="report.php" method="POST" target="_blank">
            <button type="submit" name="pdf" value="true">Generar PDF</button>
        </form>
    </main>
</body>

</html>