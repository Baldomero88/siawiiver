<?php 
#
//require_once('cUsuarioEntidad.php');

class cUsuarioModelo{

protected $_dblink;
protected $_oUsuario;

function cUsuarioModelo($dblink, $oUsuarioEntidad){

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

}

 ?>