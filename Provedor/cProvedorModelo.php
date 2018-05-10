<?php 

class cProvedorModelo{

	protected $_dblink;
	protected $_oProvedor;
	public $aFields = array();



function cProvedorModelo($dblink, $oProvedorEntidad = false){

	$this->_dblink = $dblink;
	$this->_oProvedor = $oProvedorEntidad;
}

#metodo para insertar los datos del empleado
public function RegistrarProvedor(){

	$sNombreCompania = $this->_oProvedor->getNombreCompania();
	$sNombreContactoCompania = $this->_oProvedor->getNombreContactoCompania();
	$sDireccionCompania = $this->_oProvedor->getDireccionCompania();
	$sCiudad = $this->_oProvedor->getCiudad();
	$nCodigoPostal = $this->_oProvedor->getCodigoPostal();
	$sPais = $this->_oProvedor->getPais();
	$sTelefonoCompania = $this->_oProvedor->getTelefonoCompania();
	$sPaginaWeb = $this->_oProvedor->getPaginaWeb();

	$sql ="INSERT INTO Provedor (NombreCompania, NombreContactoCompania, DireccionCompania, Ciudad, CodigoPostal, Pais, TelefonoCompania, PaginaWeb) VALUES ('$sNombreCompania', '$sNombreContactoCompania', '$sDireccionCompania', '$sCiudad', '$nCodigoPostal', '$sPais', '$sTelefonoCompania', '$sPaginaWeb')";
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error());
	//1.- El mismo caso agregar el dblink.
	//2.- CAmbiar n por n
	mysqli_close($this->_dblink);
}

public function ObtenerProvedorProducto(){
	
	$sql ="SELECT Id_Provedor, NombreCompania FROM Provedor";	
	$result = mysqli_query($this->_dblink, $sql) or die('Error:'.mysqli_error($this->_dblink));
	if ($result->num_rows === 0){exit;}

	while($row = $result->fetch_assoc()) {
		$this->aFields[] = $row;
	}
	
	return $this->aFields;
} 

}


?>