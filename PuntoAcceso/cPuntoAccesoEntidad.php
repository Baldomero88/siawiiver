<?php 

class cPuntoAccesoEntidad{

protected $_nId_PuntoAcceso = null;
protected $_sNombrePuntoAcceso = null;
protected $_sUbicacion = null;
protected $_sNombreContacto = null;
protected $_sTelefonoPuntoAcceso = null;
protected $_sDireccionMac = null;
protected $_sContrasenaWifi = null;

public function setId_PuntoAcceso($nId_PuntoAcceso){
	$this->_nId_PuntoAcceso = $nId_PuntoAcceso;
}
public function getId_PuntoAcceso(){
	return $this->_nId_PuntoAcceso;
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