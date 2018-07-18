<?php 

require_once('cPuntoAccesoEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cPuntoAccesoModelo.php');

$sNombrePuntoAcceso = $_POST['sNombrePuntoAcceso'];
$sUbicacion = $_POST['sUbicacion'];
$sNombreContacto = $_POST['sNombreContacto'];
$sTelefonoPuntoAcceso = $_POST['sTelefonoPuntoAcceso'];
$sDireccionMac = $_POST['sDireccionMac'];
$sContrasenaWifi = $_POST['sContrasenaWifi'];

$oPuntoAccesoEntidad = new cPuntoAccesoEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();


$oPuntoAccesoEntidad->setNombrePuntoAcceso($sNombrePuntoAcceso);
$oPuntoAccesoEntidad->setUbicacion($sUbicacion);
$oPuntoAccesoEntidad->setNombreContacto($sNombreContacto);
$oPuntoAccesoEntidad->setTelefonoPuntoAcceso($sTelefonoPuntoAcceso);
$oPuntoAccesoEntidad->setDireccionMac($sDireccionMac);
$oPuntoAccesoEntidad->setContrasenaWifi($sContrasenaWifi);

$oPuntoAccesoModelo = New cPuntoAccesoModelo($dbLink, $oPuntoAccesoEntidad);
if (isset($_POST['RegistrarPuntoAcceso'])) {
    $oPuntoAccesoModelo->RegistrarPuntoAcceso();
}
elseif(isset($_POST['modificarPuntoAcceso'])) {
    $nId_PuntoAcceso = $_POST['Id_PuntoAcceso'];
    $oPuntoAccesoEntidad->setId_PuntoAcceso($nId_PuntoAcceso);
    $oPuntoAccesoModelo->ModificarPuntoAcceso();
}

 ?>