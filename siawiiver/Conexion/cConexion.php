<?php 
/**
* 
*/
class cConexion 
{
	#parametros de la clase conexion
	protected $_sHost = null;
	protected $_sUsuario = null;
	protected $_sContraseña = null;
	protected $_sBase = null;
#constructor de la clase cConexion
	function cConexion(){
			$this->_sHost = 'localhost';
			$this->_sUsuario = 'root';
			$this->_sContraseña = '';
			$this->_sBase = 'siawiiver';
	}

#metodo conectar de la clase cConexion
 	public function conectar(){
		$enlace = mysqli_connect($this->_sHost, $this->_sUsuario, $this->_sContraseña, $this->_sBase);
	
		if (!$enlace) {
    		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    		echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
   		 	exit;
   		 	return false;
		}
		else {
			return $enlace;
		}
	}

	public function desconectar(){
		$enlace = mysqli_connect($this->_sHost, $this->_sUsuario, $this->_sContraseña, $this->_sBase);
		$enlace->close();
}
}
#se crea el objeto conectar que se puede utilizar para crear una conexion futura
#$conectar = new cConexion;
#$conectar->conectar();
?>