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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Servicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
    
    <ul class="nav nav-tabs">
        <li class="nav-item"><a  class="nav-link" href="../index.php">Inicio</a></li>
        <li class="nav-item"><a  class="nav-link" href="servicio.php">Registrar Servicio</a></li>
    </ul>
    
    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarServicio'])) {
            $nId_Servicio = $_POST['nId_Servicio'];

            $oListadoServicioPorId = $oServicioController->obtenerListadoServicioPorId($nId_Servicio);
            
            echo '<form action="ServicioRegistro.php" method="post">';
                
                echo'<div class="form-group">';
                
                    echo '<input type="hidden" name="Id_Servicio" value='.$oListadoServicioPorId[0]['Id_Servicio'].' >';

                    echo'<label>Nombre de Empleado</label>';
                    echo '<select class="form-control" name="Id_Empleado" id="selectEmpleadao">';
                        echo'<option value='.$oListadoServicioPorId[0]['Id_Empleado'].' selected>'.$oListadoServicioPorId[0]['NombreEmpleado'].'</option>';
                        for ($i = 0; $i < count($oEmpleadoServicio); $i++) {
                            echo '<option value='.$oEmpleadoServicio[$i]['Id_Empleado'].'>'.$oEmpleadoServicio[$i]['NombreEmpleado'].'</option>';
                        }
                    echo '</select>';
                    
                    echo'<label>Nombre Cliente</label>';
                    echo '<select class="form-control" name="Id_Cliente">';
                    echo'<option value='.$oListadoServicioPorId[0]['Id_Cliente'].' selected>'.$oListadoServicioPorId[0]['NombreCliente'].'</option>';
                        for ($i = 0; $i < count($oClienteServicio); $i++) {
                         echo '<option value='.$oClienteServicio[$i]['Id_Cliente'].'>'.$oClienteServicio[$i]['NombreCliente'].'</option>';
                        }
                    echo '</select>';

                    echo'<label>Tipo Paquete</label>';
                    echo '<select class="form-control" name="sTipoPaquete">';
                        echo'<option value="Basico">Básico</option>';
                        echo'<option value="Premium">Premium</option>';
                    echo'</select>';

                    echo'<label>Precio Paquete</label>';
                    echo '<input class="form-control" type="text" name="nPrecioPaquete" value='.$oListadoServicioPorId[0]['PrecioPaquete'].' placeholder="nPrecioPaquete">';

                    echo'<label>Descrpción Paquete</label>';
                    echo '<input class="form-control" type="text" name="sDescripcionPaquete" value='.$oListadoServicioPorId[0]['DescripcionPaquete'].' placeholder="sDescripcionPaquete">';

                    echo'<label>Tipo Servicio</label>';
                    echo '<input class="form-control" type="text" name="sTipoServicio" value='.$oListadoServicioPorId[0]['TipoServicio'].' placeholder="sTipoServicio">';

                    echo'<label>Precio Servicio</label>';
                    echo '<input class="form-control" type="text" name="nPrecioServicio" value='.$oListadoServicioPorId[0]['PrecioServicio'].' placeholder="nPrecioServicio">';

                    echo'<label>Descripción Servicio</label>';
                    echo '<input class="form-control" type="text" name="sDescripcionServicio" value='.$oListadoServicioPorId[0]['DescripcionServicio'].' placeholder="sDescripcionServicio">';

                    echo'<label>Forma Pago</label>';
                    echo '<select class="form-control" name="sFormaPago">';
                        echo'<option value="Tarjeta">Tarjeta</option>';
                        echo'<option value="Efectivo">Efectivo</option>';
                    echo'</select>';

                    echo'<label>Fecha Servicio</label>';
                    echo '<input class="form-control" type="date" name="sFechaServicio" value='.$oListadoServicioPorId[0]['FechaServicio'].' placeholder="sFechaServicio">';

                    echo'<label>Fecha Baja de servicio</label>';
                    echo '<input class="form-control" type="date" name="sBajaServicio" value='.$oListadoServicioPorId[0]['BajaServicio'].' placeholder="sBajaServicio">';
                    
                    echo'<label>Estado del Servicio</label>';
                    echo '<select class="form-control" name="sEstadoServicio">';
                        echo'<option value="Activo">Activo</option>';
                        echo'<option value="Inactivo">Inactivo</option>';
                    echo'</select>';

                    echo '<input class="btn btn-primary" type="submit" name="modificarServicio" value="Modificar Servicio">';

                echo'</div>';

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
            <div class="table-bordered table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">EMPLEADO</th>
                        <th scope="col">CLIENTE</th>
                        <th scope="col">TIPO DE PAQUETE</th>
                        <th scope="col">PRECIO PAQUETE</th>
                        <th scope="col">DESCRIPCION DE PAQUETE</th>
                        <th scope="col">TIPO DE SERVICIO</th>
                        <th scope="col">PRECIO SERVICIO</th>
                        <th scope="col">DESCRIPCION SERVICIO</th>
                        <th scope="col">FORMA DE PAGO</th>
                        <th scope="col">FECHA DE SERVICIO</th>
                        <th scope="col">BAJA DE SERVICIO</th>
                        <th scope="col">ESTADO DE SERVICIO</th>
                        <th scope="col">MODIFICAR</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
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
                    echo '<th scope="row">'.$oListadoServicio[$i]['NombreEmpleado'].'</th>';
                    echo '<td>'.$oListadoServicio[$i]['NombreCliente'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['TipoPaquete'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['PrecioPaquete'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['DescripcionPaquete'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['TipoServicio'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['PrecioServicio'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['DescripcionServicio'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['FormaPago'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['FechaServicio'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['BajaServicio'].'</td>';
                    echo '<td>'.$oListadoServicio[$i]['EstadoServicio'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" name="modificarServicio" value="Modificar" /></td>';
                    echo '<td><input type="submit" name="eliminarServicio" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</tbody></table></div>';
        }
    ?>
</div>
</body>
</html>
