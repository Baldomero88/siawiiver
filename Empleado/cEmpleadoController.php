<?php

require_once('../Conexion/cConexion.php');
require_once('../Empleado/cEmpleadoModelo.php');

class cEmpleadoController{

    protected $_oConectar;
    protected $_dbLink;
    protected $_oEmpleadoModelo;

    function cEmpleadoController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oEmpleadoModelo = New cEmpleadoModelo($this->_dbLink);
    }
// funcion para obtener los puntos de acceso y relacionarlos con los EmpleadoS

    public function obtenerListadoEmpleado(){
        return $this->_oEmpleadoModelo->obtenerListadoEmpleado();
    }

    public function obtenerListadoEmpleadoPorId($nIdEmpleado){
        return $this->_oEmpleadoModelo->obtenerListadoEmpleadoPorId($nIdEmpleado);
    }

    public function eliminarEmpleadoPorId($nIdEmpleado){
        return $this->_oEmpleadoModelo->eliminarEmpleadoPorId($nIdEmpleado);
    }
}

?>