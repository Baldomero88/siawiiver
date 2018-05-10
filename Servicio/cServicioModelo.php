<?php 
#
//require_once('cServicioEntidad.php');

class cServicioModelo{

protected $_dblink;
protected $_oServicio;

function cServicioModelo($dblink, $oServicioEntidad){

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

}

 ?>