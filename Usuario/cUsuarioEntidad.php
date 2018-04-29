<?php 

class sUsuarioEntidad{


protected $_nId_Empleado = null;
protected $_sRol = null;
protected $_sNombreUsuario = null;
protected $_sContraseña = null;

public function setId_Empleado($nId_Empleado){
	$this->_nId_Empleado = $nId_Empleado;

}
# EL METODO OBTIENE EL VALOR DE LOS ATRIBUTOS Y SE PUEDE UTILIZAR EN CUALQUIER CLASE DEBIDO A QUE ES PUBLICO
public function getId_Empleado(){
	return $this->_sId_Empleado;

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
public function setContraseña($sContraseña){
	$this->_sContraseña = $sContraseña;

}
# EL METODO OBTIENE EL VALOR DE LOS ATRIBUTOS Y SE PUEDE UTILIZAR EN CUALQUIER CLASE DEBIDO A QUE ES PUBLICO
public function getContraseña(){
	return $this->_sContraseña;

}


}


 ?>