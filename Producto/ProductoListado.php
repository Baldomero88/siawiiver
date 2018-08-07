<?php
    require_once('cProductoController.php');
    $oProductoController = new cProductoController;
	$oProvedorProducto = $oProductoController->ObtenerProvedorProducto();

    //Imprime un Array u objeto
    //echo '<pre>';
    //print_r($oListadoProducto);
    //echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">

       <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link" href="Producto.php">REGISTRAR PRODUCTO</a></li>
        <a class="nav-item nav-link" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
        <a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link active" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>
        
        <br>    <br>    
        </ul>
        <br>    <br>    
        <h3> <P> <EM>WIIVER Ingenieria Aplicada en Redes PRODUCTOS</EM></P></h3>
    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarProducto'])) {
            $nId_Producto = $_POST['nId_Producto'];

            $oListadoProductoPorId = $oProductoController->obtenerListadoProductoPorId($nId_Producto);

            echo '<form action="ProductoRegistro.php" method="post">';

            echo '<div class="form-group">';
                echo'<div class="float col-xs-12 col-sm-6">';
                echo'<h5>';
                echo '<label>Nombre del Provedor</label>';
                echo'<br>';    
                echo '<select name="nId_Provedor" class="form-control" >';
                for ($i = 0; $i < count($oProvedorProducto); $i++) {
                    echo '<option value='.$oProvedorProducto[$i]['Id_Provedor'].'>'.$oProvedorProducto[$i]['NombreCompania'].'</option>';
                }

                echo'<br>';
                echo '</select>';
                echo '<input type="hidden" class="form-control" name="Id_Producto" value='.$oListadoProductoPorId[0]['Id_Producto'].' >';


                echo'<br>';
                echo '<label>Nombre del Producto</label>';                
                echo '<input type="text" class="form-control" name="sNombreProducto" value="'.$oListadoProductoPorId[0]['NombreProducto'].'" placeholder="   ">';

                echo'<br>';
                echo '<label>Cantidad por Unidad</label>';
                echo '<input type="text" class="form-control" name="nCantidadUnidad" value="'.$oListadoProductoPorId[0]['CantidadUnidad'].'" placeholder="   ">';

                echo'<br>';
                echo '<label>Precio</label>';
                echo '<input type="text" class="form-control" name="nPrecioUnidad" value="'.$oListadoProductoPorId[0]['PrecioUnidad'].'" placeholder="   ">';

                echo'<br>';
                echo '<label>Unidades en Almacen</label>';
                echo '<input type="text" class="form-control" name="nUnidadAlmacen" value="'.$oListadoProductoPorId[0]['UnidadAlmacen'].'" placeholder="   ">';

                echo'<br>';
                echo '<label>Unidades en Servicio</label>';
                echo '<input type="text" class="form-control" name="nUnidadServicio" value="'.$oListadoProductoPorId[0]['UnidadServicio'].'" placeholder="   ">';

                echo'<br>';
                echo '<label>Reordenar Nivel</label>';
                echo '<input type="text" class="form-control" name="nReordenarNivel" value="'.$oListadoProductoPorId[0]['ReordenarNivel'].'" placeholder="   ">';

                echo'<br>';
                echo '<label>Terminado</label>';
                echo '<input type="text" class="form-control" name="nTerminado" value="'.$oListadoProductoPorId[0]['Terminado'].'" placeholder="   ">';

                echo '<br>';
                echo '<input type="submit" class="btn btn-success" name="modificarProducto" value="MODIFICAR PRODUCTO">';
            echo '</form>';
        }

        // Condicion que se ejecuta si se presiona el boton de Eliminar
        elseif (isset($_POST['eliminarProducto'])) {
            $nId_Producto = $_POST['nId_Producto'];

            $oEliminarProductoPorId = $oProductoController->eliminarProductoPorId($nId_Producto);
        }

        // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
        else{
    ?>
            <!-- Se muestra la tabla de Productos-->
            <div class="table-bordered table-responsive">
                <table class="table">
                    <thead class="thead-light">
                <tr>
                    <th scope="COL">Provedor</th>
                    <th scope="COL">Nombre del producto</th>
                    <th scope="COL">Cantidad</th>
                    <th scope="COL">Precio</th>
                    <th scope="COL">Unidad en almacen</th>
                    <th scope="COL">Unidad en servicio</th>
                    <th scope="COL">Reordenar Nivel</th>
                    <th scope="COL">Terminado</th>
                    <th scope="COL">Modificar</th>
                    <th scope="COL">Eliminar</th>
                </thead>

                </tr>
    <?php

            //Se recorre el objeto $oListadoProducto que contiene todos los registros que se solicitaron a través del controller
            $oListadoProducto = $oProductoController->obtenerListadoProducto();

            for ($i = 0; $i < count($oListadoProducto); $i++) {

                // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                echo ' <form action="ProductoListado.php" method="post">';

                // Se envía el id del Producto de forma oculta
                echo '<input type="hidden" name="nId_Producto" value='.$oListadoProducto[$i]['Id_Producto'].' />';

                // Mostramos todas las columnas oobtenidas a través del objeto
                echo '<tr>';
                    echo '<th scope="row">'.$oListadoProducto[$i]['NombreCompania'].'</th>';
                    echo '<td>'.$oListadoProducto[$i]['NombreProducto'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['CantidadUnidad'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['PrecioUnidad'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['UnidadAlmacen'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['UnidadServicio'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['ReordenarNivel'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['Terminado'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" class="btn btn-primary" name="modificarProducto" value="Modificar" /></td>';
                    echo '<td><input type="submit" class="btn btn-danger" name="eliminarProducto" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
