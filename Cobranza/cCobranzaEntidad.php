<?php 

class cCobranzaEntidad{

protected $_nId_Cobranza = null;
protected $_nId_Servicio = null;
protected $_sMesPago = null;
protected $_nAnoPago = null;
protected $_nServicio = null;
protected $_OtrosCargos = null;
protected $_sEstadoPago = null;

public function getId_Cobranza() {
    return $this->_nId_Cobranza;
}

public function getId_Servicio() {
    return $this->_nId_Servicio;
}

public function getMesPago() {
    return $this->_sMesPago;
}

public function getAnoPago() {
    return $this->_nAnoPago;
}

public function getServicio() {
    return $this->_nServicio;
}

public function getOtrosCargos() {
    return $this->_OtrosCargos;
}

public function getEstadoPago() {
    return $this->_sEstadoPago;
}

public function setId_Cobranza($_nId_Cobranza) {
    $this->_nId_Cobranza = $_nId_Cobranza;
}

public function setId_Servicio($_nId_Servicio) {
    $this->_nId_Servicio = $_nId_Servicio;
}

public function setMesPago($_sMesPago) {
    $this->_sMesPago = $_sMesPago;
}

public function setAnoPago($_nAnoPago) {
    $this->_nAnoPago = $_nAnoPago;
}

public function setServicio($_nServicio) {
    $this->_nServicio = $_nServicio;
}

public function setOtrosCargos($_OtrosCargos) {
    $this->_OtrosCargos = $_OtrosCargos;
}

public function setEstadoPago($_sEstadoPago) {
    $this->_sEstadoPago = $_sEstadoPago;
}


}
 ?>