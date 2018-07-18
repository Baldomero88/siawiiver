<?php 

class cUsuarioEntidad{

protected $_nId_Usuario = null;
protected $_nId_Empleado = null;
protected $_sRol = null;
protected $_sNombreUsuario = null;
protected $_sContrasena = null;

public function setId_Usuario($nId_Usuario){
	$this->_nId_Usuario = $nId_Usuario;

}

public function getId_Usuario(){
	return $this->_nId_Usuario;

}

public function setId_Empleado($nId_Empleado){
	$this->_nId_Empleado = $nId_Empleado;

}
# EL METODO OBTIENE EL VALOR DE LOS ATRIBUTOS Y SE PUEDE UTILIZAR EN CUALQUIER CLASE DEBIDO A QUE ES PUBLICO
public function getId_Empleado(){
	return $this->_nId_Empleado;

}
public function setRol($sRol){
	$this->_sRol = $sRol;

}
# EL METODO OBTIENE EL VALOR DE LOS ATRIBUTOS Y SE PUEDE UTILIZAR EN CUALQUIER CLASE DEBIDO A QUE ES PUBLICO
public function getRol(){
	return $this->_sRol;

}

public function setNombreUsuario($sNombreUsuario){
	$this->_sNombreUsuario = $sNombreUsuario;

}
# EL METODO OBTIENE EL VALOR DE LOS ATRIBUTOS Y SE PUEDE UTILIZAR EN CUALQUIER CLASE DEBIDO A QUE ES PUBLICO
public function getNombreUsuario(){
	return $this->_sNombreUsuario;

}
public function setContrasena($sContrasena){
	$this->_sContrasena = $sContrasena;

}
# EL METODO OBTIENE EL VALOR DE LOS ATRIBUTOS Y SE PUEDE UTILIZAR EN CUALQUIER CLASE DEBIDO A QUE ES PUBLICO
public function getContrasena(){
	return $this->_sContrasena;

}


}


 ?>