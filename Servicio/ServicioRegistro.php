<?php 

require_once('cServicioEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cServicioModelo.php');


$nId_Empleado = $_POST['nId_Empleado'];
$nId_Cliente = $_POST['nId_Cliente'];
$sTipoPaquete = $_POST['sTipoPaquete'];
$nPrecioPaquete = $_POST['nPrecioPaquete'];
$sDescripcionPaquete = $_POST['sDescripcionPaquete'];
$sTipoServicio = $_POST['sTipoServicio'];
$nPrecioServicio = $_POST['nPrecioServicio'];
$sDescripcionServicio = $_POST['sDescripcionServicio'];
$sFormaPago = $_POST['sFormaPago'];
$sFechaServicio = $_POST['sFechaServicio'];
$sBajaServicio = $_POST['sBajaServicio'];
$sEstadoServicio = $_POST['sEstadoServicio'];

#se crea el objeto  oServicioEntidad 
$oServicioEntidad = new cServicioEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();


# el objeto llama al metodo para asignar parametrosDescripcionPaquete
$oServicioEntidad->setId_Empleado($nId_Empleado);
$oServicioEntidad->setId_Cliente($nId_Cliente);
$oServicioEntidad->setTipoPaquete($sTipoPaquete);
$oServicioEntidad->setPrecioPaquete($nPrecioPaquete);
$oServicioEntidad->setDescripcionPaquete($sDescripcionPaquete);
$oServicioEntidad->setTipoServicio($sTipoServicio);
$oServicioEntidad->setPrecioServicio($nPrecioServicio);
$oServicioEntidad->setDescripcionServicio($sDescripcionServicio);
$oServicioEntidad->setFormaPago($sFormaPago);
$oServicioEntidad->setFechaServicio($sFechaServicio);
$oServicioEntidad->setBajaServicio($sBajaServicio);
$oServicioEntidad->setEstadoServicio($sEstadoServicio);




$oServicioModelo = New cServicioModelo($dbLink, $oServicioEntidad);
$oServicioModelo->RegistrarServicio();

?>