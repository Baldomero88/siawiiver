<?php 
#
//require_once('cServicioEntidad.php');

class cServicioModelo{

protected $_dblink;
protected $_oServicio;

function cServicioModelo($dblink, $oServicioEntidad = false){

	$this->_dblink = $dblink;
	$this->_oServicio = $oServicioEntidad;
}

#metodo para insertar los datos del Servicio
public function RegistrarServicio(){

	$nId_Empleado = $this->_oServicio->getId_Empleado();
	$nId_Cliente = $this->_oServicio->getId_Cliente();
	$sTipoPaquete = $this->_oServicio->getTipoPaquete();
	$nPrecioPaquete = $this->_oServicio->getPrecioPaquete();
	$sDescripcionPaquete = $this->_oServicio->getDescripcionPaquete();
	$sTipoServicio = $this->_oServicio->getTipoServicio();
	$nPrecioServicio = $this->_oServicio->getPrecioServicio();
	$sDescripcionServicio = $this->_oServicio->getDescripcionServicio();
	$sFormaPago = $this->_oServicio->getFormaPago();
	$sFechaServicio = $this->_oServicio->getFechaServicio();
	$sBajaServicio = $this->_oServicio->getBajaServicio();
	$sEstadoServicio = $this->_oServicio->getEstadoServicio();

	$sql ="INSERT INTO Servicio (Id_Empleado, Id_Cliente, TipoPaquete, PrecioPaquete, DescripcionPaquete, TipoServicio, PrecioServicio, DescripcionServicio, FormaPago, FechaServicio, BajaServicio, EstadoServicio) VALUES ('$nId_Empleado', '$nId_Cliente', '$sTipoPaquete', '$nPrecioPaquete', '$sDescripcionPaquete', '$sTipoServicio', '$nPrecioServicio', '$sDescripcionServicio', '$sFormaPago', '$sFechaServicio', '$sBajaServicio', '$sEstadoServicio')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	mysqli_close($this->_dblink);
}

	public function obtenerListadoServicio(){
		$sql ="SELECT NombreEmpleado, NombreCliente, Id_Servicio, TipoPaquete, PrecioPaquete, DescripcionPaquete, TipoServicio, PrecioServicio, DescripcionServicio, FormaPago, FechaServicio, BajaServicio, EstadoServicio
				FROM Empleado AS EM, Servicio AS SE
				WHERE EM.Id_Empleado = SE.Id_Servicio";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function obtenerListadoServicio2(){
		$sql ="SELECT NombreEmpleado, NombreCliente, Id_Servicio, TipoPaquete, PrecioPaquete, DescripcionPaquete, TipoServicio, PrecioServicio, DescripcionServicio, FormaPago, FechaServicio, BajaServicio, EstadoServicio
				FROM Cliente AS CL, Servicio AS SE
				WHERE CL.Id_Cliente = SE.Id_Servicio";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}


	public function obtenerListadoServicioPorId($nIdServicio){
		$sql ="SELECT NombreEmpleado, NombreCliente, Id_Servicio, TipoPaquete, PrecioPaquete, DescripcionPaquete, TipoServicio, PrecioServicio, DescripcionServicio, FormaPago, FechaServicio, BajaServicio, EstadoServicio
				FROM Empleado AS EM, Servicio AS SE 
				WHERE EM.Id_Cliente = SE.Id_Cliente
				AND Id_Servicio = $nIdServicio";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function ModificarServicio(){
		$nId_Servicio = $this->_oServicio->getId_Servicio();
		$nId_Empleado = $this->_oServicio->getId_Empleado();
		$nId_Cliente = $this->_oServicio->getId_Cliente();
		$sTipoPaquete = $this->_oServicio->getTipoPaquete();
		$nPrecioPaquete = $this->_oServicio->getPrecioPaquete();
		$sDescripcionPaquete = $this->_oServicio->getDescripcionPaquete();
		$sTipoServicio = $this->_oServicio->getTipoServicio();
		$nPrecioServicio = $this->_oServicio->getPrecioServicio();
		$sDescripcionServicio = $this->_oServicio->getDescripcionServicio();
		$sFormaPago = $this->_oServicio->getFormaPago();
		$sFechaServicio = $this->_oServicio->getFechaServicio();
		$sBajaServicio = $this->_oServicio->getBajaServicio();
		$sEstadoServicio = $this->_oServicio->getEstadoServicio();

		$sql =" UPDATE Servicio
				SET	Id_Empleado = '$nId_Empleado',
				    Id_Cliente = '$nId_Cliente',
					TipoPaquete = '$sTipoPaquete',
					PrecioPaquete = '$nPrecioPaquete',
					DescripcionPaquete = '$sDescripcionPaquete',
					TipoServicio = '$sTipoServicio',
					PrecioServicio = '$nPrecioServicio',
					DescripcionServicio = '$sDescripcionServicio',
					FormaPago = '$sFormaPago',
					FechaServicio = '$sFechaServicio',
					BajaServicio = '$sBajaServicio',
					EstadoServicio = '$sEstadoServicio'
				WHERE Id_Servicio = $nId_Servicio";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }

    public function eliminarServicioPorId($nId_Servicio){
		$sql =" DELETE FROM Servicio
				WHERE Id_Servicio = $nId_Servicio";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }



}

 ?>