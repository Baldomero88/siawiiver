<?php 

require_once('cCobranzaEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cCobranzaModelo.php');


$nId_Servicio = $_POST['nId_Servicio'];
$sMesPago = $_POST['sMesPago'];
$nAnoPago = $_POST['nAnoPago'];
$nServicio = $_POST['nServicio'];
$nOtrosCargos = $_POST['nOtrosCargos'];
$sEstadoPago = $_POST['sEstadoPago'];

#se crea el objeto  oCobranzaEntidad 
$oCobranzaEntidad = new cCobranzaEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();


# el objeto llama al metodo para asignar parametro
$oCobranzaEntidad->setId_Servicio($nId_Servicio);
$oCobranzaEntidad->setMesPago($sMesPago);
$oCobranzaEntidad->setAnoPago($nAnoPago);
$oCobranzaEntidad->setServicio($nServicio);
$oCobranzaEntidad->setOtrosCargos($nOtrosCargos);
$oCobranzaEntidad->setEstadoPago($sEstadoPago);

$oCobranzaModelo = New cCobranzaModelo($dbLink, $oCobranzaEntidad);
$oCobranzaModelo->RegistrarCobranza();

?>