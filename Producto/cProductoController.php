<?php  

require_once('../Conexion/cConexion.php');
require_once('../Provedor/cProvedorModelo.php');
require_once('../Provedor/cProvedorEntidad.php');
require_once('../Producto/cProductoModelo.php');

class cProductoController{

protected $_oConectar;
protected $_dbLink;
protected $_oProvedorModelo;
protected $_oProvedorEntidad;
protected $_oProductoModelo;

    function cProductoController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oProvedorEntidad = New cProvedorEntidad($this->_dbLink);
        $this->_oProvedorModelo = New cProvedorModelo($this->_dbLink, $this->_oProvedorEntidad);
        $this->_oProductoModelo = New cProductoModelo($this->_dbLink);   
   
    }
    public function ObtenerProvedorProducto(){

        return $this->_oProvedorModelo->ObtenerProvedorProducto();
    }
       public function obtenerListadoProducto(){
        return $this->_oProductoModelo->obtenerListadoProducto();
    }

    public function obtenerListadoProductoPorId($nIdProducto){
        return $this->_oProductoModelo->obtenerListadoProductoPorId($nIdProducto);
    }

    public function eliminarProductoPorId($nIdProducto){
        return $this->_oProductoModelo->eliminarProductoPorId($nIdProducto);
    }
}
?>