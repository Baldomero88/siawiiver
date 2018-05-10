<?php 

require_once('cProductoEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cProductoModelo.php');


$nId_Provedor = $_POST['nId_Provedor'];
$sNombreProducto = $_POST['sNombreProducto'];
$nCantidadUnidad = $_POST['nCantidadUnidad'];
$nPrecioUnidad = $_POST['nPrecioUnidad'];
$nUnidadAlmacen = $_POST['nUnidadAlmacen'];
$nUnidadServicio = $_POST['nUnidadServicio'];
$nReordenarNivel = $_POST['nReordenarNivel'];
$nTerminado = $_POST['nTerminado'];

#se crea el objeto  oProductoEntidad 
$oProductoEntidad = new cProductoEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();


# el objeto llama al metodo para asignar parametro
$oProductoEntidad->setId_Provedor($nId_Provedor);
$oProductoEntidad->setNombreProducto($sNombreProducto);
$oProductoEntidad->setCantidadUnidad($nCantidadUnidad);
$oProductoEntidad->setPrecioUnidad($nPrecioUnidad);
$oProductoEntidad->setUnidadAlmacen($nUnidadAlmacen);
$oProductoEntidad->setUnidadServicio($nUnidadServicio);
$oProductoEntidad->setReordenarNivel($nReordenarNivel);
$oProductoEntidad->setTerminado($nTerminado);

$oProductoModelo = New cProductoModelo($dbLink, $oProductoEntidad);
$oProductoModelo->RegistrarProducto();

?>