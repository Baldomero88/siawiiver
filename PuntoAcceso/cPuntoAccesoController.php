<?php

require_once('../Conexion/cConexion.php');
require_once('../PuntoAcceso/cPuntoAccesoModelo.php');

class cPuntoAccesoController{

    protected $_oConectar;
    protected $_dbLink;
    protected $_oPuntoAccesoModelo;

    function cPuntoAccesoController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oPuntoAccesoModelo = New cPuntoAccesoModelo($this->_dbLink);
    }


    public function obtenerListadoPuntoAcceso(){
        return $this->_oPuntoAccesoModelo->obtenerListadoPuntoAcceso();
    }

    public function obtenerListadoPuntoAccesoPorId($nIdPuntoAcceso){
        return $this->_oPuntoAccesoModelo->obtenerListadoPuntoAccesoPorId($nIdPuntoAcceso);
    }

    public function eliminarPuntoAccesoPorId($nIdPuntoAcceso){
        return $this->_oPuntoAccesoModelo->eliminarPuntoAccesoPorId($nIdPuntoAcceso);
    }
}

?>