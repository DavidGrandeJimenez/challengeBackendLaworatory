<?php

session_start(); //Se sigue con la session
require 'functions.php';

//Se importan estilos
echo '<style>';
include 'styles.css';
echo '</style>';

//Si en la sesión no está guardado el ID de la empresa, no se muestra contenido
if (!empty($_SESSION["id_company"])) {
    $connection = connect();
    //Botón de Logout para cerrar la sesión y redirigir de vuelta al index
    echo "<br>
            <form action='report.php' method='POST' style='text-align: end'>
                <input type='submit' name='logout' value='Logout' style='background-color: darkred; margin-right: 5rem' >
            </form>";

    if (!empty($_POST["logout"])) {
        session_destroy();
        mysqli_close($connection);
        header("Location: index.php");
    }


    //Se hace un select para obtener todas las reservas del ID de usuario
    $array_rows = select_field($connection, $_SESSION["id_company"], "venta_empresa", "venta");

    if ($array_rows == -1) { //En caso de que no se encuentre ninguna reserva a su nombre...
        echo "<h2 style='color: darkred'>Parece que no tienes ninguna reserva :(</h2>"; //Aviso de que no hay reservas

        //Y se establece una reserva que en realidad no tiene datos
        $array_reserva = [["id_reserva" => "No hay datos", "reserva_usuario" => "No hay datos", "reserva_pista" => "No hay datos", "turno" => "No hay datos"]];
    }

    //Formulario de la tabla de las reservas. En caso de que no hubiese, simplemente pondría "no hay datos" en cada casilla. 
    echo "<h2>Tu informe del último trimestre de 2024: </h2>
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
            <tbody>";

    //Se obtienen los datos de cada reserva para ponerlos, mediante el bucle, en las filas de la tabla, incluído los checkbox para seleccionar las reservas a eliminar.
    $total_amount = 0;

    foreach ($array_rows as $row) {
        extract($row);
        $total_amount += $valor_total;
        echo "<tr>
        <td>$venta_empresa</td>
        <td>$num_factura</td>
        <td>$fecha_venta</td>
        <td>$nombre_articulo</td>
        <td>$cantidad_articulo</td>
        <td>$comprador</td>
        <td>$referencia_transaccion</td>
        <td>$valor_total</td>
        </tr>";
    } //En la parte de debajo de la tabla se encuentran (siempre y cuando haya alguna reserva en la tabla) el botón de eliminar (o anular reservar). 
    echo "</tbody>
        </table>
        <tfoot>
        <tr><td><h3>Total: $total_amount €</h3></td></tr>
        </tfoot> 
        </table>";
}
