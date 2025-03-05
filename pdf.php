<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Generar el contenido de los párrafos
$parrafo1 = "Este es el primer párrafo generado con PHP.";
$parrafo2 = "Este es el segundo párrafo generado con PHP.";
$parrafo3 = "Este es el primer párrafo generado con PHP.";
$parrafo4 = "Este es el segundo párrafo generado con PHP.";
$parrafo5 = "Este es el primer párrafo generado con PHP.";
$parrafo6 = "Este es el segundo párrafo generado con PHP.";

if (isset($_POST['generar_pdf'])) {
    // Generar el contenido HTML para el PDF
    $html = '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejemplo PDF con dompdf</title>
    </head>
    <body>
        <h1>Ejemplo de PDF con dompdf</h1>';

    $html .= "<p>$parrafo1</p>";
    $html .= "<p>$parrafo2</p>";
    $html .= "<p>Este es un párrafo HTML normal.</p>";
    $html .= '</body></html>';

    // Generar el PDF
    $dompdf = new Dompdf(['chroot' => __DIR__]);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('ejemplo.pdf', array("Attachment" => true));

    exit; // Detener la ejecución del script después de generar el PDF
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar PDF con dompdf</title>
</head>
<body>
    <h1>Generar PDF con dompdf</h1>

    <?php
        // Mostrar los párrafos en la página web
        echo "<p>$parrafo1</p>";
        echo "<p>$parrafo2</p>";
        echo "<p>$parrafo2</p>";
        echo "<p>$parrafo2</p>";
        echo "<p>$parrafo2</p>";
        echo "<p>$parrafo2</p>";
        echo "<p>$parrafo2</p>";
        echo "<p>$parrafo2</p>";
        echo "<p>$parrafo2</p>";
        echo "<p>$parrafo2</p>";
    ?>

    <p>Este es un párrafo HTML normal.</p>

    <form action="pdf.php" method="POST">
    <input type="hidden" name="generar_pdf" value="1">
    <button type="submit">Generar PDF</button>
</form>
</body>
</html>