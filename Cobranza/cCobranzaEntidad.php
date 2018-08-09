<?php 

class cCobranzaEntidad{

protected $_nId_Cobranza = null;
protected $_nId_Servicio = null; 
protected $_sMesPago = null;
protected $_sEstadoPago = null;

public function setId_Cobranza($nId_Cobranza){
	$this->_nId_Cobranza = $nId_Cobranza;

}

public function getId_Cobranza(){
	return $this->_nId_Cobranza;

}

public function setId_Servicio($nId_Servicio){
	$this->_nId_Servicio = $nId_Servicio;

}

public function getId_Servicio(){
	return $this->_nId_Servicio;

}

public function setMesPago($sMesPago){
	$this->_sMesPago = $sMesPago;

}

public function getMesPago(){
	return $this->_sMesPago;

}

public function setEstadoPago($sEstadoPago){
	$this->_sEstadoPago = $sEstadoPago;

}

public function getEstadoPago(){
	return $this->_sEstadoPago;

}

}


 ?>