<?php 

require_once('cEmpleadoEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cEmpleadoModelo.php');


$sNombreEmpleado = $_POST['sNombreEmpleado'];
$sDireccionEmpleado = $_POST['sDireccionEmpleado'];
$sTelefonoEmpleado = $_POST['sTelefonoEmpleado'];
$sPuesto = $_POST['sPuesto'];
$nHonorario = $_POST['nHonorario'];

#se crea el objeto  oEmpleadoEntidad 
$oEmpleadoEntidad = new cEmpleadoEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();





# el objeto llama al metodo para asignar parametro
$oEmpleadoEntidad->setNombreEmpleado($sNombreEmpleado);
$oEmpleadoEntidad->setDireccionEmpleado($sDireccionEmpleado);
$oEmpleadoEntidad->setNombreEmpleado($sNombreEmpleado);
$oEmpleadoEntidad->setNombreEmpleado($sNombreEmpleado);
$oEmpleadoEntidad->setNombreEmpleado($sNombreEmpleado);

$oEmpleadoModelo = New cEmpleadoModelo($dbLink, $oEmpleadoEntidad);
$oEmpleadoModelo->RegistrarEmpleado();

 ?>

