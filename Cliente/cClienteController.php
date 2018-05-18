<?php

require_once('../Conexion/cConexion.php');
require_once('../PuntoAcceso/cPuntoAccesoModelo.php');
require_once('../PuntoAcceso/cPuntoAccesoEntidad.php');
require_once('../Cliente/cClienteModelo.php');

class cClienteController{

    protected $_oConectar;
    protected $_dbLink;
    protected $_oPuntoAccesoModelo;
    protected $_oPuntoAccesoEntidad;
    protected $_oClienteModelo;

    function cClienteController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oPuntoAccesoEntidad = New cPuntoAccesoEntidad($this->_dbLink);
        $this->_oPuntoAccesoModelo = New cPuntoAccesoModelo($this->_dbLink, $this->_oPuntoAccesoEntidad);
        $this->_oClienteModelo = New cClienteModelo($this->_dbLink);
    }
// funcion para obtener los puntos de acceso y relacionarlos con los CLIENTES
    public function ObtenerPuntoAccesoCliente(){
        return $this->_oPuntoAccesoModelo->ObtenerPuntoAccesoCliente();
    }

    public function obtenerListadoCliente(){
        return $this->_oClienteModelo->obtenerListadoCliente();
    }

    public function obtenerListadoClientePorId($nIdCliente){
        return $this->_oClienteModelo->obtenerListadoClientePorId($nIdCliente);
    }

    public function eliminarClientePorId($nIdCliente){
        return $this->_oClienteModelo->eliminarClientePorId($nIdCliente);
    }
}

?>
