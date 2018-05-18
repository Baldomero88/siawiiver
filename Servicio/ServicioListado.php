<?php
    require_once('cServicioController.php');
    $oServicioController = new cServicioController;
	$oEmpleadoServicio = $oServicioController->ObtenerEmpleadoServicio();
    $oClienteServicio = $oServicioController->ObtenerClienteServicio();

    //Imprime un Array u objeto
    //echo '<pre>';
    //print_r($oListadoCliente);
    //echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarServicio'])) {
            $nId_Servicio = $_POST['nId_Servicio'];

            $oListadoServicioPorId = $oServicioController->obtenerListadoServicioPorId($nId_Servicio);

            echo '<form action="ServicioRegistro.php" method="post">';
                echo '<select name="nId_Empleado">';
                for ($i = 0; $i < count($oEmpleadoServicio); $i++) {
                    echo '<option value='.$oEmpleadoServicio[$i]['Id_Empleado'].'>'.$oEmpleadoServicio[$i]['NombreEmpleado'].'</option>';
                }
                echo '<select name="nId_Cliente">';
                for ($i = 0; $i < count($oClienteServicio); $i++) {
                    echo '<option value='.$oClienteServicio[$i]['Id_Cliente'].'>'.$oClienteServicio[$i]['NombreCliente'].'</option>';
                }
                echo '</select>';

                echo '<input type="hidden" name="Id_Servicio" value='.$oListadoServicioPorId[0]['Id_Servicio'].' >';

                echo '<input type="text" name="sTipoPaquete" value='.$oListadoClientePorId[0]['TipoPaquete'].' placeholder="sTipoPaquete">';
                echo '<input type="text" name="nPrecioPaquete" value='.$oListadoClientePorId[0]['PrecioPaquete'].' placeholder="nPrecioPaquete">';
                echo '<input type="text" name="sDescripcionPaquete" value='.$oListadoClientePorId[0]['DescripcionPaquete'].' placeholder="sDescripcionPaquete">';
                echo '<input type="text" name="sTipoServicio" value='.$oListadoClientePorId[0]['TipoServicio'].' placeholder="sTipoServicio">';
                echo '<input type="text" name="nPrecioServicio" value='.$oListadoClientePorId[0]['PrecioServicio'].' placeholder="nPrecioServicio">';
                echo '<input type="text" name="sDescripcionServicio" value='.$oListadoClientePorId[0]['DescripcionServicio'].' placeholder="sDescripcionServicio">';
                echo '<input type="text" name="sFormaPago" value='.$oListadoClientePorId[0]['FormaPago'].' placeholder="sFormaPago">';
                echo '<input type="text" name="sFechaServicio" value='.$oListadoClientePorId[0]['FechaServicio'].' placeholder="sFechaServicio">';
                echo '<input type="text" name="sBajaServicio" value='.$oListadoClientePorId[0]['BajaServicio'].' placeholder="sBajaServicio">';
                echo '<input type="text" name="sEstadoServicio" value='.$oListadoClientePorId[0]['EstadoServicio'].' placeholder="sEstadoServicio">';

                echo '<input type="submit" name="modificarServicio" value="Modificar Servicio">';
            echo '</form>';
        }

        // Condicion que se ejecuta si se presiona el boton de Eliminar
        elseif (isset($_POST['eliminarServicio'])) {
            $nId_Servicio = $_POST['nId_Servicio'];

            $oEliminarServicioPorId = $oServicioController->eliminarServicioPorId($nId_Servicio);
        }

        // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
        else{
    ?>
            <!-- Se muestra la tabla de clientes-->
            <table border="1">
                <tr>
                    <td>EMPLEADO</td>
                    <td>CLIENTE</td>
                    <td>TIPO DE PAQUETE</td>
                    <td>PRECIO PAQUETE</td>
                    <td>DESCRIPCION DE PAQUETE</td>
                    <td>TIPO DE SERVICIO</td>
                    <td>PRECIO SERVICIO</td>
                    <td>DESCRIPCION SERVICIO</td>
                    <td>FORMA DE PAGO</td>
                    <td>FECHA DE SERVICIO</td>
                    <td>BAJA DE SERVICIO</td>
                    <td>ESTADO DE SERVICIO</td>
                    <td>MODIFICAR</td>
                    <td>ELIMINAR</td>
                </tr>
    <?php

            //Se recorre el objeto $oListadoCliente que contiene todos los registros que se solicitaron a través del controller
            $oListadoServicio = $oServicioController->obtenerListadoServicio();

            for ($i = 0; $i < count($oListadoServicio); $i++) {

                // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                echo ' <form action="ServicioListado.php" method="post">';

                // Se envía el id del Servicio de forma oculta
                echo '<input type="hidden" name="nId_Servicio" value='.$oListadoServicio[$i]['Id_Servicio'].' />';

                // Mostramos todas las columnas oobtenidas a través del objeto
                echo '<tr>';
                    echo '<td>'.$oListadoCliente[$i]['NombreEmpleado'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['NombreCliente'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['TipoPaquete'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['PrecioPaquete'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['DescripcionPaquete'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['TipoServicio'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['PrecioServicio'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['DescripcionServicio'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['FormaPago'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['FechaServicio'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['BajaServicio'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['EstadoServicio'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" name="modificarServicio" value="Modificar" /></td>';
                    echo '<td><input type="submit" name="eliminarServicio" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
