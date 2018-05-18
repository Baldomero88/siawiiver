<?php 

class cProductoEntidad{

protected $_nId_Producto = null;
protected $_nId_Provedor = null; 
protected $_sNombreProducto = null;
protected $_nCantidadUnidad = null;
protected $_nPrecioUnidad = null;
protected $_nUnidadAlmacen = null;
protected $_nUnidadServicio = null;
protected $_nReordenarNivel = null;
protected $_nTerminado = null;

public function setId_Producto($nId_Producto){
	$this->_nId_Producto = $nId_Producto;

}

public function getId_Producto(){
	return $this->_nId_Producto;

}

public function setId_Provedor($nId_Provedor){
	$this->_nId_Provedor = $nId_Provedor;

}

public function getId_Provedor(){
	return $this->_nId_Provedor;

}

public function setNombreProducto($sNombreProducto){
	$this->_sNombreProducto = $sNombreProducto;

}

public function getNombreProducto(){
	return $this->_sNombreProducto;

}

public function setCantidadUnidad($nCantidadUnidad){
	$this->_nCantidadUnidad = $nCantidadUnidad;

}

public function getCantidadUnidad(){
	return $this->_nCantidadUnidad;

}

public function setPrecioUnidad($nPrecioUnidad){
	$this->_nPrecioUnidad = $nPrecioUnidad;

}

public function getPrecioUnidad(){
	return $this->_nPrecioUnidad;

}

public function setUnidadAlmacen($nUnidadAlmacen){
	$this->_nUnidadAlmacen = $nUnidadAlmacen;

}

public function getUnidadAlmacen(){
	return $this->_nUnidadAlmacen;

}

public function setUnidadServicio($nUnidadServicio){
	$this->_nUnidadServicio = $nUnidadServicio;

}

public function getUnidadServicio(){
	return $this->_nUnidadServicio;

}

public function setReordenarNivel($nReordenarNivel){
	$this->_nReordenarNivel = $nReordenarNivel;

}

public function getReordenarNivel(){
	return $this->_nReordenarNivel;

}

public function setTerminado($nTerminado){
	$this->_nTerminado = $nTerminado;

}

public function getTerminado(){
	return $this->_nTerminado;

}


}


 ?>