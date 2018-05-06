<?php 
	require_once('cClienteController.php');
	$oClienteController = new cClienteController;
	$oPuntoAccesoCliente = $oClienteController->ObtenerPuntoAccesoCliente();
	 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Cliente</title>
</head>
<body>
<form action="ClienteRegistro.php" method="post">
	<select name="nId_PuntoAcceso">
		<?php 
		for ($i = 0; $i < count($oPuntoAccesoCliente); $i++) {
			echo '<option value='.$oPuntoAccesoCliente[$i]['nId_PuntoAcceso'].'>'.$oPuntoAccesoCliente[$i]['NombrePuntoAcceso'].'</option>';
		}
		?>
	</select>
	<input type="text" name="sNombreCliente" placeholder="sNombreCliente">
	<input type="text" name="sDireccionCliente" placeholder="sDireccionCliente">
	<input type="text" name="sLocalidad" placeholder="sLocalidad">
	<input type="text" name="sMunicipio" placeholder="sMunicipio">
	<input type="text" name="sTelefonoCliente" placeholder="sTelefonoCliente">
	<input type="text" name="sReferencia" placeholder="sReferencia">
	<input type="text" name="sContrasenaWifi" placeholder="sContrasenaWifi">
	<input type="submit" name="RegistrarCliente" value="Registrar Cliente">
</FORM>
</body>
</html>