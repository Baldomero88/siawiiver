

<?php
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'COBRANZA') {
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
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>


    <div class="container-fluid">
    
    <ul class="nav nav-tabs nav-justified">
        <li><a class="nav-item nav-link" href="../index.php">INICIO</a>
        <li><a class="nav-item nav-link" href="Empleado.php">REGISTRAR EMPLEADO</a></li>
        <li><a class="nav-item nav-link" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
        <li><a class="nav-item nav-link active" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <li><a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <li><a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <li><a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <li><a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>
        <li><a  class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">COBRANZA</a> </li>
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
        if (isset($_POST['modificarEmpleado'])) {
            $nId_Empleado = $_POST['nId_Empleado'];

            $oListadoEmpleadoPorId = $oEmpleadoController->obtenerListadoEmpleadoPorId($nId_Empleado);

            echo '<form action="EmpleadoRegistro.php" method="post">';
            
            echo'<div class="form-group">';
                echo'<div class="float col-xs-12 col-sm-6">';
                  //titulo del formulario
                echo '<h5>';
                echo '<label>Modificar Empleado</label>';
                
                //TAMAÑO DE LAS ETIQUETAS
                echo'<h5>';
                //AGREGA COLOR A LA ETIQUETAS
                echo'<p class="text">';
                    
                    echo '<input type="hidden" class="form-group" name="Id_Empleado" value='.$oListadoEmpleadoPorId[0]['Id_Empleado'].' >';

                echo '</select>';
                echo '<br>';
                    echo'<label>Nombre del Empleado</label>';
                    echo '<input type="text" class="form-control" name="sNombreEmpleado" value='.$oListadoEmpleadoPorId[0]['NombreEmpleado'].' placeholder="sNombreEmpleado">';
                
                echo '<br>';
                    echo'<label>Dirección</label>';
                    echo '<input type="text" class="form-control" name="sDireccionEmpleado" value='.$oListadoEmpleadoPorId[0]['DireccionEmpleado'].' placeholder="sDireccionEmpleado">';
                
                echo '<br>';
                    echo'<label>Número Telefónico</label>';
                    echo '<input type="text" class="form-control" name="sTelefonoEmpleado" value='.$oListadoEmpleadoPorId[0]['TelefonoEmpleado'].' placeholder="sTelefonoEmpleado">';
                
                echo '<br>';
                    echo'<label>Puesto que desempeña</label>';
                    echo '<input type="text" class="form-control" name="sPuesto" value='.$oListadoEmpleadoPorId[0]['Puesto'].' placeholder="sPuesto">';
                
                echo '<br>';
                    echo'<label>Honorarios</label>';
                    echo '<input type="text" class="form-control" name="nHonorario" value='.$oListadoEmpleadoPorId[0]['Honorario'].' placeholder="nHonorario">';

                echo '<br>';
                        echo '<input type="submit" class="btn btn-success" name="modificarEmpleado" value="MODIFICAR EMPLEADO">';
                    echo'<div';

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
              <div class="table-bordered table-responsive">
                <table class="table">
                <thead class="thead-dark">   
                <tr>
                    <th scope="col">NOMBRE DEL EMPLEADO</th>
                    <th scope="col">DIRECCIÓN</th>
                    <th scope="col">TELÉFONO</th>
                    <th scope="col">PUESTO</th>
                    <th scope="col">HONORARIO</th>
                    <th scope="col">MODIFICAR</th>
                    <th scope="col">ELIMINAR</th>
                </thead>
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
                    echo '<th scope="row">'.$oListadoEmpleado[$i]['NombreEmpleado'].'</th>';
                    echo '<td>'.$oListadoEmpleado[$i]['DireccionEmpleado'].'</td>';
                    echo '<td>'.$oListadoEmpleado[$i]['TelefonoEmpleado'].'</td>';
                    echo '<td>'.$oListadoEmpleado[$i]['Puesto'].'</td>';
                    echo '<td>'.$oListadoEmpleado[$i]['Honorario'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" class="btn-primary" name="modificarEmpleado" value="Modificar" /></td>';
                    echo '<td><input type="submit" class="btn-danger" name="eliminarEmpleado" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</tbody></table></div>';
        }
    ?>

<br> <br>   <br>    <br>


<div class="p-3 mb-2 bg-info text-white"><h4>¿Quiénes somos?</h4>
<div class="col-12">

    <p><h5> WIIVER es una empresa 100% mexicana, creada con el objetivo de brindar servicios en el área de telecomunicaciones, brindar asesoría tecnológica y enlaces dedicados a empresas privadas de la zona centro del estado de Veracruz.   </h5></p>
    </div>  
</div>

</body>
</html>
<?php
}
?>