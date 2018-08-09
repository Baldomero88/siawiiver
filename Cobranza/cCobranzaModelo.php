<?php 
#
//require_once('cCobranzaEntidad.php');

class cCobranzaModelo{

protected $_dblink;
protected $_oCobranza;

function cCobranzaModelo($dblink, $oCobranzaEntidad = false){

	$this->_dblink = $dblink;
	$this->_oCobranza = $oCobranzaEntidad;
}

#metodo para insertar los datos del Cobranza
public function RegistrarCobranza(){

	$nId_Servicio = $this->_oCobranza->getId_Servicio();
	$sMesPago = $this->_oCobranza->getMesPago();
	$sEstadoPago = $this->_oCobranza->getEstadoPago();
	
	$sql ="INSERT INTO Cobranza (Id_Servicio, MesPago, EstadoPago, ) VALUES ('$nId_Servicio', '$sMesPago', '$sEstadoPago')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	mysqli_close($this->_dblink);
}

public function obtenerListadoCobranza(){
		$sql ="SELECT TipoPaquete, Id_Cobranza, MesPago, EstadoPago
				FROM Servicio AS PRO, Cobranza AS PR
				WHERE PRO.Id_Servicio = PR.Id_Servicio";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function obtenerListadoCobranzaPorId($nIdCobranza){
		$sql ="SELECT TipoPaquete, Id_Cobranza, MesPago, EstadoPago
				FROM Servicio AS PRO, Cobranza AS PR
				WHERE PRO.Id_Servicio = PR.Id_Servicio
				AND Id_Cobranza = $nIdCobranza";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function ModificarCobranza(){
		$nId_Cobranza = $this->_oCobranza->getId_Cobranza();
		$nId_Servicio = $this->_oCobranza->getId_Servicio();
		$sMesPago = $this->_oCobranza->getMesPago();
		$sEstadoPago = $this->_oCobranza->getEstadoPago();

		$sql =" UPDATE Cobranza
				SET	Id_Servicio = '$nId_Servicio',
					MesPago = '$sMesPago',
					EstadoPago = '$sEstadoPago',
				WHERE Id_Cobranza = $nId_Cobranza";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }

    public function eliminarCobranzaPorId($nId_Cobranza){
		$sql =" DELETE FROM Cobranza
				WHERE Id_Cobranza = $nId_Cobranza";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }
}

?>