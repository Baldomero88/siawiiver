<?php 

class cPuntoAccesoEntidad{


protected $_NombrePuntoAcceso = null;
protected $_Ubicacion = null;
protected $_NombreContacto = null;
protected $_TelefonoPuntoAcceso = null;
protected $_DireccionMac = null;
protected $_ContraseñaWifi = null;

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

public function setContraseñaWifi($sContraseñaWifi){
	$this->_sContraseñaWifi = $sContraseñaWifi;
}
public function getContraseñaWifi(){
	return $this->_sContraseñaWifi;
}

}

?>