<?php 

class cServicioEntidad{

protected $_nId_Servicio = null;
protected $_nId_Empleado = null;
protected $_nId_Cliente = null;   
protected $_sTipoPaquete = null;  
protected $_nPrecioPaquete = null;  
protected $_sDescripcionPaquete = null;  
protected $_sTipoServicio = null;  
protected $_nPrecioServicio = null;  
protected $_sDescripcionServicio = null;  
protected $_sFormaPago = null;  
protected $_sFechaServicio = null;   

public function setId_Servicio($nId_Servicio){

	$this->_nId_Servicio = $nId_Servicio;
}

public function getId_Servicio(){
	return $this->_nId_Servicio;
}

public function setId_Empleado($nId_Empleado){

	$this->_nId_Empleado = $nId_Empleado;
}

public function getId_Empleado(){
	return $this->_nId_Empleado;
}
public function setId_Cliente($nId_Cliente){
	$this->_nId_Cliente = $nId_Cliente;
}

public function getId_Cliente(){
	return $this->_nId_Cliente;
}
public function setTipoPaquete($sTipoPaquete){

	$this->_sTipoPaquete = $sTipoPaquete;
}

public function getTipoPaquete(){
	return $this->_sTipoPaquete;
}
public function setPrecioPaquete($nPrecioPaquete){

	$this->_nPrecioPaquete = $nPrecioPaquete;
}

public function getPrecioPaquete(){
	return $this->_nPrecioPaquete;
}

public function setDescripcionPaquete($sDescripcionPaquete){
	$this->_sDescripcionPaquete = $sDescripcionPaquete;
}

public function getDescripcionPaquete(){
	return $this->_sDescripcionPaquete;
}
public function setTipoServicio($sTipoServicio){
	$this->_sTipoServicio = $sTipoServicio;
}

public function getTipoServicio(){
	return $this->_sTipoServicio;
}
public function setPrecioServicio($nPrecioServicio){
	$this->_nPrecioServicio = $nPrecioServicio;
}

public function getPrecioServicio(){
	return $this->_nPrecioServicio;
}

public function setDescripcionServicio($sDescripcionServicio){
	$this->_sDescripcionServicio = $sDescripcionServicio;
}

public function getDescripcionServicio(){
	return $this->_sDescripcionServicio;
}

public function setFormaPago($sFormaPago){
	$this->_sFormaPago = $sFormaPago;
}

public function getFormaPago(){
	return $this->_sFormaPago;
}

public function setFechaServicio($sFechaServicio){
	$this->_sFechaServicio = $sFechaServicio;
}

public function getFechaServicio(){
	return $this->_sFechaServicio;
}

public function setBajaServicio($sBajaServicio){
	$this->_sBajaServicio = $sBajaServicio;
}

public function getBajaServicio(){
	return $this->_sBajaServicio;
}

public function setEstadoServicio($sEstadoServicio){
	$this->_sEstadoServicio = $sEstadoServicio;
}

public function getEstadoServicio(){
	return $this->_sEstadoServicio;
}

}

?>