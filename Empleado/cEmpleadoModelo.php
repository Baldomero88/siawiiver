<?php 
#
//require_once('cEmpleadoEntidad.php');

class cEmpleadoModelo{

protected $_dblink;
protected $_oEmpleado;

function cEmpleadoModelo($dblink, $oEmpleadoEntidad){

	$this->_dblink = $dblink;
	$this->_oEmpleado = $oEmpleadoEntidad;
}

#metodo para insertar los datos del empleado
public function RegistrarEmpleado(){

$sNombreEmpleado = $this->_oEmpleado->getNombreEmpleado();
$sDireccionEmpleado = $this->_oEmpleado->getDireccionEmpleado();
$sTelefonoEmpleado = $this->_oEmpleado->getTelefonoEmpleado();
$sPueasto = $this->_oEmpleado->getPuesto();
$nHonorario = $this->_oEmpleado->getHonorario();

//var_dump($this->_sNombreEmpleado);
//	mysqli_query($this->_dblink, "INSERT INTO Empleado (`NombreEmpleado`, `DireccionEmpleado`, `TelefonoEmpleado`, `Puesto`, `Honorario`) VALUES ($this->_sNombreEmpleado, $this->_sDireccionEmpleado, $this->_sTelefonoEmpleado, $this->_sPuesto, $this->_nHonorario)") or die(mysqli_error($this->_dblink));

var_dump($this->_dblinks);
	$sql ="INSERT INTO Empleado (NombreEmpleado, DireccionEmpleado, TelefonoEmpleado, Puesto, Honorario) VALUES ('$sNombreEmpleado', '$sDireccionEmpleado', '$sTelefonoEmpleado', '$sPueasto', '$nHonorario')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error());
	mysqli_close($this->_dblink);
}

}


 ?>