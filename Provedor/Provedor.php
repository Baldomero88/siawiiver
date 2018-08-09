<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Provedores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
 	<div class="container-fluid">
    
       <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link"        href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link active" href="..Provedor/ProvedorListado.php">REGISTRAR PROVEDOR</a></li>
        <a class="nav-item nav-link"        href="../Provedor/ProvedorListado.php">LISTA DE PROVEDORES</a></li>
        <a class="nav-item nav-link"        href="../Cliente/ClienteListado.php">CLIENTES</a></li>
        <a class="nav-item nav-link"        href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link"        href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link"        href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link"        href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link"        href="../Servicio/servicioListado.php">SERVICIOS</a></li>
        <a class="nav-item nav-link"        href="../Cobranza/CobranzaListado.php">COBRANZA</a> </li>

    <br>	<br>	
    </ul>
	</div>

<form action="ProvedorRegistro.php" method="post">
	<div class="float col-xs-12 col-sm-6">
			<br>
			<h5>	


	</select>
	<br>	
	<label>	Nombre de la Compañia</label>
	<input type="text" class="form-control" name="sNombreCompania" placeholder="NOMBRE DE LA COMPAÑIA">

	<br>	
	<label>	Nombre de Contacto</label>
	<input type="text" class="form-control" name="sNombreContactoCompania" placeholder="NOMBRE(S)   PRIMER APELLIDO   SEGUNDO APELLIDO ">

	<br>	
	<label>	Dirección</label>
	<input type="text" class="form-control" name="sDireccionCompania" placeholder="CALLE   AVENIDA   NÚMERO EXTERIOR">

	<br>	
	<label>	Ciudad</label>
	<input type="text" class="form-control" name="sCiudad" placeholder="CIUDAD">

	<br>	
	<label>	Código Postal</label>
	<input type="text" class="form-control" name="nCodigoPostal" placeholder="CÓDIGO POSTAL">

	<br>	
	<label> País</label>
	<input type="text" class="form-control" name="sPais" placeholder="PAÍS">

	<br>	
	<label>	Número Telefónico</label>
	<input type="text" class="form-control" name="sTelefonoCompania" placeholder="NÚMERO TELEFÓNICO">

	<br>	
	<label>	Página Web</label>
	<input type="text" class="form-control" name="sPaginaWeb" placeholder="WWW.PAGINAWEB.COM">

	<br>	
	<input type="submit" class="btn btn-primary" name="RegistrarProvedor" value="REGISTRAR PROVEDOR">
</FORM>
</body>
</html>