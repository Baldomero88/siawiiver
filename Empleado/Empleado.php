<?php 
	require_once('cEmpleadoController.php');
	$oEmpleadoController = new cEmpleadoController;

	 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

 	<div class="container-fluid">
    
       <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link"        href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link active" href="..Empleado/EmpleadoListado.php">REGISTRAR EMPLEADO</a></li>
        <a class="nav-item nav-link"        href="../Empleado/EmpleadoListado.php">LISTA DE EMPLEADOS</a></li>
        <a class="nav-item nav-link"        href="../Cliente/ClienteListado.php">CLIENTES</a></li>
        <a class="nav-item nav-link"        href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link"        href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <a class="nav-item nav-link"        href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link"        href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link"        href="../Servicio/servicioListado.php">SERVICIOS</a></li>
        <a  class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">COBRANZA</a> </li>

    <br>	<br>	
    </ul>
	</div>
<form action="EmpleadoRegistro.php" method="post">
	<div class="float col-xs-12 col-sm-6">
			<br>
			<h5>	


	</select>
	<br>	
	<label>	Nombre del Empleado</label>
	<input type="text" class="form-control" name="sNombreEmpleado" placeholder="NOMBRE(S)   PRIMER APELLIDO   SEGUNDO APELLIDO ">


	</select>
	<br>	
	<label>	Dirección</label>
	<input type="text" class="form-control" name="sDireccionEmpleado" placeholder="CALLE   AVENIDA   MUNICIPIO ">
	
	</select>
	<br>	
	<label>	Número Telefónico</label>
	<input type="text" class="form-control" name="sTelefonoEmpleado" placeholder="(LADA)+">

	</select>
	<br>	
	<label>	Puesto que desempeña</label>
	<input type="text" class="form-control" name="sPuesto" placeholder="PUESTO">
	
	</select>
	<br>	
	<label>	Honorarios</label>
	<input type="text" class="form-control" name="nHonorario" placeholder="HONORARIOS">
	<br>

	<input type="submit" class="btn btn-primary" name="RegistrarEmpleado" value="REGISTRAR EMPLEADO">
</form>
</body>
</html>