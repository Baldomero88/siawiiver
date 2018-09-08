
<?php
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'TECNICO') {
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
        <li><a class="nav-item nav-link" href="Provedor.php">REGISTRAR PROVEDOR</a></li>
        <li><a class="nav-item nav-link" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
        <li><a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <li><a class="nav-item nav-link active" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
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
        if (isset($_POST['modificarProvedor'])) {
            $nId_Provedor = $_POST['nId_Provedor'];

            $oListadoProvedorPorId = $oProvedorController->obtenerListadoProvedorPorId($nId_Provedor);

            echo '<form action="ProvedorRegistro.php" method="post">';
                
                echo'<div class="form-group">';
                echo'<div class="float col-xs-12 col-sm-6">';

                 //titulo del formulario
                echo '<h5>';
                echo '<label>Modificar Provedor</label>';
                //TAMAÑO DE LAS ETIQUETAS
                echo'<h5>';
                //AGREGA COLOR A LA ETIQUETAS
                echo'<p class="text">';
                echo '<input type="hidden" class="form-group" name="Id_Provedor" value='.$oListadoProvedorPorId[0]['Id_Provedor'].' >';
                
                echo '<br>';
                echo '<label>Nombre de la Compañia</label>';  
                echo '<input type="text" class="form-control" name="sNombreCompania" value='.$oListadoProvedorPorId[0]['NombreCompania'].' placeholder="NOMBRE DE LA COMPAÑIA">';

                echo '<br>';
                echo '<label>Nombre del contacto en la Compañia</label>';  
                echo '<input type="text" class="form-control" name="sNombreContactoCompania" value='.$oListadoProvedorPorId[0]['NombreContactoCompania'].' placeholder="NOMBRE(S)   PRIMER APELLIDO   SEGUNDO APELLIDO">';

                echo '<br>';
                echo '<label>Dirección de la Compañia</label>';  
                echo '<input type="text" class="form-control" name="sDireccionCompania" value='.$oListadoProvedorPorId[0]['DireccionCompania'].' placeholder="CALLE   AVENIDA   NÚMERO EXTERIOR">';

                echo '<br>';
                echo '<label>Ciudad</label>';  
                echo '<input type="text" class="form-control" name="sCiudad" value='.$oListadoProvedorPorId[0]['Ciudad'].' placeholder="CIUDAD">';

                echo '<br>';
                echo '<label>Codigo Postal</label>';  
                echo '<input type="text" class="form-control" name="nCodigoPostal" value='.$oListadoProvedorPorId[0]['CodigoPostal'].' placeholder="CÓDIGO POSTAL">';

                echo '<br>';
                echo '<label>Pais</label>';  
                echo '<input type="text" class="form-control" name="sPais" value='.$oListadoProvedorPorId[0]['Pais'].' placeholder="PAÍS">';

                echo '<br>';
                echo '<label>Número Telefónico</label>';  
                echo '<input type="text" class="form-control" name="sTelefonoCompania" value='.$oListadoProvedorPorId[0]['TelefonoCompania'].' placeholder="NÚMERO TELEFÓNICO">';

                echo '<br>';
                echo '<label>Pagina Web</label>';  
                echo '<input type="text" class="form-control" name="sPaginaWeb" value='.$oListadoProvedorPorId[0]['PaginaWeb'].' placeholder="WWW.PÁGINA WEB">';


echo '<br>';
                echo '<input type="submit" class="btn btn-success" name="modificarProvedor" value="MODIFICAR PROVEDOR">';
            echo'</div>';

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
            <div class="table-bordered table-responsive">
            <table class="table">
                <thead class=" thead-dark">
                <tr>
                    <th scope="COL">Nombre de compañia</th>
                    <th scope="COL">Contacto</th>
                    <th scope="COL">Direccion</th>
                    <th scope="COL">Ciudad</th>
                    <th scope="COL">Codigo Postal</th>
                    <th scope="COL">Pais</th>
                    <th scope="COL">TelefonoCompania</th>
                    <th scope="COL">PaginaWeb</th>

                    <th scope="COL">Modificar</th>
                    <th scope="COL">Eliminar</th>
                </thead>
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
                    echo '<th scope="row">'.$oListadoProvedor[$i]['NombreCompania'].'</t>';
                    echo '<td>'.$oListadoProvedor[$i]['NombreContactoCompania'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['DireccionCompania'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['Ciudad'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['CodigoPostal'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['Pais'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['TelefonoCompania'].'</td>';
                    echo '<td>'.$oListadoProvedor[$i]['PaginaWeb'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" class="btn btn-primary" name="modificarProvedor" value="Modificar" /></td>';
                    echo '<td><input type="submit" class="btn btn-danger" name="eliminarProvedor" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
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