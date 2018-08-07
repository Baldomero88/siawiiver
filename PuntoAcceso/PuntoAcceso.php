<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Puntos de Acceso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    
       <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link"        href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link active" href="..PuntoAcceso/PuntoAccesoListado.php">REGISTRAR PUNTO DE ACCESO</a></li>
        <a class="nav-item nav-link"        href="../PuntoAcceso/PuntoAccesoListado.php">LISTA DE PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link"        href="../Cliente/ClienteListado.php">CLIENTES</a></li>
        <a class="nav-item nav-link"        href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link"        href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link"        href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        
        <a class="nav-item nav-link"        href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link"        href="../Servicio/servicioListado.php">SERVICIOS</a></li>

    <br>	<br>	
    </ul>
	</div>

<form action="PuntoAccesoRegistro.php" method="post">

<div class="float col-xs-12 col-sm-6">
	<br>
	<h5>	
	</select>
	<br>	
	<label>	Nombre del Punto de Acceso</label>
	<input type="text" class="form-control" name="sNombrePuntoAcceso" placeholder="NOMBRE DEL PUNTO DE ACCESO">

	<br>
	<label>	Ubicación</label>	
	<input type="text" class="form-control" name="sUbicacion" placeholder="UBICACIÓN">

	<br>
	<label>	Nombre de Contacto</label>	
	<input type="text" class="form-control" name="sNombreContacto" placeholder="NOMBRE DE CONTACTO">

	<br>
	<label>	Número Telefónico</label>	
	<input type="text" class="form-control" name="sTelefonoPuntoAcceso" placeholder="NÚMERO TELEFÓNICO">

	<br>
	<label>	Dirección MAC</label>	
	<input type="text" class="form-control" name="sDireccionMac" placeholder="00:00:00:00:00:00:00:00">

	<br>
	<label>	Contraseña WIFI</label>	
	<input type="text" class="form-control" name="sContrasenaWifi" placeholder="CONTRASEÑA WIFI">

	<br>
	<input type="submit" class="btn btn-primary" name="RegistrarPuntoAcceso" value="REGISTRAR PUNTO DE ACCESO">
</FORM>
</body>
</html>