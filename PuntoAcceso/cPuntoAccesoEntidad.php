<?php 

class cPuntoAccesoEntidad{

protected $_IdPuntoAcceso = null;
protected $_sNombrePuntoAcceso = null;
protected $_Ubicacion = null;
protected $_NombreContacto = null;
protected $_TelefonoPuntoAcceso = null;
protected $_DireccionMac = null;
protected $_ContrasenaWifi = null;

public function setIdPuntoAcceso($IdPuntoAcceso){
	$this->_IdPuntoAcceso = $IdPuntoAcceso;
}
public function getIdPuntoAcceso(){
	return $this->_sIdPuntoAcceso;
}

public function setNombrePuntoAcceso($sNombrePuntoAcceso){
	$this->_sNombrePuntoAcceso = $sNombrePuntoAcceso;
}
public function getNombrePuntoAcceso(){
	return $this->_sNombrePuntoAcceso;
}

public function setUbicacion($sUbicacion){
	$this->_sUbicacion = $sUbicacion;
}
public function getUbicacion(){
	return $this->_sUbicacion;
}

public function setNombreContacto($sNombreContacto){
	$this->_sNombreContacto = $sNombreContacto;
}
public function getNombreContacto(){
	return $this->_sNombreContacto;
}

public function setTelefonoPuntoAcceso($sTelefonoPuntoAcceso){
	$this->_sTelefonoPuntoAcceso = $sTelefonoPuntoAcceso;
}
public function getTelefonoPuntoAcceso(){
	return $this->_sTelefonoPuntoAcceso;
}

public function setDireccionMac($sDireccionMac){
	$this->_sDireccionMac = $sDireccionMac;
}
public function getDireccionMac(){
	return $this->_sDireccionMac;
}

public function setContrasenaWifi($sContrasenaWifi){
	$this->_sContrasenaWifi = $sContrasenaWifi;
}
public function getContrasenaWifi(){
	return $this->_sContrasenaWifi;
}

}

?>