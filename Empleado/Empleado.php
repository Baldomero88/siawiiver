<!DOCTYPE html>
<html>
<head>
	<title>Registro de Empleado</title>
</head>
<body>

<ul>
    <li><a href="../index.php">Inicio</a></li>
    <li><a href="EmpleadoListado.php">Lista de Empleados</a></li>
</ul>

<form action="EmpleadoRegistro.php" method="post">
	<input type="text" name="sNombreEmpleado" placeholder="sNombreEmpleado">
	<input type="text" name="sDireccionEmpleado" placeholder="sDireccionEmpleado">
	<input type="text" name="sTelefonoEmpleado" placeholder="sTelefonoEmpleado">
	<input type="text" name="sPuesto" placeholder="sPuesto">
	<input type="text" name="nHonorario" placeholder="nHonorario">
	<input type="submit" name="RegistrarEmpleado" value="Registrar Empleado">
</FORM>
</body>
</html>