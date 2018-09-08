

<?php
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'COBRANZA' || $_SESSION['rol'] == 'TECNICO') {
    
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
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid">

     <ul class="nav nav-tabs nav-justified">
        <li><a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <li><a class="nav-item nav-link" href="Cliente.php">REGISTRAR CLIENTE</a></li>
        <li><a class="nav-item nav-link active" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
        <li><a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <li><a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <li><a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
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
        if (isset($_POST['modificarCliente'])) {
            $nId_Cliente = $_POST['nId_Cliente'];

            $oListadoClientePorId = $oClienteController->obtenerListadoClientePorId($nId_Cliente);

            echo '<form action="ClienteRegistro.php" method="post">';

            echo '<div class="form-group">';
            echo '<div class="container col-md-6">';

           //titulo del formulario
            echo '<h5>';
            echo '<label>Modificar Cliente</label>';
            echo '<h5>';
            echo '<label>Nombre del Punto de Acceso</label>';
            echo '<br>';
            
                echo '<select class="form-control" name="nId_PuntoAcceso">';
                for ($i = 0; $i < count($oPuntoAccesoCliente); $i++) {
                    echo '<option value='.$oPuntoAccesoCliente[$i]['Id_PuntoAcceso'].'>'.$oPuntoAccesoCliente[$i]['NombrePuntoAcceso'].'</option>';
                }

                echo'<br>';
                echo '</select>';
                echo '<input type="hidden" class="form-control" name="Id_Cliente" value="'.$oListadoClientePorId[0]['Id_Cliente'].'" >';
                
                echo'<br>';
                echo '<label>Nombre del Cliente</label>';
                echo '<input type="text" class="form-control" name="sNombreCliente" value="'.$oListadoClientePorId[0]['NombreCliente'].'" placeholder="NOMBRE(S), PRIMER APELLIDO, SEGUNDO APELLIDO">';
                
                echo '<br>';
                echo '<label>Dirección</label>';
                echo '<input type="text" class="form-control" name="sDireccionCliente" value="'.$oListadoClientePorId[0]['DireccionCliente'].'" placeholder="CALLE   AVENIDA   NÚMERO EXTERIOR">';
                
                echo '<br>';
                echo '<label>Nombre de la Localidad</label>';
                echo '<input type="text" class="form-control" name="sLocalidad" value="'.$oListadoClientePorId[0]['Localidad'].'" placeholder="LOCALIDAD">';
            
                echo '<br>';    
                echo '<label>Nombre del Municipio</label>';
                echo '<input type="text" class="form-control" name="sMunicipio" value="'.$oListadoClientePorId[0]['Municipio'].'" placeholder="MUNICIPIO">';
                
                echo '<br>';
                echo '<label>Número Telefónico</label>';
                echo '<input type="text" class="form-control" name="sTelefonoCliente" value="'.$oListadoClientePorId[0]['TelefonoCliente'].'" placeholder="(LADA)+">';
            

                echo '<br>';    
                echo '<label>Referencia de localización</label>';
                echo '<input type="text" class="form-control" name="sReferencia" value="'.$oListadoClientePorId[0]['Referencia'].'" placeholder="REFERENCIA FÍSICA">';
            
                echo '<br>';           
                echo '<input class="btn btn-success" type="submit" name="modificarCliente" value="MODIFICAR CLIENTE">';
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
           <div class="table-bordered table-responsive">
            <table class="table">

                <thead class="thead-dark">
                    <tr>
                    <th scope="col">PUNTO DE ACCESO</th>
                    <th scope="col">NOMBRE DEL CLIENTE</th>
                    <th scope="col">DIRECCIÓN</th>
                    <th scope="col">LOCALIDAD</th>
                    <th scope="col">MUNICIPIO</th>
                    <th scope="col">TELEFÓNO</th>
                    <th scope="col">REFERENCIA</th>
                    
                    <th scope="col">MODIFICAR</th>
                    <th scope="col">ELIMINAR</th>
                    </thead>
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
                    echo '<th scope="row">'.$oListadoCliente[$i]['NombrePuntoAcceso'].'</th>';
                    echo '<td>'.$oListadoCliente[$i]['NombreCliente'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['DireccionCliente'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['Localidad'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['Municipio'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['TelefonoCliente'].'</td>';
                    echo '<td>'.$oListadoCliente[$i]['Referencia'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" class="btn btn-primary" name="modificarCliente" value="Modificar" /></td>';
                    echo '<td><input type="submit" class="btn btn-danger" name="eliminarCliente" value="Eliminar" /></td>';
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