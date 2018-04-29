<?php 
#
//require_once('cEmpleadoEntidad.php');

class cEmpleadoModelo{

protected $_dblink = null;
protected $_oEmpleado = null;
protected $_sNombreEmpleado = null;
protected $_sDireccionEmpleado = null;
protected $_sTelefonoEmpleado = null;
protected $_sPuesto = null;
protected $_nHonorario= null;


function cEmpleadoModelo($dblink, $oEmpleadoEntidad){

	$this->_dblink = $dblink;
	$this->_oEmpleado = $oEmpleadoEntidad;

	$this->_sNombreEmpleado = (string) $this->_oEmpleado->getNombreEmpleado();
	$this->_sDireccionEmpleado = (string)$this->_oEmpleado->getDireccionEmpleado();
	$this->_sTelefonoEmpleado = (string) $this->_oEmpleado->getTelefonoEmpleado();
	$this->_sPuesto = (string) $this->_oEmpleado->getPuesto();
	$this->_nHonorario = (string) $this->_oEmpleado->getHonorario();


}


#metodo para insertar los datos del empleado
public function RegistrarEmpleado(){
var_dump($this->_sNombreEmpleado);
	mysqli_query($this->_dblink, "INSERT INTO Empleado (`NombreEmpleado`, `DireccionEmpleado`, `TelefonoEmpleado`, `Puesto`, `Honorario`) VALUES ($this->_sNombreEmpleado, $this->_sDireccionEmpleado, $this->_sTelefonoEmpleado, $this->_sPuesto, $this->_nHonorario)") or die(mysqli_error($this->_dblink));


//	$sql ="INSERT INTO Empleado (NombreEmpleado, DireccionEmpleado, TelefonoEmpleado, Puesto, Honorario) VALUES ('$this->_sNombreEmpleado', '$this->_sDireccionEmpleado', '$this->_sTelefonoEmpleado', '$this->_sPuesto', '$this->_nHonorario')";
//	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error());
//	mysqli_close($this->_dblink);
}

}


 ?>