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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

     <ul class="nav nav-tabs">
        <li class="nav-item"><a  class="nav-link" href="../index.php">Inicio</a></li>
        <li class="nav-item"><a  class="nav-link" href="Producto.php">Registrar Producto</a></li>
    </ul>

    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarProducto'])) {
            $nId_Producto = $_POST['nId_Producto'];

            $oListadoProductoPorId = $oProductoController->obtenerListadoProductoPorId($nId_Producto);

            echo '<form action="ProductoRegistro.php" method="post">';
                echo '<select name="nId_Provedor">';
                for ($i = 0; $i < count($oProvedorProducto); $i++) {
                    echo '<option value='.$oProvedorProducto[$i]['Id_Provedor'].'>'.$oProvedorProducto[$i]['NombreCompania'].'</option>';
                }
                echo '</select>';

                echo '<input type="hidden" name="Id_Producto" value='.$oListadoProductoPorId[0]['Id_Producto'].' >';
                echo '<input type="text" name="sNombreProducto" value='.$oListadoProductoPorId[0]['NombreProducto'].' placeholder="sNombreProducto">';
                echo '<input type="text" name="nCantidadUnidad" value='.$oListadoProductoPorId[0]['CantidadUnidad'].' placeholder="nCantidadUnidad">';
                echo '<input type="text" name="nPrecioUnidad" value='.$oListadoProductoPorId[0]['PrecioUnidad'].' placeholder="nPrecioUnidad">';
                echo '<input type="text" name="nUnidadAlmacen" value='.$oListadoProductoPorId[0]['UnidadAlmacen'].' placeholder="nUnidadAlmacen">';
                echo '<input type="text" name="nUnidadServicio" value='.$oListadoProductoPorId[0]['UnidadServicio'].' placeholder="nUnidadServicio">';
                echo '<input type="text" name="nReordenarNivel" value='.$oListadoProductoPorId[0]['ReordenarNivel'].' placeholder="nReordenarNivel">';
                echo '<input type="text" name="nTerminado" value='.$oListadoProductoPorId[0]['Terminado'].' placeholder="nTerminado">';
                echo '<input type="submit" name="modificarProducto" value="Modificar Producto">';
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
            <table border="1">
                <tr>
                    <td>Provedor</td>
                    <td>Nombre del producto</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Unidad en almacen</td>
                    <td>Unidad en servicio</td>
                    <td>Reordenar Nivel</td>
                    <td>Terminado</td>
                    <td>Modificar</td>
                    <td>Eliminar</td>

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
                    echo '<td>'.$oListadoProducto[$i]['NombreCompania'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['NombreProducto'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['CantidadUnidad'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['PrecioUnidad'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['UnidadAlmacen'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['UnidadServicio'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['ReordenarNivel'].'</td>';
                    echo '<td>'.$oListadoProducto[$i]['Terminado'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" name="modificarProducto" value="Modificar" /></td>';
                    echo '<td><input type="submit" name="eliminarProducto" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
