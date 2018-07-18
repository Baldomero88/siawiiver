<?php  

require_once('../Conexion/cConexion.php');
require_once('../Empleado/cEmpleadoModelo.php');
require_once('../Empleado/cEmpleadoEntidad.php');
require_once('../Usuario/cUsuarioModelo.php');

class cUsuarioController{

protected $_oConectar;
protected $_dbLink;
protected $_oEmpleadoModelo;
protected $_oEmpleadoEntidad;
protected $_oUsuarioModelo;

    function cUsuarioController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oEmpleadoEntidad = New cEmpleadoEntidad($this->_dbLink);
        $this->_oEmpleadoModelo = New cEmpleadoModelo($this->_dbLink, $this->_oEmpleadoEntidad);
        $this->_oUsuarioModelo = New cUsuarioModelo($this->_dbLink);   
   
    }
    public function ObtenerEmpleadoUsuario(){

        return $this->_oEmpleadoModelo->ObtenerEmpleadoUsuario();
    }
       public function obtenerListadoUsuario(){
        return $this->_oUsuarioModelo->obtenerListadoUsuario();
    }

    public function obtenerListadoUsuarioPorId($nIdUsuario){
        return $this->_oUsuarioModelo->obtenerListadoUsuarioPorId($nIdUsuario);
    }

    public function eliminarUsuarioPorId($nIdUsuario){
        return $this->_oUsuarioModelo->eliminarUsuarioPorId($nIdUsuario);
    }
}
?>