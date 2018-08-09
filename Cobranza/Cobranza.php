<?php 
	require_once('cCobranzaController.php');
	$oCobranzaController = new cCobranzaController;
	$oServicioCobranza = $oCobranzaController->ObtenerServicioCobranza();
	 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Pagos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
	<div class="container-fluid">
    <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link active" href="../Cobranza/Cobranza.php">REGISTRAR PAGO</a></li>
        <a class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">LISTA DE PAGOS</a></li>
        <a class="nav-item nav-link" href="../Cliente/ClienteListado.php">CLIENTES</a></li>
        <a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>

    <br>	<br>	

    </ul>
	</div>

<form action="CobranzaRegistro.php" method="post">

<div class="float col-xs-12 col-sm-6">
			<br>
			<h5>	
			<label>	Mes de Pag</label>
			<br>
	<select class="form-control" name="nId_Servicio">
		<?php 
		for ($i = 0; $i < count($oServicioCobranza); $i++) {
			echo '<option value='.$oServicioCobranza[$i]['Id_Servicio'].'>'.$oServicioCobranza[$i]['TipoPaquete'].'</option>';
		}
		?>

	</select>
	<br>	
	<label> Estado de Pago</label>
	<input type="text" class="form-control" name="sEstadoPago" placeholder="ESTADO DE PAGO">

	<br>	
		<input type="submit" class="btn btn-primary" name="RegistrarCobranza" value="REGISTRAR COBRANZA">
</FORM>
</body>
</html>