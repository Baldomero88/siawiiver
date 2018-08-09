<?php 
#
//require_once('cUsuarioEntidad.php');

class cUsuarioModelo{

protected $_dblink;
protected $_oUsuario;

function cUsuarioModelo($dblink, $oUsuarioEntidad = false){

	$this->_dblink = $dblink;
	$this->_oUsuario = $oUsuarioEntidad;
}

#metodo para insertar los datos del Usuario
public function RegistrarUsuario(){

	$nId_Empleado = $this->_oUsuario->getId_Empleado();
	$sRol = $this->_oUsuario->getRol();
	$sNombreUsuario = $this->_oUsuario->getNombreUsuario();
	$sContrasena = $this->_oUsuario->getContrasena();

	$sql ="INSERT INTO Usuario (Id_Empleado, Rol, NombreUsuario, Contrasena) VALUES ('$nId_Empleado', '$sRol', '$sNombreUsuario', '$sContrasena')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	mysqli_close($this->_dblink);
}

public function obtenerListadoUsuario(){
		$sql ="SELECT NombreEmpleado, Id_Usuario, Rol, NombreUsuario, Contrasena
				FROM Empleado AS EM, Usuario AS US
				WHERE EM.Id_Empleado = US.Id_Empleado";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;

}

public function obtenerListadoUsuarioPorId($nIdUsuario){
		$sql ="SELECT NombreEmpleado, Id_Usuario, Rol, NombreUsuario, Contrasena
				FROM Empleado AS EM, Usuario AS US
				WHERE EM.Id_Empleado = US.Id_Empleado
				AND Id_Usuario = $nIdUsuario";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;

}

	public function ModificarUsuario(){
		$nId_Usuario = $this->_oUsuario->getId_Usuario();
		$nId_Empleado = $this->_oUsuario->getId_Empleado();

		$sRol = $this->_oUsuario->getRol();
		$sNombreUsuario = $this->_oUsuario->getNombreUsuario();
		$nContrasena = $this->_oUsuario->getContrasena();
	

		$sql =" UPDATE Usuario
				SET	Id_Empleado = '$nId_Empleado',
				    Rol = '$sRol',
					NombreUsuario = '$sNombreUsuario',
					Contrasena = '$nContrasena',
				WHERE Id_Usuario = $nId_Usuario";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
	}

    public function eliminarUsuarioPorId($nId_Usuario){
		$sql =" DELETE FROM Usuario
				WHERE Id_Usuario = $nId_Usuario";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    
}
}

 ?>