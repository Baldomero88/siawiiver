<?php
    require_once('cPuntoAccesoController.php');
    $oPuntoAccesoController = new cPuntoAccesoController;

    //Imprime un Array u objeto
    //echo '<pre>';
    //print_r($oListadoPuntoAcceso);
    //echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PuntoAcceso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

     <ul class="nav nav-tabs">
        <li class="nav-item"><a  class="nav-link" href="../index.php">Inicio</a></li>
        <li class="nav-item"><a  class="nav-link" href="PuntoAcceso.php">Registrar Punto de Acceso</a></li>
    </ul>

    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarPuntoAcceso'])) {
            $nId_PuntoAcceso = $_POST['nId_PuntoAcceso'];

            $oListadoPuntoAccesoPorId = $oPuntoAccesoController->obtenerListadoPuntoAccesoPorId($nId_PuntoAcceso);

            echo '<form action="PuntoAccesoRegistro.php" method="post">';
                echo '</select>';

                echo '<input type="hidden" name="Id_PuntoAcceso" value='.$oListadoPuntoAccesoPorId[0]['Id_PuntoAcceso'].' >';
                echo '<input type="text" name="sNombrePuntoAcceso" value='.$oListadoPuntoAccesoPorId[0]['NombrePuntoAcceso'].' placeholder="sNombrePuntoAcceso">';
                echo '<input type="text" name="sUbicacion" value='.$oListadoPuntoAccesoPorId[0]['Ubicacion'].' placeholder="sUbicacion">';
                echo '<input type="text" name="sNombreContacto" value='.$oListadoPuntoAccesoPorId[0]['NombreContacto'].' placeholder="sNombreContacto">';
                echo '<input type="text" name="sTelefonoPuntoAcceso" value='.$oListadoPuntoAccesoPorId[0]['TelefonoPuntoAcceso'].' placeholder="sTelefonoPuntoAcceso">';
                echo '<input type="text" name="sDireccionMac" value='.$oListadoPuntoAccesoPorId[0]['DireccionMac'].' placeholder="sDireccionMac">';
                echo '<input type="text" name="sContrasenaWifi" value='.$oListadoPuntoAccesoPorId[0]['ContrasenaWifi'].' placeholder="sContrasenaWifi">';


                echo '<input type="submit" name="modificarPuntoAcceso" value="Modificar PuntoAcceso">';
            echo '</form>';
        }

        // Condicion que se ejecuta si se presiona el boton de Eliminar
        elseif (isset($_POST['eliminarPuntoAcceso'])) {
            $nId_PuntoAcceso = $_POST['nId_PuntoAcceso'];

            $oEliminarPuntoAccesoPorId = $oPuntoAccesoController->eliminarPuntoAccesoPorId($nId_PuntoAcceso);
        }

        // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
        else{
    ?>
            <!-- Se muestra la tabla de PuntoAccesos-->
            <table border="1">
                <tr>
                    <td>Nombre del PuntoAcceso</td>
                    <td>Ubicacion</td>
                    <td>Contacto</td>
                    <td>Tlefono</td>
                    <td>DireccionMac</td>
                    <td>ContrasenaWifi</td>
                    <td>Modificar</td>
                    <td>Eliminar</td>
                </tr>
    <?php

            //Se recorre el objeto $oListadoPuntoAcceso que contiene todos los registros que se solicitaron a través del controller
            $oListadoPuntoAcceso = $oPuntoAccesoController->obtenerListadoPuntoAcceso();

            for ($i = 0; $i < count($oListadoPuntoAcceso); $i++) {

                // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                echo ' <form action="PuntoAccesoListado.php" method="post">';

                // Se envía el id del PuntoAcceso de forma oculta
                echo '<input type="hidden" name="nId_PuntoAcceso" value='.$oListadoPuntoAcceso[$i]['Id_PuntoAcceso'].' />';

                // Mostramos todas las columnas oobtenidas a través del objeto
                echo '<tr>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['NombrePuntoAcceso'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['Ubicacion'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['NombreContacto'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['TelefonoPuntoAcceso'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['DireccionMac'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['ContrasenaWifi'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" name="modificarPuntoAcceso" value="Modificar" /></td>';
                    echo '<td><input type="submit" name="eliminarPuntoAcceso" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>