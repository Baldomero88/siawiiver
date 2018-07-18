<?php
    require_once('cProvedorController.php');
    $oProvedorController = new cProvedorController;

    //Imprime un Array u objeto
    //echo '<pre>';
    //print_r($oListadoProvedor);
    //echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Provedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

     <ul class="nav nav-tabs">
        <li class="nav-item"><a  class="nav-link" href="../index.php">Inicio</a></li>
        <li class="nav-item"><a  class="nav-link" href="Provedor.php">Registrar Provedor</a></li>
    </ul>

    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarProvedor'])) {
            $nId_Provedor = $_POST['nId_Provedor'];

            $oListadoProvedorPorId = $oProvedorController->obtenerListadoProvedorPorId($nId_Provedor);

            echo '<form action="ProvedorRegistro.php" method="post">';
                echo '</select>';

                echo '<input type="hidden" name="Id_Provedor" value='.$oListadoProvedorPorId[0]['Id_Provedor'].' >';
                echo '<input type="text" name="sNombreCompania" value='.$oListadoProvedorPorId[0]['NombreCompania'].' placeholder="sNombreCompania">';
                echo '<input type="text" name="sNombreContactoCompania" value='.$oListadoProvedorPorId[0]['NombreContactoCompania'].' placeholder="sNombreContactoCompania">';
                echo '<input type="text" name="sDireccionCompania" value='.$oListadoProvedorPorId[0]['DireccionCompania'].' placeholder="sDireccionCompania">';
                echo '<input type="text" name="sCiudad" value='.$oListadoProvedorPorId[0]['Ciudad'].' placeholder="sCiudad">';
                echo '<input type="text" name="nCodigoPostal" value='.$oListadoProvedorPorId[0]['CodigoPostal'].' placeholder="sCodigoPostal">';
                echo '<input type="text" name="sPais" value='.$oListadoProvedorPorId[0]['Pais'].' placeholder="sPais">';
                 echo '<input type="text" name="sTelefonoCompania" value='.$oListadoProvedorPorId[0]['TelefonoCompania'].' placeholder="sTelefonoCompania">';
                echo '<input type="text" name="sPaginaWeb" value='.$oListadoProvedorPorId[0]['PaginaWeb'].' placeholder="sPaginaWeb">';


                echo '<input type="submit" name="modificarProvedor" value="Modificar Provedor">';
            echo '</form>';
        }

        // Condicion que se ejecuta si se presiona el boton de Eliminar
        elseif (isset($_POST['eliminarProvedor'])) {
            $nId_Provedor = $_POST['nId_Provedor'];

            $oEliminarProvedorPorId = $oProvedorController->eliminarProvedorPorId($nId_Provedor);
        }

        // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
        else{
    ?>
            <!-- Se muestra la tabla de Provedors-->
            <table border="1">
                <tr>
                    <td>Nombre de compañia</td>
                    <td>Contacto</td>
                    <td>Direccion</td>
                    <td>Ciudad</td>
                    <td>CodigoPostal</td>
                    <td>Pais</td>
                    <td>TelefonoCompania</td>
                    <td>PaginaWeb</td>

                    <td>Modificar</td>
                    <td>Eliminar</td>
                </tr>
    <?php

            //Se recorre el objeto $oListadoProvedor que contiene todos los registros que se solicitaron a través del controller
            $oListadoProvedor = $oProvedorController->obtenerListadoProvedor();

            for ($i = 0; $i < count($oListadoProvedor); $i++) {

                // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                echo ' <form action="ProvedorListado.php" method="post">';

                // Se envía el id del Provedor de forma oculta
                echo '<input type="hidden" name="nId_Provedor" value='.$oListadoProvedor[$i]['Id_Provedor'].' />';

                // Mostramos todas las columnas oobtenidas a través del objeto
                echo '<tr>';
                    echo '<td>'.$oListadoProvedor[$i]['NombreCompania'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['NombreContactoCompania'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['DireccionCompania'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['Ciudad'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['CodigoPostal'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['Pais'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['TelefonoCompania'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['PaginaWeb'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" name="modificarProvedor" value="Modificar" /></td>';
                    echo '<td><input type="submit" name="eliminarProvedor" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>