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

	$sql ="INSERT INTO Servicio (Id_Empleado, Id_Cliente, TipoPaquete, PrecioPaquete, DescripcionPaquete, TipoServicio, PrecioServicio, DescripcionServicio, FormaPago, FechaServicio, EstadoServicio) VALUES ('$nId_Empleado', '$nId_Cliente', '$sTipoPaquete', '$nPrecioPaquete', '$sDescripcionPaquete', '$sTipoServicio', '$nPrecioServicio', '$sDescripcionServicio', '$sFormaPago', '$sFechaServicio', 'ACTIVO')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	mysqli_close($this->_dblink);
}

	public function obtenerListadoServicio(){
		$sql ="SELECT NombreEmpleado, NombreCliente, Id_Servicio, TipoPaquete, PrecioPaquete, DescripcionPaquete, TipoServicio, PrecioServicio, DescripcionServicio, FormaPago, FechaServicio, BajaServicio, EstadoServicio
				FROM Empleado AS EM, Cliente AS CL, Servicio AS SE
				WHERE EM.Id_Empleado = SE.Id_Empleado
				AND  CL.Id_Cliente = SE.Id_Cliente";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}


	public function obtenerListadoServicioPorId($nIdServicio){
		$sql ="SELECT Id_Servicio,SE.Id_Empleado, NombreEmpleado,SE.Id_Cliente, NombreCliente, TipoPaquete, PrecioPaquete, DescripcionPaquete, TipoServicio, PrecioServicio, DescripcionServicio, FormaPago, FechaServicio, BajaServicio, EstadoServicio
				FROM Empleado AS EM, Cliente AS CL, Servicio AS SE
				WHERE Id_Servicio = $nIdServicio
				AND EM.Id_Empleado = SE.Id_Empleado
				AND  CL.Id_Cliente = SE.Id_Cliente";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}
        
        public function obtenerProductoServicio(){
		$sql ="select Id_Producto, NombreProducto, CantidadUnidad, PrecioUnidad from Producto where CantidadUnidad > 0";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}
        
        public function obtenerProductoServicioPorId($nIdProducto){
		$sql ="select Id_Producto, NombreProducto, CantidadUnidad, PrecioUnidad
                        from Producto 
                        where CantidadUnidad > 0
                        and Id_Producto = '$nIdProducto'";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}
        
        public function RegistrarDetalleServicio($nIdServicio, $aIdProducto, $aCantidadProducto) {
            for($i = 0; $i < count($aIdProducto, COUNT_RECURSIVE); $i++){
                
                $oServicioProducto = $this->obtenerProductoServicioPorId($aIdProducto[$i]);
                $nPrecioTotal = $oServicioProducto[0]['PrecioUnidad'] * $aCantidadProducto[$i];
                
                $sql = "INSERT INTO DetalleServicio (Id_Servicio, Id_Producto, Cantidad, PrecioTotal)
                        VALUES ('$nIdServicio', '$aIdProducto[$i]', '$aCantidadProducto[$i]', '$nPrecioTotal')"; 
                        $result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
                
                $sql2 ="UPDATE Producto
                       SET CantidadUnidad = CantidadUnidad - '$aCantidadProducto[$i]'
                       WHERE Id_Producto = $aIdProducto[$i]";
		$result2 = mysqli_query($this->_dblink, $sql2) or die('Error:'.mysqli_error($this->_dblink));
            }
        }

	public function ModificarServicio(){
		
		//echo '<pre>';
	    //print_r($this->_oServicio);
	    //echo '</pre>';

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