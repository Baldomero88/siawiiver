<?php 

class cPuntoAccesoModelo{

	protected $_dblink;
	protected $_oPuntoAcceso;
	public $aFields = array();

function cPuntoAccesoModelo($dbLink, $oPuntoAccesoEntidad = false){

	$this->_dblink = $dbLink;
	$this->_oPuntoAcceso = $oPuntoAccesoEntidad;

}

public function RegistrarPuntoAcceso(){

	$sNombrePuntoAcceso = $this->_oPuntoAcceso->getNombrePuntoAcceso();
	$sUbicacion = $this->_oPuntoAcceso->getUbicacion();
	$sNombreContacto = $this->_oPuntoAcceso->getNombreContacto();
	$sTelefonoPuntoAcceso = $this->_oPuntoAcceso->getTelefonoPuntoAcceso();
	$sDireccionMac = $this->_oPuntoAcceso->getDireccionMac();
	$sContraseñaWifi = $this->_oPuntoAcceso->getContraseñaWifi();

	$sql ="INSERT INTO PuntoAcceso (NombrePuntoAcceso, Ubicacion, NombreContacto, TelefonoPuntoAcceso, DireccionMac, ContraseñaWifi) VALUES ('$sNombrePuntoAcceso', '$sUbicacion', '$sNombreContacto', '$sTelefonoPuntoAcceso', 
	'$sDireccionMac', '$sContraseñaWifi')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	mysqli_close($this->_dblink);

}

public function ObtenerPuntoAccesoCliente(){
	
	$sql ="SELECT Id_PuntoAcceso, NombrePuntoAcceso FROM PuntoAcceso";	
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	if ($result->num_rows === 0){exit;}

	while($row = $result->fetch_assoc()) {
		$this->aFields[] = $row;
	}
	
	return $this->aFields;
}  
}

?>