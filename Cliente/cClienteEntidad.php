<?php 


class cClienteEntidad{


protected $_nId_PuntoAcceso = null; 
protected $_sNombreCliente = null;
protected $_sDireccionCliente = null;
protected $_sLocalidad = null;
protected $_sMunicipio = null;
protected $_sTelefonoCliente = null;
protected $_sReferencia = null;
protected $_sContraseñaWifi = null;

public function setId_PuntoAcceso($nId_PuntoAcceso){
	$this->$_nId_PuntoAcceso = $Id_PuntoAcceso;

}

public function getId_PuntoAcceso(){
	return $this->_nId_PuntoAcceso;

}

public function setNombreCliente($sNombreCliente){
	$this->_sNombreCliente = $sNombreCliente;

}
public function getNombreCliente(){
	return $this->_sNombreCliente;

}

public function setDireccionCliente($sDireccionCliente){
	$this->_sDireccionCliente = $sDireccionCliente;

}
public function getDireccionCliente(){
	return $this->_sDireccionCliente;

}

public function setLocalidad($sLocalidad){
	$this->_sLocalidad = $sLocalidad;

}
public function getLocalidad(){
	return $this->_sLocalidad;

}

public function setMunicipio($sMunicipio){
	$this->_sMunicipio = $sMunicipio;

}
public function getMunicipio(){
	return $this->_sMunicipio;

}


public function setTelefonoCliente($sTelefonoCliente){
	$this->_sTelefonoCliente = $sTelefonoCliente;

}
public function getTelefonoCliente(){
	return $this->_sTelefonoCliente;

}

public function setReferencia($sReferencia){
	$this->_sReferencia = $sReferencia;

}
public function getReferencia(){
	return $this->_sReferencia;

}

public function setContraseñaWifi($sContraseñaWifi){
	$this->_sContraseñaWifi = $sContraseñaWifi;

}
public function getContraseñaWifi(){
	return $this->_sContraseñaWifi;

}


}


?>