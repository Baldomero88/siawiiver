<?php  

require_once('../Conexion/cConexion.php');
require_once('../Empleado/cEmpleadoModelo.php');
require_once('../Empleado/cEmpleadoEntidad.php');

class cUsuarioController{

protected $_oConectar;
protected $_dbLink;
protected $_oEmpleadoModelo;
protected $_oEmpleadoEntidad;

    function cUsuarioController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oEmpleadoEntidad = New cEmpleadoEntidad($this->_dbLink);
        $this->_oEmpleadoModelo = New cEmpleadoModelo($this->_dbLink, $this->_oEmpleadoEntidad);
        
    }

    public function ObtenerEmpleadoUsuario(){

        return $this->_oEmpleadoModelo->ObtenerEmpleadoUsuario();
    }
   
}


?>