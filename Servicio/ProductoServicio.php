<!DOCTYPE html>
<html>
<body>
<?php
require_once('cServicioController.php');
$oServicioController = new cServicioController;
$oProductoServicio = $oServicioController->obtenerProductoServicio();
$oListadoServicio = $oServicioController->obtenerListadoServicio();

if (isset($_POST['nId_Servicio']) && isset($_POST['ProductoServicio']) && isset($_POST['nIdProducto']) && count($_POST['CantidadProducto'], COUNT_RECURSIVE) == count($_POST['nIdProducto'], COUNT_RECURSIVE)) {
    $nIdServicio = $_POST['nId_Servicio'];
    $aIdProducto = $_POST['nIdProducto'];
    $aCantidadProducto = $_POST['CantidadProducto'];
    
    $oRegistrarDetalleServicio = $oServicioController->RegistrarDetalleServicio($nIdServicio, $aIdProducto, $aCantidadProducto);
    
} else {

?>
    <form action="ProductoServicio.php" method="post">
        <label>SERVICIO(CLIENTE)</label>
        <select name="nId_Servicio">
            <?php 
            for ($i = 0; $i < count($oListadoServicio); $i++) {
                echo '<option value='.$oListadoServicio[$i]['Id_Servicio'].'>'.$oListadoServicio[$i]['NombreCliente'].'</option>';
            }
            ?>
        </select><br/>
        
        <?php 
        for ($i = 0; $i < count($oProductoServicio); $i++) {
          echo '<input type="checkbox" name="nIdProducto[]" value='.$oProductoServicio[$i]['Id_Producto'].'>'.$oProductoServicio[$i]['NombreProducto'];
          echo '<select name="CantidadProducto[]" multiple="multiple">';
                    for ($j = 1; $j <= $oProductoServicio[$i]['CantidadUnidad']; $j++) {
                        echo '<option value='.$j.'>'.$j.'</option>';
                    }
          echo '</select><br/>';
        }
        ?>
        <input type="submit" name="ProductoServicio" value="Agregar Productos">
    </form>

<?php } ?>
</body>
</html>


