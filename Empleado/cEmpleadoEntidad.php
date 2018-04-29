<?php 


#SE CREA LA CLASE EMPLEADO ENTIDAD
class cEmpleadoEntidad{


#SE DECLARAN LOS VALORES COMO NULOS PARA ASIGNAR VAOR POSTERIORMENTE
protected $_sNombreEmpleado = null;
protected $_sDireccionEmpleado = null;
protected $_sTelefonoEmpleado = null;
protected $_sPuesto = null;
protected $_nHonorario = null;

#SE ESTABLECE UN METODO PARA ASIGNAR LOS ATRIBUTOS DE LA CLASE EMPLEADOENTIDAD
public function setNombreEmpleado($sNombreEmpleado){
	$this->_sNombreEmpleado = $sNombreEmpleado;


}
# EL METODO OBTIENE EL VALOR DE LOS ATRIBUTOS Y SE PUEDE UTILIZAR EN CUALQUIER CLASE DEBIDO A QUE ES PUBLICO

public function getNombreEmpleado(){
	return $this->_sNombreEmpleado;

}

public function setDireccionEmpleado($sDireccionEmpleado){
	$this->_sDireccionEmpleado = $sDireccionEmpleado;

}
public function getDireccionEmpleado(){
	return $this->_sDireccionEmpleado;

}

public function setTelefonoEmpleado($sTelefonoEmpleado){
	$this->_sTelefonoEmpleado = $sTelefonoEmpleado;

}
public function getTelefonoEmpleado(){
	return $this->_sTelefonoEmpleado;

}


public function setPuesto($sPuesto){
	$this->_sPuesto = $sPuesto;

}
public function getPuesto(){
	return $this->_sPuesto;

}

public function setHonorario($nHonorario){
	$this->_nHonorario = $nHonorario;

}
public function getHonorario(){
	return $this->_nHonorario;

}

}
#se declara el objeto de la clase empleadoentidad 
#$oEmpleado = new cEmpleadoEntidad;             
#$oEmpleado->setNombreEmpleado('Pedro');      #se envia como parametro al metodo el valor pedro
#echo $oEmpleado->getNombreEmpleado();        #obtenemos el valor del parametro establecido y se  imprime que se ocuparan en otros archivos

 ?>