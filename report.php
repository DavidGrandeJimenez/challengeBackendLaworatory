<?php
session_start();
require_once './functions.php';
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf; // Permitir utilizar los ficheros necesarios del domPdf

$connection = connect();


// Si no hay una sesión activa, se redirige al index
if (empty($_SESSION["id_company"])) {
    header("Location: ".$_SERVER['DOCUMENT_ROOT'].'/laworatory/index.php');
}

if (isset($_POST["logout"])) { // Si se pulsa el botón de logout, se cierra la sesión y se redirige al index
    session_destroy();
    mysqli_close($connection);
    header("Location:". $_SERVER['DOCUMENT_ROOT'].'/laworatory/index.php');
}




// Obtener datos de venta de la empresa correspondiente
$array_rows = select_field($connection, $_SESSION["id_company"], "venta_empresa", "venta");

$total_amount = 0;
$tbody = "";

if (isset($array_rows)) {
    foreach ($array_rows as $row) { //Obtener las filas de los registros de venta
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
            <td>".number_format($valor_total, 2)."</td>
        </tr>";
        $tbody .= $trow;
    }
} else {
    $tbody = "<tr>
        <td colspan='8'>No hay ventas registradas</td>
    </tr>";
}

// Crear la tabla con los datos de venta. Posible omisión si en el html se obtiene el código a partir del buffer de salida ob_start() y ob_get_clean();
$table = "
    <head>
        <link rel='stylesheet' href='./stylesTable.css'>
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
                    <th>Valor total venta</th>
                </tr>
            </thead>
            <tbody>" . $tbody . "</tbody>
            <tfoot>
                <tr>
                    <td colspan='5'></td>
                    <td><h3>Total: </h3></td>
                    <td colspan='2'>
                        <h3>".number_format($total_amount, 2)." €</h3>
                    </td>
                </tr>
            </tfoot>
        </table>
        </body>";

//Generación del PDF cuando se pulse el botón "Descargar PDF"       
if (isset($_POST["pdf"])) {
    //Tener acceso a la raíz del repositorio para encontrar y ejecutar el fichero stylesTable.css
    $dompdf = new Dompdf(['chroot' => __DIR__]);
    $dompdf->loadHtml($table);
    $dompdf->setPaper('A4', 'portrait'); //Página A4 en vertical
    $dompdf->render();
    //Permitir visualizar el pdf antes de descargarlo
    $dompdf->stream('informe.pdf', array("Attachment" => false));
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Ventas</title>
    <link rel="stylesheet" href="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/laworatory/css/stylesReport.css'; ?>">
    </link>
</head>

<body>
    <header style="text-align: end;">
        <form action="report.php" method="POST">
            <input type="submit" class="logout" name="logout" value="Logout" />
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
                    <th>Valor total venta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo $tbody;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan='5'></td>
                    <td><h3>Total: </h3></td>
                    <td colspan='2'>
                        <h3><?= number_format($total_amount, 2) ?> €</h3>
                    </td>
                </tr>
            </tfoot>
        </table>
        <form action="report.php" method="POST" target="_blank">
            <?php
            if ($total_amount != 0) {
                echo '<button class="pdf_button" type="submit" name="pdf" value="true">Descargar informe en PDF</button>';
            }
            ?>
        </form>
    </main>
</body>

</html>