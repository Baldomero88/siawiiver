<?php  

require_once('../Conexion/cConexion.php');
require_once('../Provedor/cProvedorModelo.php');
require_once('../Provedor/cProvedorEntidad.php');

class cProductoController{

protected $_oConectar;
protected $_dbLink;
protected $_oProvedorModelo;
protected $_oProvedorEntidad;

    function cProductoController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oProvedorEntidad = New cProvedorEntidad($this->_dbLink);
        $this->_oProvedorModelo = New cProvedorModelo($this->_dbLink, $this->_oProvedorEntidad);
        
    }

    public function ObtenerProvedorProducto(){

        return $this->_oProvedorModelo->ObtenerProvedorProducto();
    }
   
}





?>