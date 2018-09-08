<?php 
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'COBRANZA' || $_SESSION['rol'] == 'TECNICO') {
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
    <title>Lista de Servicios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>


    <div class="container-fluid">
    
    <ul class="nav nav-tabs nav-justified">
        <li><a class="nav-item nav-link" href="../index.php">INICIO</a>
        <li><a class="nav-item nav-link" href="  servicio.php">REGISTRAR SERVICIO</a></li>
        <li><a class="nav-item nav-link" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
        <li><a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <li><a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <li><a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <li><a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <li><a class="nav-item nav-link active" href="../Servicio/servicioListado.php">SERVICIOS</a></li>
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
        if (isset($_POST['modificarServicio'])) {
            $nId_Servicio = $_POST['nId_Servicio'];

            $oListadoServicioPorId = $oServicioController->obtenerListadoServicioPorId($nId_Servicio);
            
            echo '<form action="ServicioRegistro.php" method="post">';
                
                echo'<div class="form-group">';
                echo'<div class="float col-xs-12 col-sm-6">';
                
                //TAMAÑO DE LAS ETIQUETAS
                echo'<h5>';
                //AGREGA COLOR A LA ETIQUETAS
                echo'<p class="text">';

                    echo '<input type="hidden" name="Id_Servicio" value="'.$oListadoServicioPorId[0]['Id_Servicio'].'"" >';
                    
                    echo '<label>Nombre del Empleado</label>';
                    echo '<select class="form-control" name="Id_Empleado" id="selectEmpleado">';
                    echo '<option value='.$oListadoServicioPorId[0]['Id_Empleado'].' selected>'.$oListadoServicioPorId[0]['NombreEmpleado'].'</option>';
                        for ($i = 0; $i < count($oEmpleadoServicio); $i++) {
                            echo '<option value='.$oEmpleadoServicio[$i]['Id_Empleado'].'>'.$oEmpleadoServicio[$i]['NombreEmpleado'].'</option>';
                        }
                
                echo '</select>';
                echo '<br>';
                    
                    echo'<label>Nombre del Cliente</label>';
                    echo '<select class="form-control" name="Id_Cliente">';
                    echo'<option value='.$oListadoServicioPorId[0]['Id_Cliente'].' selected>'.$oListadoServicioPorId[0]['NombreCliente'].'</option>';
                        for ($i = 0; $i < count($oClienteServicio); $i++) {
                         echo '<option value='.$oClienteServicio[$i]['Id_Cliente'].'>'.$oClienteServicio[$i]['NombreCliente'].'</option>';
                        }

                echo '</select>';
                 echo '<br>';
                    echo'<label>Tipo de Paquete</label>';
                    echo '<select class="form-control" name="sTipoPaquete">';
                        echo'<option value="Basico">BÁSICO</option>';
                        echo'<option value="Intermedio">INTERMEDIO</option>';
                        echo'<option value="Premium">PREMIUM</option>';
                
                echo'</select>';
                 echo '<br>';
                    echo'<label>Precio del Paquete</label>';
                    echo '<input class="form-control" type="text" name="nPrecioPaquete" value="'.$oListadoServicioPorId[0]['PrecioPaquete'].'" placeholder="PRECIO DEL PAQUETE">';
                 
                 echo '<br>';
                    echo'<label>Descrpción del Paquete</label>';
                    echo '<input class="form-control" type="text" name="sDescripcionPaquete" value="'.$oListadoServicioPorId[0]['DescripcionPaquete'].'"" placeholder="REALIZA UNA BREVE DESCRIPCIÓN DEL PAQUETE">';
                 
                 echo '<br>';
                    echo'<label>Tipo de Servicio</label>';
                    echo '<select class="form-control" name="sTipoServicio">';
                        echo'<option value="Instalacion">INSTALACIÓN</option>';
                        echo'<option value="Mantenimiento">MANTENIMIENTO</option>';
                        echo'<option value="Venta">VENTA</option>';

                echo'</select>';
                 echo '<br>';
                    echo'<label>Precio del Servicio</label>';
                    echo '<input class="form-control" type="text" name="nPrecioServicio" value="'.$oListadoServicioPorId[0]['PrecioServicio'].'" placeholder="nPrecioServicio">';
                 
                 echo '<br>';
                    echo'<label>Descripción del Servicio</label>';
                    echo '<input class="form-control" type="text" name="sDescripcionServicio" value="'.$oListadoServicioPorId[0]['DescripcionServicio'].'" placeholder="REALIZA UNA BREVE DESCRIPCIÓN DEL SERVICIO">';
                 
                 echo '<br>';
                    echo'<label>Forma de Pago</label>';
                    echo '<select class="form-control" name="sFormaPago">';
                        echo'<option value="Tarjeta">TARJETA</option>';
                        echo'<option value="Efectivo">EFECTIVO</option>';
                    echo'</select>';
                 
                 echo '<br>';
                    echo'<label>Fecha del Servicio</label>';
                    echo '<input class="form-control" type="date" name="sFechaServicio" value='.$oListadoServicioPorId[0]['FechaServicio'].' placeholder="sFechaServicio">';
                 
                 echo '<br>';
                    echo'<label>Fecha de Baja del servicio</label>';
                    echo '<input class="form-control" type="date" name="sBajaServicio" value="'.$oListadoServicioPorId[0]['BajaServicio'].'" placeholder="sBajaServicio">';
                  
                 echo '<br>';   
                    echo'<label>Estado del Servicio</label>';
                    echo '<select class="form-control" name="sEstadoServicio">';
                        echo'<option value="Activo">ACTIVO</option>';
                        echo'<option value="Inactivo">INACTIVO</option>';
                    echo'</select>';
                 
                 echo '<br>';
                    echo '<input class="btn btn-success" type="submit" name="modificarServicio" value="MODIFICAR SERVICIO">';

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
                <thead class="thead-dark">
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
                    </thead>
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
                    echo '<td><input type="submit" class="btn btn-primary" name="modificarServicio" value="Modificar" /></td>';
                    echo '<td><input type="submit" class="btn btn-danger" name="eliminarServicio" value="Eliminar" /></td>';
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