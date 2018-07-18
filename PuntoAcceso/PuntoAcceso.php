<!DOCTYPE html>
<html>
<head>
	<title>Registro del Punto de Acceso</title>
</head>
<body>

<ul>
    <li><a href="../index.php">Inicio</a></li>
    <li><a href="PuntoAccesoListado.php">Listar Puntos de Acceso</a></li>
</ul>

<form action="PuntoAccesoRegistro.php" method="post">
	<input type="text" name="sNombrePuntoAcceso" placeholder="sNombrePuntoAcceso">
	<input type="text" name="sUbicacion" placeholder="sUbicacion">
	<input type="text" name="sNombreContacto" placeholder="sNombreContacto">
	<input type="text" name="sTelefonoPuntoAcceso" placeholder="sTelefonoPuntoAcceso">
	<input type="text" name="sDireccionMac" placeholder="sDireccionMac">
	<input type="text" name="sContrasenaWifi" placeholder="sContraseñaWifi">
	<input type="submit" name="RegistrarPuntoAcceso" value="Registrar Punto de Acceso">
</FORM>
</body>
</html>