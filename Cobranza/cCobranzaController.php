<?php  

require_once('../Conexion/cConexion.php');
require_once('../Servicio/cServicioModelo.php');
require_once('../Servicio/cServicioEntidad.php');
require_once('../Cobranza/cCobranzaModelo.php');

class cCobranzaController{

protected $_oConectar;
protected $_dbLink;
protected $_oServicioModelo;
protected $_oServicioEntidad;
protected $_oCobranzaModelo;

    function cCobranzaController(){
        $this->_oConectar = new cConexion;
        $this->_dbLink = $this->_oConectar->Conectar();
        $this->_oServicioEntidad = New cServicioEntidad($this->_dbLink);
        $this->_oServicioModelo = New cServicioModelo($this->_dbLink, $this->_oServicioEntidad);
        $this->_oCobranzaModelo = New cCobranzaModelo($this->_dbLink);   
   
    }
    public function ObtenerServicioCobranza(){

        return $this->_oServicioModelo->ObtenerServicioCobranza();
     }
       public function obtenerListadoCobranza(){
        return $this->_oCobranzaModelo->obtenerListadoCobranza();
    }

    public function obtenerListadoCobranzaPorId($nIdCobranza){
        return $this->_oCobranzaModelo->obtenerListadoCobranzaPorId($nIdCobranza);
    }

    public function eliminarCobranzaPorId($nIdCobranza){
        return $this->_oCobranzaModelo->eliminarCobranzaPorId($nIdCobranza);
    }
}
?>