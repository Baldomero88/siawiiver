<?php
    require_once('cClienteController.php');
    $oClienteController = new cClienteController;
	$oPuntoAccesoCliente = $oClienteController->ObtenerPuntoAccesoCliente();

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

     <ul class="nav nav-tabs">
        <li class="nav-item"><a  class="nav-link" href="../index.php">Inicio</a></li>
        <li class="nav-item"><a  class="nav-link" href="Cliente.php">Registrar Cliente</a></li>
    </ul>

    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarCliente'])) {
            $nId_Cliente = $_POST['nId_Cliente'];

            $oListadoClientePorId = $oClienteController->obtenerListadoClientePorId($nId_Cliente);

            echo '<form action="ClienteRegistro.php" method="post">';
                echo '<select name="nId_PuntoAcceso">';
                for ($i = 0; $i < count($oPuntoAccesoCliente); $i++) {
                    echo '<option value='.$oPuntoAccesoCliente[$i]['Id_PuntoAcceso'].'>'.$oPuntoAccesoCliente[$i]['NombrePuntoAcceso'].'</option>';
                }
                echo '</select>';

                echo '<input type="hidden" name="Id_Cliente" value='.$oListadoClientePorId[0]['Id_Cliente'].' >';
                echo '<input type="text" name="sNombreCliente" value='.$oListadoClientePorId[0]['NombreCliente'].' placeholder="sNombreCliente">';
                echo '<input type="text" name="sDireccionCliente" value='.$oListadoClientePorId[0]['DireccionCliente'].' placeholder="sDireccionCliente">';
                echo '<input type="text" name="sLocalidad" value='.$oListadoClientePorId[0]['Localidad'].' placeholder="sLocalidad">';
                echo '<input type="text" name="sMunicipio" value='.$oListadoClientePorId[0]['Municipio'].' placeholder="sMunicipio">';
                echo '<input type="text" name="sTelefonoCliente" value='.$oListadoClientePorId[0]['TelefonoCliente'].' placeholder="sTelefonoCliente">';
                echo '<input type="text" name="sReferencia" value='.$oListadoClientePorId[0]['Referencia'].' placeholder="sReferencia">';
                echo '<input type="submit" name="modificarCliente" value="Modificar Cliente">';
            echo '</form>';
        }

        // Condicion que se ejecuta si se presiona el boton de Eliminar
        elseif (isset($_POST['eliminarCliente'])) {
            $nId_Cliente = $_POST['nId_Cliente'];

            $oEliminarClientePorId = $oClienteController->eliminarClientePorId($nId_Cliente);
        }

        // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
        else{
    ?>
            <!-- Se muestra la tabla de clientes-->
            <table border="1">
                <tr>
                    <td>Punto de Acceso</td>
                    <td>Nombre del cliente</td>
                    <td>Dirección</td>
                    <td>Localidad</td>
                    <td>Municipio</td>
                    <td>Teléfono</td>
                    <td>Referencia</td>
                    <td>Modificar</td>
                    <td>Eliminar</td>
                </tr>
    <?php

            //Se recorre el objeto $oListadoCliente que contiene todos los registros que se solicitaron a través del controller
            $oListadoCliente = $oClienteController->obtenerListadoCliente();

            for ($i = 0; $i < count($oListadoCliente); $i++) {

                // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                echo ' <form action="ClienteListado.php" method="post">';

                // Se envía el id del cliente de forma oculta
                echo '<input type="hidden" name="nId_Cliente" value='.$oListadoCliente[$i]['Id_Cliente'].' />';

                // Mostramos todas las columnas oobtenidas a través del objeto
                echo '<tr>';
                    echo '<td>'.$oListadoCliente[$i]['NombrePuntoAcceso'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['NombreCliente'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['DireccionCliente'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['Localidad'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['Municipio'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['TelefonoCliente'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['Referencia'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" name="modificarCliente" value="Modificar" /></td>';
                    echo '<td><input type="submit" name="eliminarCliente" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
