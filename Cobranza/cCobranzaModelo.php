<?php

#
//require_once('cCobranzaEntidad.php');

class cCobranzaModelo {

    protected $_dblink;
    protected $_oCobranza;

    function cCobranzaModelo($dblink, $oCobranzaEntidad = false) {

        $this->_dblink = $dblink;
        $this->_oCobranza = $oCobranzaEntidad;
    }

#metodo para insertar los datos del Cobranza

    public function RegistrarCobranza() {

        $nId_Servicio = $this->_oCobranza->getId_Servicio();
        $sMesPago = $this->_oCobranza->getMesPago();
        $nAnoPago = $this->_oCobranza->getAnoPago();
        $nServicio = $this->_oCobranza->getServicio();
        $nOtrosCargos = $this->_oCobranza->getOtrosCargos();
        $sEstadoPago = $this->_oCobranza->getEstadoPago();

        $sql = "INSERT INTO Cobranza (Id_Servicio, MesPago, AnoPago, Servicio, OtrosCargos, EstadoPago) 
                VALUES ('$nId_Servicio', '$sMesPago', '$nAnoPago', '$nServicio', '$nOtrosCargos', '$sEstadoPago')";
        $result = mysqli_query($this->_dblink, $sql) or die('Error:' . mysqli_error($this->_dblink));
        mysqli_close($this->_dblink);
    }

    public function obtenerListadoCobranza() {
        $sql = "SELECT NombreCliente, TipoPaquete, Id_Cobranza, MesPago, AnoPago, Servicio, OtrosCargos, EstadoPago
		FROM Servicio AS SE, Cobranza AS CO, Cliente AS CL
		WHERE SE.Id_Servicio = CO.Id_Servicio
                AND  CL.Id_Cliente = SE.Id_Cliente";
        $result = mysqli_query($this->_dblink, $sql) or die('Error:' . mysqli_error($this->_dblink));
        if ($result->num_rows === 0) {
            exit;
            return false;
        }
        $aFields = array();
        while ($row = $result->fetch_assoc()) {
            $aFields[] = $row;
        }
        return $aFields;
    }

    
    
    public function obtenerListadoCobranzaPorId($Id_Servicio) {
        $sql = "SELECT NombreCliente, TipoPaquete, Id_Cobranza, MesPago, AnoPago, Servicio, OtrosCargos, EstadoPago
		FROM Servicio AS SE, Cobranza AS CO, Cliente AS CL
		WHERE CO.Id_Servicio = '$Id_Servicio'
                AND SE.Id_Servicio = CO.Id_Servicio
                AND  CL.Id_Cliente = SE.Id_Cliente";
        $result = mysqli_query($this->_dblink, $sql) or die('Error:' . mysqli_error($this->_dblink));
        if ($result->num_rows === 0) {
            exit;
            return false;
        }
        $aFields = array();
        while ($row = $result->fetch_assoc()) {
            $aFields[] = $row;
        }
        return $aFields;
    }
    
    
    public function obtenerListadoPagosVencidos() {
        $sql = "SELECT NombreCliente, COUNT(EstadoPago) AS NumeroVencidos, SUM(Servicio) AS TotalServicio, SUM(OtrosCargos) AS TotalCargos
                FROM Cobranza AS CO, Servicio AS SE, Cliente AS CL
                WHERE EstadoPago='VENCIDO'
                AND CO.Id_Servicio = SE.Id_Servicio
                AND SE.Id_Cliente = CL.Id_Cliente
                GROUP BY NombreCliente ASC";
        $result = mysqli_query($this->_dblink, $sql) or die('Error:' . mysqli_error($this->_dblink));
        if ($result->num_rows === 0) {
            exit;
            return false;
        }
        $aFields = array();
        while ($row = $result->fetch_assoc()) {
            $aFields[] = $row;
        }
        return $aFields;
    }
        
    public function ModificarCobranza() {
        $nId_Cobranza = $this->_oCobranza->getId_Cobranza();
        $nId_Servicio = $this->_oCobranza->getId_Servicio();
        $sMesPago = $this->_oCobranza->getMesPago();
        $sEstadoPago = $this->_oCobranza->getEstadoPago();

        $sql = "UPDATE Cobranza
                SET Id_Servicio = '$nId_Servicio', MesPago = '$sMesPago', EstadoPago = '$sEstadoPago'
                WHERE Id_Cobranza = $nId_Cobranza";

        $result = mysqli_query($this->_dblink, $sql) or die('Error:' . mysqli_error($this->_dblink));

        mysqli_close($this->_dblink);
    }

    public function eliminarCobranzaPorId($nId_Cobranza) {
        $sql = "DELETE FROM Cobranza
                WHERE Id_Cobranza = $nId_Cobranza";

        $result = mysqli_query($this->_dblink, $sql) or die('Error:' . mysqli_error($this->_dblink));

        mysqli_close($this->_dblink);
    }

}

?>