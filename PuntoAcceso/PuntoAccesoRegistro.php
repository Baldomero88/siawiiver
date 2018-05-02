<?php 

require_once('cPuntoAccesoEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cPuntoAccesoModelo.php');

$sNombrePuntoAcceso = $_POST['sNombrePuntoAcceso'];
$sUbicacion = $_POST['sUbicacion'];
$sNombreContacto = $_POST['sNombreContacto'];
$sTelefonoPuntoAcceso = $_POST['sTelefonoPuntoAcceso'];
$sDireccionMac = $_POST['sDireccionMac'];
$sContraseñaWifi = $_POST['sContraseñaWifi'];

echo $sNombrePuntoAcceso;
echo $sUbicacion;
echo $sNombreContacto;
echo $sTelefonoPuntoAcceso;
echo $sDireccionMac;
echo $sContraseñaWifi;


$oPuntoAccesoEntidad = new cPuntoAccesoEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();


$oPuntoAccesoEntidad->setNombrePuntoAcceso($sNombrePuntoAcceso);
$oPuntoAccesoEntidad->setUbicacion($sUbicacion);
$oPuntoAccesoEntidad->setNombreContacto($sNombreContacto);
$oPuntoAccesoEntidad->setTelefonoPuntoAcceso($sTelefonoPuntoAcceso);
$oPuntoAccesoEntidad->setDireccionMac($sDireccionMac);
$oPuntoAccesoEntidad->setContraseñaWifi($sContraseñaWifi);

$oPuntoAccesoModelo = New cPuntoAccesoModelo($dbLink, $oPuntoAccesoEntidad);
$oPuntoAccesoModelo->RegistrarPuntoAcceso();


 ?>