<?php 

class cPuntoAccesoModelo{

	protected $_dbLink;
	protected $_oPuntoAcceso;

function cPuntoAccesoModelo($dbLink, $oPuntoAccesoEntidad){

	$this->_dbLink = $dbLink;
	$this->_oPuntoAcceso = $oPuntoAccesoEntidad;

}

public function RegistrarPuntoAcceso(){

$sNombrePuntoAcceso = $this->_oPuntoAcceso->getNombrePuntoAcceso();
$sUbicacion = $this->_oPuntoAcceso->getUbicacion();
$sNombreContacto = $this->_oPuntoAcceso->getNombreContacto();
$sTelefonoPuntoAcceso = $this->_oPuntoAcceso->getTelefonoPuntoAcceso();
$sDireccionMac = $this->_oPuntoAcceso->getDireccionMac();
$sContraseñaWifi = $this->_oPuntoAcceso->getContraseñaWifi();

var_dump($this->_dbLink);

	$sql ="INSERT INTO PuntoAcceso (NombrePuntoAcceso, Ubicacion, NombreContacto, TelefonoPuntoAcceso, DireccionMac, ContraseñaWifi) VALUES ('$sNombrePuntoAcceso', '$sUbicacion', '$sNombreContacto', '$sTelefonoPuntoAcceso', 
	'$sDireccionMac', '$sContraseñaWifi')";
	$result = mysqli_query($this->_dbLink, $sql) or die ('Error:'.mysqli_error());
	mysqli_close($this->_dbLink);
}


}

?>