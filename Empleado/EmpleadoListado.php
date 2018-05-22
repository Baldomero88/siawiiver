<?php
    require_once('cEmpleadoController.php');
    $oEmpleadoController = new cEmpleadoController;

    //Imprime un Array u objeto
    //echo '<pre>';
    //print_r($oListadoEmpleado);
    //echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarEmpleado'])) {
            $nId_Empleado = $_POST['nId_Empleado'];

            $oListadoEmpleadoPorId = $oEmpleadoController->obtenerListadoEmpleadoPorId($nId_Empleado);

            echo '<form action="EmpleadoRegistro.php" method="post">';
                echo '</select>';

                echo '<input type="hidden" name="Id_Empleado" value='.$oListadoEmpleadoPorId[0]['Id_Empleado'].' >';
                echo '<input type="text" name="sNombreEmpleado" value='.$oListadoEmpleadoPorId[0]['NombreEmpleado'].' placeholder="sNombreEmpleado">';
                echo '<input type="text" name="sDireccionEmpleado" value='.$oListadoEmpleadoPorId[0]['DireccionEmpleado'].' placeholder="sDireccionEmpleado">';
                echo '<input type="text" name="sTelefonoEmpleado" value='.$oListadoEmpleadoPorId[0]['TelefonoEmpleado'].' placeholder="sTelefonoEmpleado">';
                echo '<input type="text" name="sPuesto" value='.$oListadoEmpleadoPorId[0]['Puesto'].' placeholder="sPuesto">';
                echo '<input type="text" name="nHonorario" value='.$oListadoEmpleadoPorId[0]['Honorario'].' placeholder="nHonorario">';
                echo '<input type="submit" name="modificarEmpleado" value="Modificar Empleado">';
            echo '</form>';
        }

        // Condicion que se ejecuta si se presiona el boton de Eliminar
        elseif (isset($_POST['eliminarEmpleado'])) {
            $nId_Empleado = $_POST['nId_Empleado'];

            $oEliminarEmpleadoPorId = $oEmpleadoController->eliminarEmpleadoPorId($nId_Empleado);
        }

        // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
        else{
    ?>
            <!-- Se muestra la tabla de Empleados-->
            <table border="1">
                <tr>
                    <td>Nombre del Empleado</td>
                    <td>Dirección</td>
                    <td>Teléfono</td>
                    <td>Puesto</td>
                    <td>Honorario</td>
                    <td>Modificar</td>
                    <td>Eliminar</td>
                </tr>
    <?php

            //Se recorre el objeto $oListadoEmpleado que contiene todos los registros que se solicitaron a través del controller
            $oListadoEmpleado = $oEmpleadoController->obtenerListadoEmpleado();

            for ($i = 0; $i < count($oListadoEmpleado); $i++) {

                // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                echo ' <form action="EmpleadoListado.php" method="post">';

                // Se envía el id del Empleado de forma oculta
                echo '<input type="hidden" name="nId_Empleado" value='.$oListadoEmpleado[$i]['Id_Empleado'].' />';

                // Mostramos todas las columnas oobtenidas a través del objeto
                echo '<tr>';
                    echo '<td>'.$oListadoEmpleado[$i]['NombreEmpleado'].'</td>';
                    echo '<td>'.$oListadoEmpleado[$i]['DireccionEmpleado'].'</td>';
                    echo '<td>'.$oListadoEmpleado[$i]['TelefonoEmpleado'].'</td>';
                    echo '<td>'.$oListadoEmpleado[$i]['Puesto'].'</td>';
                    echo '<td>'.$oListadoEmpleado[$i]['Honorario'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" name="modificarEmpleado" value="Modificar" /></td>';
                    echo '<td><input type="submit" name="eliminarEmpleado" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
