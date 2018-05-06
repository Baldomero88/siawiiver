<?php 
#
//require_once('cClienteEntidad.php');

class cClienteModelo{

protected $_dblink;
protected $_oCliente;
public $aFields = array();

function cClienteModelo($dblink, $oClienteEntidad = false){

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
	$sContrasenaWifi = $this->_oCliente->getContrasenaWifi();


var_dump($this->_dblink);
	$sql ="INSERT INTO Cliente (Id_PuntoAcceso, NombreCliente, DireccionCliente, Localidad, Municipio, TelefonoCliente, Referencia, ContrasenaWifi) VALUES ('$nId_PuntoAcceso', '$sNombreCliente', '$sDireccionCliente', '$sLocalidad', '$sMunicipio', '$sTelefonoCliente', '$sReferencia', '$sContrasenaWifi')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error());
	mysqli_close($this->_dblink);
}

public function ObtenerClienteServicio(){
	
	$sql ="SELECT Id_Cliente, NombreCliente FROM Cliente";	
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	if ($result->num_rows === 0){exit;}

	while($row = $result->fetch_assoc()) {
		$this->aFields[] = $row;
	}
	
	return $this->aFields;
}

}

 ?>