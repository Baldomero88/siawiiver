<?php 
#
//require_once('cClienteEntidad.php');

class cClienteModelo{

protected $_dblink;
protected $_oCliente;

function cClienteModelo($dblink, $oClienteEntidad){

	$this->_dblink = $dblink;
	$this->_oCliente = $oClienteEntidad;
}

#metodo para insertar los datos del Cliente
public function RegistrarCliente(){

$nId_PuntoAcceso = $this->_oCliente->getId_PuntoAcceso();
$sNombreCliente = $this->_oCliente->getNombreCliente();
$sDireccionCliente = $this->_oCliente->getDireccionCliente();
$sLocalidad = $this->_oCliente->getLocalidad();
$sMunicipio = $this->_oCliente->getMunicipio();
$sTelefonoCliente = $this->_oCliente->getTelefonoCliente();
$sReferencia = $this->_oCliente->getReferencia();
$sContraseñaWifi = $this->_oCliente->getContraseñaWifi();


//var_dump($this->_sNombreCliente);
//	mysqli_query($this->_dblink, "INSERT INTO Cliente (`NombreCliente`, `DireccionCliente`, `TelefonoCliente`, `Puesto`, `Honorario`) VALUES ($this->_sNombreCliente, $this->_sDireccionCliente, $this->_sTelefonoCliente, $this->_sPuesto, $this->_nHonorario)") or die(mysqli_error($this->_dblink));


	$sql ="INSERT INTO Cliente (Id_PuntoAcceso, NombreCliente, DireccionCliente, Localidad, Municipio, TelefonoCliente, Referencia, ContraseñaWifi) VALUES ('$nId_PuntoAcceso', '$sNombreCliente', '$sDireccionCliente', '$sLocalidad', '$sMunicipio', '$nTelefonoCliente', '$sReferencia', '$sContraseñaWifi')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error());
	mysqli_close($this->_dblink);
}

}


 ?>