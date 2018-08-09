<?php 

require_once('cCobranzaEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cCobranzaModelo.php');


$nId_Servicio = $_POST['nId_Servicio'];
$sTipoPaquete = $_POST['sTipoPaquete'];
$sMesPago = $_POST['sMesPago'];
$sEstadoPago = $_POST['sEstadoPago'];

#se crea el objeto  oCobranzaEntidad 
$oCobranzaEntidad = new cCobranzaEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();


# el objeto llama al metodo para asignar parametro
$oCobranzaEntidad->setId_Servicio($nId_Servicio);
$oCobranzaEntidad->setTipoPaquete($sTipoPaquete);
$oCobranzaEntidad->setMesPago($sMesPago);
$oCobranzaEntidad->setEstadoPago($sEstadoPago);

$oCobranzaModelo = New cCobranzaModelo($dbLink, $oCobranzaEntidad);
$oCobranzaModelo->RegistrarCobranza();

?>