<?php 

require_once('cProvedorEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cProvedorModelo.php');


$sNombreCompañia = $_POST['sNombreCompañia'];
$sNombreContactoCompañia = $_POST['sNombreContactoCompañia'];
$sDireccionCompañia = $_POST['sDireccionCompañia'];
$sCiudad = $_POST['sCiudad'];
$nCodigoPostal = $_POST['nCodigoPostal'];
$sPais = $_POST['sPais'];
$sTelefonoCompañia = $_POST['sTelefonoCompañia'];
$sPaginaWeb = $_POST['sPaginaWeb'];

#se crea el objeto  oProvedorEntidad 
$oProvedorEntidad = new cProvedorEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();





# el objeto llama al metodo para asignar parametro
$oProvedorEntidad->setNombreCompañia($sNombreCompañia);
$oProvedorEntidad->setNombreContactoCompañia($sNombreContactoCompañia);
$oProvedorEntidad->setDireccionCompañia($sDireccionCompañia);
$oProvedorEntidad->setCiudad($sCiudad);
$oProvedorEntidad->setCodigoPostal($nCodigoPostal);
$oProvedorEntidad->setPais($sPais);
$oProvedorEntidad->setTelefonoCompañia($sTelefonoCompañia);
$oProvedorEntidad->setPaginaWeb($sPaginaWeb);

$oProvedorModelo = New cProvedorModelo($dbLink, $oProvedorEntidad);
$oProvedorModelo->RegistrarProvedor();

 ?>

