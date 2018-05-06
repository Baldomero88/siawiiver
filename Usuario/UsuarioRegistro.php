<?php 

require_once('cUsuarioEntidad.php');
require_once('../Conexion/cConexion.php');
require_once('cUsuarioModelo.php');


$nId_Empleado = $_POST['nId_Empleado'];
$sRol = $_POST['sRol'];
$sNombreUsuario = $_POST['sNombreUsuario'];
$sContrasena = $_POST['sContrasena'];


#se crea el objeto  oUsuarioEntidad 
$oUsuarioEntidad = new cUsuarioEntidad; 
$oConectar = new cConexion;
$dbLink = $oConectar->Conectar();


# el objeto llama al metodo para asignar parametro
$oUsuarioEntidad->setId_Empleado($nId_Empleado);
$oUsuarioEntidad->setRol($sRol);
$oUsuarioEntidad->setNombreUsuario($sNombreUsuario);
$oUsuarioEntidad->setContrasena($sContrasena);

$oUsuarioModelo = New cUsuarioModelo($dbLink, $oUsuarioEntidad);
$oUsuarioModelo->RegistrarUsuario();

?>