<?php 

class cProvedorEntidad{

protected $_nId_Provedor = null;
protected $_sNombreCompania = null;
protected $_sContactoCompania = null;
protected $_sDireccionCompania = null;
protected $_sCiudad = null;
protected $_nCodigoPostal = null;
protected $_sPais = null;
protected $_sTelefonoCompania = null;
protected $_sPaginaWeb = null;

public function setId_Provedor($nId_Provedor){
	$this->_nId_Provedor = $nId_Provedor;
}
public function getId_Provedor(){
	return $this->_nId_Provedor;
}

public function setNombreCompania($sNombreCompania){
	$this->_sNombreCompania = $sNombreCompania;
}
public function getNombreCompania(){
	return $this->_sNombreCompania;
}

public function setNombreContactoCompania($sNombreContactoCompania){
	$this->_sNombreContactoCompania = $sNombreContactoCompania;
}
public function getNombreContactoCompania(){
	return $this->_sNombreContactoCompania;
}

public function setDireccionCompania($sDireccionCompania){
	$this->_sDireccionCompania = $sDireccionCompania;
}
public function getDireccionCompania(){
	return $this->_sDireccionCompania;
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

public function setTelefonoCompania($sTelefonoCompania){
	$this->_sTelefonoCompania = $sTelefonoCompania;
}
public function getTelefonoCompania(){
	return $this->_sTelefonoCompania;
}

public function setPaginaWeb($sPaginaWeb){
	$this->_sPaginaWeb = $sPaginaWeb;
}
public function getPaginaWeb(){
	return $this->_sPaginaWeb;
}

}


 ?>