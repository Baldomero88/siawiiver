<?php
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'TECNICO') {
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Puntos de Acceso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

     <div class="container-fluid">
    
    <ul class="nav nav-tabs nav-justified">
        <li><a class="nav-item nav-link" href="../index.php">INICIO</a>
        <li><a class="nav-item nav-link" href="PuntoAcceso.php">REGISTRAR PUNTO DE ACCESO</a></li>
        <li><a class="nav-item nav-link" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
        <li><a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <li><a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <li><a class="nav-item nav-link active" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <li><a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
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
        if (isset($_POST['modificarPuntoAcceso'])) {
            $nId_PuntoAcceso = $_POST['nId_PuntoAcceso'];

            $oListadoPuntoAccesoPorId = $oPuntoAccesoController->obtenerListadoPuntoAccesoPorId($nId_PuntoAcceso);

            echo '<form action="PuntoAccesoRegistro.php" method="post">';
                echo'<div class="form-group">';
                echo'<div class="float col-xs-12 col-sm-6">';
                //TAMAÑO DE LAS ETIQUETAS
                echo'<h5>';
                //AGREGA COLOR A LA ETIQUETAS
                echo'<p class="text">';

                echo '<input type="hidden" class="form-group" name="Id_PuntoAcceso" value='.$oListadoPuntoAccesoPorId[0]['Id_PuntoAcceso'].' >';
                
                echo '<br>';
                echo '<label>Nombre del Punto de Acceso</label>';
                echo '<input type="text" class="form-control" name="sNombrePuntoAcceso" value="'.$oListadoPuntoAccesoPorId[0]['NombrePuntoAcceso'].'" placeholder="NOMBRE DEL PUNTO DE ACCESO">';
                
                echo '<br>';
                echo '<label>Ubicación</label>';
                echo '<input type="text" class="form-control" name="sUbicacion" value="'.$oListadoPuntoAccesoPorId[0]['Ubicacion'].'" placeholder="UBICACIÓN">';
                
                echo '<br>';
                echo '<label>Nombre de Contacto</label>';
                echo '<input type="text" class="form-control" name="sNombreContacto" value="'.$oListadoPuntoAccesoPorId[0]['NombreContacto'].'" placeholder="NOMBRE DE CONTACTO">';
                
                echo '<br>';
                echo '<label>Número Telefónico</label>';
                echo '<input type="text" class="form-control" name="sTelefonoPuntoAcceso" value="'.$oListadoPuntoAccesoPorId[0]['TelefonoPuntoAcceso'].'" placeholder="NÚMERO TELEFÓNICO">';
                
                echo '<br>';
                echo '<label>Dirección MAC</label>';
                echo '<input type="text" class="form-control" name="sDireccionMac" value="'.$oListadoPuntoAccesoPorId[0]['DireccionMac'].'" placeholder="00:00:00:00:00:00:00:00">';
                
                echo '<br>';
                echo '<label>Contraseña WIFI</label>';
                echo '<input type="text" class="form-control" name="sContrasenaWifi" value="'.$oListadoPuntoAccesoPorId[0]['ContrasenaWifi'].'" placeholder="CONTRASEÑA WIFI">';

                echo '<br>';
                echo '<input type="submit" name="modificarPuntoAcceso"  class="btn btn-success" value="MODIFICAR PUNTO DE ACCESO">';
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
            <div class="table-bordered table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">NOMBRE DEL PUNTO DE ACCESO</th>
                    <th scope="col">UUBICACIÓN</th>
                    <th scope="col">CONTACTO</th>
                    <th scope="col">TELÉFONO</th>
                    <th scope="col">DIRECCIÓN MAC</th>
                    <th scope="col">CONTRASEÑA WIFI</th>
                    <th scope="col">MODIFICAR</th>
                    <th scope="col">ELIMINAR</th>
                <thead>
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
                    echo '<th scope="col">'.$oListadoPuntoAcceso[$i]['NombrePuntoAcceso'].'</th>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['Ubicacion'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['NombreContacto'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['TelefonoPuntoAcceso'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['DireccionMac'].'</td>';
                    echo '<td>'.$oListadoPuntoAcceso[$i]['ContrasenaWifi'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" class="bnt btn-primary" name="modificarPuntoAcceso" value="Modificar" /></td>';
                    echo '<td><input type="submit" class="bnt btn-danger" name="eliminarPuntoAcceso" value="Eliminar" /></td>';
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