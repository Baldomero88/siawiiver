<?php 
#
//require_once('cProductoEntidad.php');

class cProductoModelo{

protected $_dblink;
protected $_oProducto;

function cProductoModelo($dblink, $oProductoEntidad){

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
	

var_dump($this->_dblink);

	$sql ="INSERT INTO Producto (Id_Provedor, NombreProducto, CantidadUnidad, PrecioUnidad, UnidadAlmacen, UnidadServicio, ReordenarNivel, Terminado) VALUES ('$nId_Provedor', '$sNombreProducto', '$nCantidadUnidad', '$nPrecioUnidad', '$nUnidadAlmacen', '$nUnidadServicio', '$nReordenarNivel', '$nTerminado')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error());
	mysqli_close($this->_dblink);
}

}

?>