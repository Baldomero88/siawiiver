<?php
#
//require_once('cClienteEntidad.php');

class cClienteModelo{

	protected $_dblink;
	protected $_oCliente;

	function cClienteModelo($dblink, $oClienteEntidad = false){
		$this->_dblink = $dblink;
		$this->_oCliente = $oClienteEntidad;
	}

	#metodo para insertar los datos del Cliente
	public function RegistrarCliente(){
		$nId_PuntoAcceso = $this->_oCliente->getId_PuntoAcceso();
		$sNombreCliente = $this->_oCliente->getNombreCliente();
		$sDireccionCliente = $this->_oCliente->getDireccionCliente();
		$sLocalidad = $this->_oCliente->getLocalidad();
		$sMunicipio = $this->_oCliente->getMunicipio();
		$sTelefonoCliente = $this->_oCliente->getTelefonoCliente();
		$sReferencia = $this->_oCliente->getReferencia();

		$sql ="INSERT INTO Cliente (Id_PuntoAcceso, NombreCliente, DireccionCliente, Localidad, Municipio, TelefonoCliente, Referencia) VALUES ('$nId_PuntoAcceso', '$sNombreCliente', '$sDireccionCliente', '$sLocalidad', '$sMunicipio', '$sTelefonoCliente', '$sReferencia')";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		mysqli_close($this->_dblink);
	}
//fUNCION QUE SIRVE PARA CONOCER LA INFORMACION DEL CLIENTE RELACIONADO CON EL SERVICIO
	public function ObtenerClienteServicio(){
		$sql ="SELECT Id_Cliente, NombreCliente FROM Cliente";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function obtenerListadoCliente(){
		$sql ="SELECT NombrePuntoAcceso, Id_Cliente, NombreCliente, DireccionCliente, Localidad, Municipio, TelefonoCliente, Referencia
				FROM PuntoAcceso AS PA, Cliente AS C
				WHERE PA.Id_PuntoAcceso = C.Id_PuntoAcceso";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function obtenerListadoClientePorId($nIdCliente){
		$sql ="SELECT NombrePuntoAcceso, Id_Cliente, NombreCliente, DireccionCliente, Localidad, Municipio, TelefonoCliente, Referencia
				FROM PuntoAcceso AS PA, Cliente AS C
				WHERE PA.Id_PuntoAcceso = C.Id_PuntoAcceso
				AND Id_Cliente = $nIdCliente";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function ModificarCliente(){
		$nId_Cliente = $this->_oCliente->getId_Cliente();
		$nId_PuntoAcceso = $this->_oCliente->getId_PuntoAcceso();
		$sNombreCliente = $this->_oCliente->getNombreCliente();
		$sDireccionCliente = $this->_oCliente->getDireccionCliente();
		$sLocalidad = $this->_oCliente->getLocalidad();
		$sMunicipio = $this->_oCliente->getMunicipio();
		$sTelefonoCliente = $this->_oCliente->getTelefonoCliente();
		$sReferencia = $this->_oCliente->getReferencia();

		$sql =" UPDATE Cliente
				SET	Id_PuntoAcceso = '$nId_PuntoAcceso',
					NombreCliente = '$sNombreCliente',
					DireccionCliente = '$sDireccionCliente',
					Localidad = '$sLocalidad',
					Municipio = '$sMunicipio',
					TelefonoCliente = '$sTelefonoCliente',
					Referencia = '$sReferencia'
				WHERE Id_Cliente = $nId_Cliente";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }

    public function eliminarClientePorId($nId_Cliente){
		$sql =" DELETE FROM Cliente
				WHERE Id_Cliente = $nId_Cliente";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }

}

 ?>
