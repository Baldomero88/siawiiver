<!DOCTYPE html>
<html>
<head>
	<title>Registro de Provedor</title>
</head>
<body>

<ul>
    <li><a href="../index.php">Inicio</a></li>
    <li><a href="ProvedorListado.php">Lista de Provedores</a></li>
</ul>

<form action="ProvedorRegistro.php" method="post">
	<input type="text" name="sNombreCompania" placeholder="sNombreCompania">
	<input type="text" name="sNombreContactoCompania" placeholder="sNombreContactoCompania">
	<input type="text" name="sDireccionCompania" placeholder="sDireccionCompania">
	<input type="text" name="sCiudad" placeholder="sCiudad">
	<input type="text" name="nCodigoPostal" placeholder="nCodigoPostal">
	<input type="text" name="sPais" placeholder="sPais">
	<input type="text" name="sTelefonoCompania" placeholder="sTelefonoCompania">
	<input type="text" name="sPaginaWeb" placeholder="sPaginaWeb">
	<input type="submit" name="RegistrarProvedor" value="Registrar Provedor">
</FORM>
</body>
</html>