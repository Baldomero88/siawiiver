<?php 
	require_once('cServicioController.php');
	$oServicioController = new cServicioController;
	$oEmpleadoServicio = $oServicioController->ObtenerEmpleadoServicio();
	$oClienteServicio = $oServicioController->ObtenerClienteServicio();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Servicio</title>
</head>
<body>
<form action="ServicioRegistro.php" method="post">
	<select name="nId_Empleado">
		<?php 
		for ($i = 0; $i < count($oEmpleadoServicio); $i++) {
			echo '<option value='.$oEmpleadoServicio[$i]['nId_Empleado'].'>'.$oEmpleadoServicio[$i]['NombreEmpleado'].'</option>';
		}
		?>
	</select>
	<select name="nId_Cliente">
		<?php 
		for ($i = 0; $i < count($oClienteServicio); $i++) {
			echo '<option value='.$oClienteServicio[$i]['nId_Cliente'].'>'.$oClienteServicio[$i]['NombreCliente'].'</option>';
		}
		?>
	</select>
	<input type="text" name="sTipoPaquete" placeholder="BASICO INTERMEDIO PREMIUM">
	<input type="text" name="nPrecioPaquete" placeholder="PRECIO">
	<input type="text" name="sDescripcionPaquete" placeholder="DESCRIBE LAS CARACTERISTICAS DEL PAQUETE">
	<input type="text" name="sTipoServicio" placeholder="INSTALACION MANTENIMIENTO VENTA">
	<input type="text" name="nPrecioServicio" placeholder="COSTO DEL SERVICIO">
	<input type="text" name="sDescripcionServicio" placeholder="DESCRIBE LAS CARACTERISTICAS DEL SERVICIO">
	<input type="text" name="sFormaPago" placeholder="EFECTIVO o CUENTA BANCARIA">
	<input type="text" name="sFechaServicio" placeholder="FECHA DEL SERVICIO">
	<input type="text" name="sBajaServicio" placeholder="BAJA DE SERVICIO">
	<input type="text" name="sEstadoServicio" placeholder="ACTIVO o INACTIVO">

	<input type="submit" name="RegistrarServicio" value="Registrar Servicio">
</FORM>
</body>
</html>