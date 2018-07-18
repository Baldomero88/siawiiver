<?php 

class cPuntoAccesoModelo{

	protected $_dblink;
	protected $_oPuntoAcceso;
	public $aFields = array();

function cPuntoAccesoModelo($dbLink, $oPuntoAccesoEntidad = false){

	$this->_dblink = $dbLink;
	$this->_oPuntoAcceso = $oPuntoAccesoEntidad;

}

public function RegistrarPuntoAcceso(){

	$sNombrePuntoAcceso = $this->_oPuntoAcceso->getNombrePuntoAcceso();
	$sUbicacion = $this->_oPuntoAcceso->getUbicacion();
	$sNombreContacto = $this->_oPuntoAcceso->getNombreContacto();
	$sTelefonoPuntoAcceso = $this->_oPuntoAcceso->getTelefonoPuntoAcceso();
	$sDireccionMac = $this->_oPuntoAcceso->getDireccionMac();
	$sContrasenaWifi = $this->_oPuntoAcceso->getContrasenaWifi();

	$sql ="INSERT INTO PuntoAcceso (NombrePuntoAcceso, Ubicacion, NombreContacto, TelefonoPuntoAcceso, DireccionMac, ContrasenaWifi) VALUES ('$sNombrePuntoAcceso', '$sUbicacion', '$sNombreContacto', '$sTelefonoPuntoAcceso', 
	'$sDireccionMac', '$sContrasenaWifi')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	mysqli_close($this->_dblink);

}

public function ObtenerPuntoAccesoCliente(){
	
	$sql ="SELECT Id_PuntoAcceso, NombrePuntoAcceso FROM PuntoAcceso";	
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	if ($result->num_rows === 0){exit;}

	while($row = $result->fetch_assoc()) {
		$this->aFields[] = $row;
	}
	
	return $this->aFields;
}  

public function obtenerListadoPuntoAcceso(){
		$sql ="SELECT Id_PuntoAcceso, NombrePuntoAcceso, Ubicacion,  NombreContacto, TelefonoPuntoAcceso, DireccionMac, ContrasenaWifi
				FROM PuntoAcceso AS Em
				WHERE Em.Id_PuntoAcceso";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function obtenerListadoPuntoAccesoPorId($nIdPuntoAcceso){
		$sql ="SELECT Id_PuntoAcceso, NombrePuntoAcceso, Ubicacion, NombreContacto, TelefonoPuntoAcceso, DireccionMac, ContrasenaWifi
				FROM PuntoAcceso
				WHERE Id_PuntoAcceso = $nIdPuntoAcceso";
				
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function ModificarPuntoAcceso(){
		$nId_PuntoAcceso = $this->_oPuntoAcceso->getId_PuntoAcceso();
		$sNombrePuntoAcceso = $this->_oPuntoAcceso->getNombrePuntoAcceso();
		$sUbicacion = $this->_oPuntoAcceso->getUbicacion();
		$sNombreContacto = $this->_oPuntoAcceso->getNombreContacto();
		$sTelefonoPuntoAcceso = $this->_oPuntoAcceso->getTelefonoPuntoAcceso();
		$sDireccionMac = $this->_oPuntoAcceso->getDireccionMac();
		$sContrasenaWifi = $this->_oPuntoAcceso->getContrasenaWifi();

		$sql =" UPDATE PuntoAcceso
				SET	NombrePuntoAcceso = '$sNombrePuntoAcceso',
					Ubicacion = '$sUbicacion',
					NombreContacto = '$sNombreContacto',
					TelefonoPuntoAcceso = '$sTelefonoPuntoAcceso',
					DireccionMac = '$sDireccionMac',
					ContrasenaWifi = '$sContrasenaWifi'
				WHERE Id_PuntoAcceso = $nId_PuntoAcceso";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }

    public function eliminarPuntoAccesoPorId($nId_PuntoAcceso){
		$sql =" DELETE FROM PuntoAcceso
				WHERE Id_PuntoAcceso = $nId_PuntoAcceso";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }
}

?>