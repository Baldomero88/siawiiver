<?php 

require_once('cProvedorEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cProvedorModelo.php');


$sNombreCompania = $_POST['sNombreCompania'];
$sNombreContactoCompania = $_POST['sNombreContactoCompania'];
$sDireccionCompania = $_POST['sDireccionCompania'];
$sCiudad = $_POST['sCiudad'];
$nCodigoPostal = $_POST['nCodigoPostal'];
$sPais = $_POST['sPais'];
$sTelefonoCompania = $_POST['sTelefonoCompania'];
$sPaginaWeb = $_POST['sPaginaWeb'];

#se crea el objeto  oProvedorEntidad 
$oProvedorEntidad = new cProvedorEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();





# el objeto llama al metodo para asignar parametro
$oProvedorEntidad->setNombreCompania($sNombreCompania);
$oProvedorEntidad->setNombreContactoCompania($sNombreContactoCompania);
$oProvedorEntidad->setDireccionCompania($sDireccionCompania);
$oProvedorEntidad->setCiudad($sCiudad);
$oProvedorEntidad->setCodigoPostal($nCodigoPostal);
$oProvedorEntidad->setPais($sPais);
$oProvedorEntidad->setTelefonoCompania($sTelefonoCompania);
$oProvedorEntidad->setPaginaWeb($sPaginaWeb);


$oProvedorModelo = New cProvedorModelo($dbLink, $oProvedorEntidad);
if (isset($_POST['RegistrarProvedor'])) {
    $oProvedorModelo->RegistrarProvedor();
}
elseif(isset($_POST['modificarProvedor'])) {
    $nId_Provedor = $_POST['Id_Provedor'];
    $oProvedorEntidad->setId_Provedor($nId_Provedor);
    $oProvedorModelo->ModificarProvedor();
}


 ?>

