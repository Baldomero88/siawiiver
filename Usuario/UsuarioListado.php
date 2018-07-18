<?php
    require_once('cUsuarioController.php');
    $oUsuarioController = new cUsuarioController;
	$oEmpleadoUsuario = $oUsuarioController->ObtenerEmpleadoUsuario();

    //Imprime un Array u objeto
    //echo '<pre>';
    //print_r($oListadoUsuario);
    //echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

     <ul class="nav nav-tabs">
        <li class="nav-item"><a  class="nav-link" href="../index.php">Inicio</a></li>
        <li class="nav-item"><a  class="nav-link" href="Usuario.php">Registrar Usuario</a></li>
    </ul>

    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarUsuario'])) {
            $nId_Usuario = $_POST['nId_Usuario'];

            $oListadoUsuarioPorId = $oUsuarioController->obtenerListadoUsuarioPorId($nId_Usuario);

            echo '<form action="UsuarioRegistro.php" method="post">';
                echo '<select name="nId_Empleado">';
                for ($i = 0; $i < count($oEmpleadoUsuario); $i++) {
                    echo '<option value='.$oEmpleadoUsuario[$i]['Id_Empleado'].'>'.$oEmpleadoUsuario[$i]['NombreCompania'].'</option>';
                }
                echo '</select>';

                echo '<input type="hidden" name="Id_Usuario" value='.$oListadoUsuarioPorId[0]['Id_Usuario'].' >';
                echo '<input type="text" name="sRol" value='.$oListadoUsuarioPorId[0]['Rol'].' placeholder="sRol">';
                echo '<input type="text" name="sNombreUsuario" value='.$oListadoUsuarioPorId[0]['NombreUsuario'].' placeholder="sNombreUsuario">';
                echo '<input type="text" name="sContrasena" value='.$oListadoUsuarioPorId[0]['Contrasena'].' placeholder="sContrasena">';
                echo '<input type="submit" name="modificarUsuario" value="Modificar Usuario">';
            echo '</form>';
        }

        // Condicion que se ejecuta si se presiona el boton de Eliminar
        elseif (isset($_POST['eliminarUsuario'])) {
            $nId_Usuario = $_POST['nId_Usuario'];

            $oEliminarUsuarioPorId = $oUsuarioController->eliminarUsuarioPorId($nId_Usuario);
        }

        // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
        else{
    ?>
            <!-- Se muestra la tabla de Usuarios-->
            <table border="1">
                <tr>
                    <td>Rol</td>
                    <td>Nombre del Usuario</td>
                    <td>Contrasena</td>
                
                    <td>Modificar</td>
                    <td>Eliminar</td>

                </tr>
    <?php

            //Se recorre el objeto $oListadoUsuario que contiene todos los registros que se solicitaron a través del controller
            $oListadoUsuario = $oUsuarioController->obtenerListadoUsuario();

            for ($i = 0; $i < count($oListadoUsuario); $i++) {

                // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                echo ' <form action="UsuarioListado.php" method="post">';

                // Se envía el id del Usuario de forma oculta
                echo '<input type="hidden" name="nId_Usuario" value='.$oListadoUsuario[$i]['Id_Usuario'].' />';

                // Mostramos todas las columnas oobtenidas a través del objeto
                echo '<tr>';
                    echo '<td>'.$oListadoUsuario[$i]['Rol'].'</td>';
                    echo '<td>'.$oListadoUsuario[$i]['NombreUsuario'].'</td>';
                    echo '<td>'.$oListadoUsuario[$i]['Contrasena'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" name="modificarUsuario" value="Modificar" /></td>';
                    echo '<td><input type="submit" name="eliminarUsuario" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
