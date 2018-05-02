<?php 

class cProvedorEntidad{

protected $_sNombreCompañia = null;
protected $_sContactoCompañia = null;
protected $_sDireccionCompañia = null;
protected $_sCiudad = null;
protected $_nCodigoPostal = null;
protected $_sPais = null;
protected $_sTelefonoCompañia = null;
protected $_sPaginaWeb = null;

public function setNombreCompañia($sNombreCompañia){
	$this->_sNombreCompañia = $sNombreCompañia;
}
public function getNombreCompañia(){
	return $this->_sNombreCompañia;
}

public function setNombreContactoCompañia($sNombreContactoCompañia){
	$this->_sNombreContactoCompañia = $sNombreContactoCompañia;
}
public function getNombreContactoCompañia(){
	return $this->_sNombreContactoCompañia;
}

public function setDireccionCompañia($sDireccionCompañia){
	$this->_sDireccionCompañia = $sDireccionCompañia;
}
public function getDireccionCompañia(){
	return $this->_sDireccionCompañia;
}

public function setCiudad($sCiudad){
	$this->_sCiudad = $sCiudad;
}
public function getCiudad(){
	return $this->_sCiudad;
}

public function setCodigoPostal($nCodigoPostal){
	$this->_nCodigoPostal = $nCodigoPostal;
}
public function getCodigoPostal(){
	return $this->_nCodigoPostal;
}

public function setPais($sPais){
	$this->_sPais = $sPais;
}
public function getPais(){
	return $this->_sPais;
}

public function setTelefonoCompañia($sTelefonoCompañia){
	$this->_sTelefonoCompañia = $sTelefonoCompañia;
}
public function getTelefonoCompañia(){
	return $this->_sTelefonoCompañia;
}

public function setPaginaWeb($sPaginaWeb){
	$this->_sPaginaWeb = $sPaginaWeb;
}
public function getPaginaWeb(){
	return $this->_sPaginaWeb;
}

}


 ?>