<?php
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR') {
    require 'cUsuarioController.php';
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
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid">

     <ul class="nav nav-tabs nav-justified">
        <li><a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <li><a class="nav-item nav-link" href=" Usuario.php">REGISTRAR USUARIO</a></li>
        <li><a class="nav-item nav-link" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
        <li><a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <li><a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <li><a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <li><a class="nav-item nav-link active" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <li><a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>
        <li><a class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">COBRANZA</a> </li>
        <li><a class="nav-item nav-link" href="../Usuario/cerrarSesion.php">CERRAR SESION</a> </li>
      </ul>
        <br>    <br>


  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">¡Bienvenido!</h4>
   <?php echo 'USUARIO: '.$_SESSION['usuario'].'<br> ROL: '.$_SESSION['rol'];?>
  <hr>
  <p class="mb-0"></p>
</div>

    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarUsuario'])) {
            $nId_Usuario = $_POST['nId_Usuario'];

            $oListadoUsuarioPorId = $oUsuarioController->obtenerListadoUsuarioPorId($nId_Usuario);

            echo '<form action="UsuarioRegistro.php" method="post">';

            echo '<div class="form-group">';
            echo '<div class="float col-xs-12 col-sm-6">';
            echo '<h5>';
            echo '<label>Nombre del Empleado</label>';
            echo '<br>';
                echo '<select class="form-control" name="nId_Empleado">';
                for ($i = 0; $i < count($oEmpleadoUsuario); $i++) {
                    echo '<option value='.$oEmpleadoUsuario[$i]['Id_Empleado'].'>'.$oEmpleadoUsuario[$i]['NombreEmpleado'].'</option>';
                }
                echo '<br>';
                echo '</select>';
                echo '<input type="hidden" class="form-control" name="Id_Usuario" value="'.$oListadoUsuarioPorId[0]['Id_Usuario'].'" >';

                echo'<br>';
                echo '<label>Rol</label>';
                echo '<input type="text" class="form-control" name="sRol" value='.$oListadoUsuarioPorId[0]['Rol'].' placeholder="sRol">';

                echo'<br>';
                echo '<label>Nombre de Usuario</label>';
                echo '<input type="text" class="form-control" name="sNombreUsuario" value='.$oListadoUsuarioPorId[0]['NombreUsuario'].' placeholder="sNombreUsuario">';

                echo'<br>';
                echo '<label>Contraseña</label>';
                echo '<input type="text" class="form-control" name="sContrasena" value='.$oListadoUsuarioPorId[0]['Contrasena'].' placeholder="sContrasena">';

                echo '<br>';
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
            <div class="table-bordered table-responsive">
            <table class="table">

                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NOMBRE DEL EMPLEADO</th>
                    <th scope="col">ROL</th>
                    <th scope="col">NOMBRE DEL USUARIO</th>
                    <th scope="col">CONTRASEÑA</th>
                
                    <th scope="col">MODIFICAR</th>
                    <th scope="col">ELIMINAR</th>
                </thead>
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
                    echo '<th scope="row">'.$oListadoUsuario[$i]['NombreEmpleado'].'</th>';
                    echo '<td>'.$oListadoUsuario[$i]['Rol'].'</td>';
                    echo '<td>'.$oListadoUsuario[$i]['NombreUsuario'].'</td>';
                    echo '<td>'.$oListadoUsuario[$i]['Contrasena'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" class="btn btn-primary" name="modificarUsuario" value="Modificar" /></td>';
                    echo '<td><input type="submit" class="btn btn-danger" name="eliminarUsuario" value="Eliminar" /></td>';
               echo '</tr>';
                echo '</form>';
            }
            echo '</tbody></table></div>';
        }
    ?>
<br> <br>   <br>    <br>


<div class="p-3 mb-2 bg-info text-white">.bg-info
<div class="col-12">

    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.    </p>
    </div>  
</div>
</body>
</html>
<?php
}
?>
