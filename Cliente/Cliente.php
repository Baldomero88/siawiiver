<?php 
	require_once('cClienteController.php');
	$oClienteController = new cClienteController;
	$oPuntoAccesoCliente = $oClienteController->ObtenerPuntoAccesoCliente();
	 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
 
  <div class="container-fluid">
    
    <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link active" href="../Cliente/Cliente.php">REGISTRAR CLIENTE</a></li>
        <a class="nav-item nav-link" href="../Cliente/ClienteListado.php">LISTA DE CLIENTES</a></li>
        <a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>

    <br>	<br>	

    </ul>
	</div>

<form action="ClienteRegistro.php" method="post">
		<div class="float col-xs-12 col-sm-6">
			<br>
			<h5>	
			<label>	Nombre del Punto de Acceso</label>
			<br>
	<select class="form-control" name="nId_PuntoAcceso">
		<?php 
			for ($i = 0; $i < count($oPuntoAccesoCliente); $i++) {
				echo '<option value='.$oPuntoAccesoCliente[$i]['Id_PuntoAcceso'].'>'.$oPuntoAccesoCliente[$i]['NombrePuntoAcceso'].'</option>';
			}
		?>
	</select>

	<br>	
	<label>	Nombre del Cliente</label>
	<input type="text" class="form-control" name="sNombreCliente" placeholder="NOMBRE(S), PRIMER APELLIDO, SEGUNDO APELLIDO">
	
	<br>	
	<label>	Dirección</label>
	<input type="text" class="form-control" name="sDireccionCliente" placeholder="CALLE   AVENIDA   NÚMERO EXTERIOR">
	
    <br>	
	<label>	Localidad</label>
	<input type="text" class="form-control" name="sLocalidad" placeholder="LOCALIDAD">
	
    <br>	
	<label>	Municipio</label>
	<input type="text" class="form-control" name="sMunicipio" placeholder="MUNICIPIO">
	
    <br>	
	<label> Número Telefónico del Cliente</label>
	<input type="text" class="form-control" name="sTelefonoCliente" placeholder="(LADA)+">
	
    <br>	
	<label>	Referencia de Localización</label>
	<input type="text" class="form-control" name="sReferencia" placeholder="REFERENCIA">
	
	<br>
	<input class="btn btn-primary" type="submit" name="RegistrarCliente" value="REGISTRAR CLIENTE">
</form>
</body>
</html>