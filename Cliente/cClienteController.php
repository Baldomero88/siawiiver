<?php  

require_once('../Conexion/cConexion.php');
require_once('../PuntoAcceso/cPuntoAccesoModelo.php');
require_once('../PuntoAcceso/cPuntoAccesoEntidad.php');

class cClienteController{

protected $_oConectar;
protected $_dbLink;
protected $_oPuntoAccesoModelo;
protected $_oPuntoAccesoEntidad;

    function cClienteController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oPuntoAccesoEntidad = New cPuntoAccesoEntidad($this->_dbLink);
        $this->_oPuntoAccesoModelo = New cPuntoAccesoModelo($this->_dbLink, $this->_oPuntoAccesoEntidad);
        
    }

    public function ObtenerPuntoAccesoCliente(){

        return $this->_oPuntoAccesoModelo->ObtenerPuntoAccesoCliente();
    }
   
}





?>