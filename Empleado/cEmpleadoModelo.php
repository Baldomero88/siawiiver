<?php 
#
//require_once('cEmpleadoEntidad.php');

class cEmpleadoModelo{

protected $_dblink;
protected $_oEmpleado;
public $aFields = array();

function cEmpleadoModelo($dblink, $oEmpleadoEntidad = false){

	$this->_dblink = $dblink;
	$this->_oEmpleado = $oEmpleadoEntidad;
}

#metodo para insertar los datos del empleado
public function RegistrarEmpleado(){

$sNombreEmpleado = $this->_oEmpleado->getNombreEmpleado();
$sDireccionEmpleado = $this->_oEmpleado->getDireccionEmpleado();
$sTelefonoEmpleado = $this->_oEmpleado->getTelefonoEmpleado();
$sPuesto = $this->_oEmpleado->getPuesto();
$nHonorario = $this->_oEmpleado->getHonorario();


	$sql ="INSERT INTO Empleado (NombreEmpleado, DireccionEmpleado, TelefonoEmpleado, Puesto, Honorario) VALUES ('$sNombreEmpleado', '$sDireccionEmpleado', '$sTelefonoEmpleado', '$sPuesto', '$nHonorario')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	mysqli_close($this->_dblink);



}

public function ObtenerEmpleadoUsuario(){
	
	$sql ="SELECT Id_Empleado, NombreEmpleado FROM Empleado";	
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	if ($result->num_rows === 0){exit;}

	while($row = $result->fetch_assoc()) {
		$this->aFields[] = $row;
	}
	
	return $this->aFields;

}

public function ObtenerEmpleadoServicio(){
	
	$sql ="SELECT Id_Empleado, NombreEmpleado FROM Empleado";	
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	if ($result->num_rows === 0){exit;}

	while($row = $result->fetch_assoc()) {
		$this->aFields[] = $row;
	}
	
	return $this->aFields;
}
	public function obtenerListadoEmpleado(){
		$sql ="SELECT Id_Empleado, NombreEmpleado, DireccionEmpleado,  TelefonoEmpleado, Puesto, Honorario
				FROM Empleado AS Em
				WHERE Em.Id_Empleado";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function obtenerListadoEmpleadoPorId($nIdEmpleado){
		$sql ="SELECT Id_Empleado, NombreEmpleado, DireccionEmpleado, TelefonoEmpleado, Puesto, Honorario
				FROM Empleado AS Em
				WHERE Em.Id_Empleado";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function ModificarEmpleado(){
		$nId_Empleado = $this->_oEmpleado->getId_Empleado();
		$sNombreEmpleado = $this->_oEmpleado->getNombreEmpleado();
		$sDireccionEmpleado = $this->_oEmpleado->getDireccionEmpleado();
		$sTelefonoEmpleado = $this->_oEmpleado->getTelefonoEmpleado();
		$sPuesto = $this->_oEmpleado->getPuesto();
		$nHonorario = $this->_oEmpleado->getHonorario();

		$sql =" UPDATE Empleado
				SET	NombreEmpleado = '$sNombreEmpleado',
					DireccionEmpleado = '$sDireccionEmpleado',
					TelefonoEmpleado = '$sTelefonoEmpleado',
					Puesto = '$sPuesto',
					Honorario = '$nHonorario'
				WHERE Id_Empleado = $nId_Empleado";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }

    public function eliminarEmpleadoPorId($nId_Empleado){
		$sql =" DELETE FROM Empleado
				WHERE Id_Empleado = $nId_Empleado";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }


}


 ?>