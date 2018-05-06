<?php  

require_once('../Conexion/cConexion.php');
require_once('../Empleado/cEmpleadoModelo.php');
require_once('../Empleado/cEmpleadoEntidad.php');
require_once('../Cliente/cClienteModelo.php');
require_once('../Cliente/cClienteEntidad.php');

class cServicioController{

protected $_oConectar;
protected $_dbLink;
protected $_oEmpleadoModelo;
protected $_oEmpleadoEntidad;
protected $_oClienteEntidad;
protected $_oClienteModelo;

    function cServicioController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oEmpleadoEntidad = New cEmpleadoEntidad($this->_dbLink);
        $this->_oEmpleadoModelo = New cEmpleadoModelo($this->_dbLink, $this->_oEmpleadoEntidad);
        $this->_oClienteEntidad = New cClienteEntidad($this->_dbLink);
        $this->_oClienteModelo = New cClienteModelo($this->_dbLink, $this->_oClienteEntidad);
        
    }

    public function ObtenerEmpleadoServicio(){

        return $this->_oEmpleadoModelo->ObtenerEmpleadoServicio();
    }
    
    public function ObtenerClienteServicio(){

        return $this->_oClienteModelo->ObtenerClienteServicio();
    }

}

?>