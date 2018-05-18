<?php 
#
//require_once('cProductoEntidad.php');

class cProductoModelo{

protected $_dblink;
protected $_oProducto;

function cProductoModelo($dblink, $oProductoEntidad = false){

	$this->_dblink = $dblink;
	$this->_oProducto = $oProductoEntidad;
}

#metodo para insertar los datos del Producto
public function RegistrarProducto(){

	$nId_Provedor = $this->_oProducto->getId_Provedor();
	$sNombreProducto = $this->_oProducto->getNombreProducto();
	$nCantidadUnidad = $this->_oProducto->getCantidadUnidad();
	$nPrecioUnidad = $this->_oProducto->getPrecioUnidad();
	$nUnidadAlmacen = $this->_oProducto->getUnidadAlmacen();
	$nUnidadServicio = $this->_oProducto->getUnidadServicio();
	$nReordenarNivel = $this->_oProducto->getReordenarNivel();
	$nTerminado = $this->_oProducto->getTerminado();
	
	$sql ="INSERT INTO Producto (Id_Provedor, NombreProducto, CantidadUnidad, PrecioUnidad, UnidadAlmacen, UnidadServicio, ReordenarNivel, Terminado) VALUES ('$nId_Provedor', '$sNombreProducto', '$nCantidadUnidad', '$nPrecioUnidad', '$nUnidadAlmacen', '$nUnidadServicio', '$nReordenarNivel', '$nTerminado')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	mysqli_close($this->_dblink);
}

public function obtenerListadoProducto(){
		$sql ="SELECT NombreCompania, Id_Producto, NombreProducto, CantidadUnidad, PrecioUnidad, UnidadAlmacen, UnidadServicio, ReordenarNivel, Terminado
				FROM Provedor AS PRO, Producto AS PR
				WHERE PRO.Id_Provedor = PR.Id_Provedor";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function obtenerListadoProductoPorId($nIdProducto){
		$sql ="SELECT NombreCompania, Id_Producto, NombreProducto, CantidadUnidad, PrecioUnidad, UnidadAlmacen, UnidadServicio, ReordenarNivel, Terminado
				FROM Provedor AS PRO, Producto AS PR
				WHERE PRO.Id_Provedor = PR.Id_Provedor
				AND Id_Producto = $nIdProducto";
		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
		if ($result->num_rows === 0){exit; return false;}

		$aFields = array();
		while($row = $result->fetch_assoc()) {
			$aFields[] = $row;
		}

		return $aFields;
	}

	public function ModificarProducto(){
		$nId_Producto = $this->_oProducto->getId_Producto();
		$nId_Provedor = $this->_oProducto->getId_Provedor();
		$sNombreProducto = $this->_oProducto->getNombreProducto();
		$nCantidadUnidad = $this->_oProducto->getCantidadUnidad();
		$nPrecioUnidad = $this->_oProducto->getPrecioUnidad();
		$nUnidadAlmacen = $this->_oProducto->getUnidadAlmacen();
		$nUnidadServicio = $this->_oProducto->getUnidadServicio();
		$nReordenarNivel = $this->_oProducto->getReordenarNivel();
		$nTerminado = $this->_oProducto->getTerminado();

		$sql =" UPDATE Producto
				SET	Id_Provedor = '$nId_Provedor',
					NombreProducto = '$sNombreProducto',
					CantidadUnidad = '$nCantidadUnidad',
					PrecioUnidad = '$nPrecioUnidad',
					UnidadAlmacen = '$nUnidadAlmacen',
					UnidadServicio = '$nUnidadServicio',
					ReordenarNivel = '$nReordenarNivel',
					Terminado = '$nTerminado'
				WHERE Id_Producto = $nId_Producto";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }

    public function eliminarProductoPorId($nId_Producto){
		$sql =" DELETE FROM Producto
				WHERE Id_Producto = $nId_Producto";

		$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));

		mysqli_close($this->_dblink);
    }
}

?>