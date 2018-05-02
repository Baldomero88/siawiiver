<?php 

class cProvedorModelo{

protected $_dblink;
protected $_oProvedor;

function cProvedorModelo($dblink, $oProvedorEntidad){

	$this->_dblink = $dblink;
	$this->_oProvedor = $oProvedorEntidad;
}

#metodo para insertar los datos del empleado
public function RegistrarProvedor(){

$sNombreCompañia = $this->_oProvedor->getNombreCompañia();
$sNombreContactoCompañia = $this->_oProvedor->getNombreContactoCompañia();
$sDireccionCompañia = $this->_oProvedor->getDireccionCompañia();
$sCiudad = $this->_oProvedor->getCiudad();
$nCodigoPostal = $this->_oProvedor->getCodigoPostal();
$sPais = $this->_oProvedor->getPais();
$sTelefonoCompañia = $this->_oProvedor->getTelefonoCompañia();
$sPaginaWeb = $this->_oProvedor->getPaginaWeb();



//var_dump($this->_sNombreEmpleado);
//	mysqli_query($this->_dblink, "INSERT INTO Empleado (`NombreEmpleado`, `DireccionEmpleado`, `TelefonoEmpleado`, `Puesto`, `Honorario`) VALUES ($this->_sNombreEmpleado, $this->_sDireccionEmpleado, $this->_sTelefonoEmpleado, $this->_sPuesto, $this->_nHonorario)") or die(mysqli_error($this->_dblink));


	$sql ="INSERT INTO Provedor (NombreCompañia, NombreContactoCompañia, DireccionCompañia, Ciudad, CodigoPostal, Pais, TelefonoCompañia, PaginaWeb) VALUES ('$sNombreCompañia', '$sNombreContactoCompañia', '$sDireccionCompañia', '$sCiudad', '$nCodigoPostal', '$sPais', '$sTelefonoCompañia', '$sPaginaWeb')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error());
	mysqli_close($this->_dblink);
}

}


?>