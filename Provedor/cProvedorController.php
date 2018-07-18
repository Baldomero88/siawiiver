<?php

require_once('../Conexion/cConexion.php');
require_once('../Provedor/cProvedorModelo.php');

class cProvedorController{

    protected $_oConectar;
    protected $_dbLink;
    protected $_oProvedorModelo;

    function cProvedorController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oProvedorModelo = New cProvedorModelo($this->_dbLink);
    }


    public function obtenerListadoProvedor(){
        return $this->_oProvedorModelo->obtenerListadoProvedor();
    }

    public function obtenerListadoProvedorPorId($nIdProvedor){
        return $this->_oProvedorModelo->obtenerListadoProvedorPorId($nIdProvedor);
    }

    public function eliminarProvedorPorId($nIdProvedor){
        return $this->_oProvedorModelo->eliminarProvedorPorId($nIdProvedor);
    }
}

?>