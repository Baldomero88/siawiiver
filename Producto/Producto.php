<?php 
	require_once('cProductoController.php');
	$oProductoController = new cProductoController;
	$oProvedorProducto = $oProductoController->ObtenerProvedorProducto();
	 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
	<div class="container-fluid">
    <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link active" href="../Producto/Producto.php">REGISTRAR PRODUCTO</a></li>
        <a class="nav-item nav-link" href="../Producto/ProductoListado.php">LISTA DE PRODUCTOS</a></li>
        <a class="nav-item nav-link" href="../Cliente/ClienteListado.php">CLIENTES</a></li>
        <a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>
        <a class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">COBRANZA</a></li>

    <br>	<br>	

    </ul>
	</div>

<form action="ProductoRegistro.php" method="post">

<div class="float col-xs-12 col-sm-6">
			<br>
			<h5>	
			<label>	Nombre del Provedor</label>
			<br>
	<select class="form-control" name="nId_Provedor">
		<?php 
		for ($i = 0; $i < count($oProvedorProducto); $i++) {
			echo '<option value='.$oProvedorProducto[$i]['Id_Provedor'].'>'.$oProvedorProducto[$i]['NombreCompania'].'</option>';
		}
		?>

	</select>
	<br>	
	<label>	Nombre del Producto</label>
	<input type="text" class="form-control" name="sNombreProducto" placeholder=" ">

	<br>	
	<label>	Cantidad por unidad</label>
	<input type="text" class="form-control" name="nCantidadUnidad" placeholder=" ">

	<br>	
	<label>	Precio</label>
	<input type="text" class="form-control" name="nPrecioUnidad" placeholder=" ">

	<br>	
	<label>	Unidades en almacen</label>
	<input type="text" class="form-control" name="nUnidadAlmacen" placeholder=" ">

	<br>	
	<label>	Unidad en Servicio</label>
	<input type="text" class="form-control" name="nUnidadServicio" placeholder=" ">

	<br>	
	<label>	Reordenar Nivel</label>
	<input type="text" class="form-control" name="nReordenarNivel" placeholder=" ">

	<br>	
	<label>	Terminado</label>
	<input type="text" class="form-control" name="nTerminado" placeholder="  ">

	<br>	
		<input type="submit" class="btn btn-primary" name="RegistrarProducto" value="REGISTRAR PRODUCTO">
</FORM>
</body>
</html>