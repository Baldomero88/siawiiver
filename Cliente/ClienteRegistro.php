<?php 

require_once('cClienteEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cClienteModelo.php');

$nId_PuntoAcceso = $_POST['nId_PuntoAcceso'];
$sNombreCliente = $_POST['sNombreCliente'];
$sDireccionCliente = $_POST['sDireccionCliente'];
$sLocalidad = $_POST['sLocalidad'];
$sMunicipio = $_POST['sMunicipio'];
$sTelefonoCliente = $_POST['sTelefonoCliente'];
$sReferencia = $_POST['sReferencia'];

#se crea el objeto  oClienteEntidad 
$oClienteEntidad = new cClienteEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();


# el objeto llama al metodo para asignar parametro

$oClienteEntidad->setId_PuntoAcceso($nId_PuntoAcceso);
$oClienteEntidad->setNombreCliente($sNombreCliente);
$oClienteEntidad->setDireccionCliente($sDireccionCliente);
$oClienteEntidad->setLocalidad($sLocalidad);
$oClienteEntidad->setMunicipio($sMunicipio);
$oClienteEntidad->setTelefonoCliente($sTelefonoCliente);
$oClienteEntidad->setReferencia($sReferencia);

$oClienteModelo = New cClienteModelo($dbLink, $oClienteEntidad);
if (isset($_POST['RegistrarCliente'])) {
    $oClienteModelo->RegistrarCliente();
}
elseif(isset($_POST['modificarCliente'])) {
    $nId_Cliente = $_POST['Id_Cliente'];
    $oClienteEntidad->setId_Cliente($nId_Cliente);
    $oClienteModelo->ModificarCliente();
}


?>