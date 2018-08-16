<?php 
	require_once('cServicioController.php');
	$oServicioController = new cServicioController;
	$oEmpleadoServicio = $oServicioController->ObtenerEmpleadoServicio();
	$oClienteServicio = $oServicioController->ObtenerClienteServicio();
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Servicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
 
  <div class="container-fluid">
    
    <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link active" href="../Servicio/servicio">REGISTRAR SERVICIO</a></li>
        <a class="nav-item nav-link" href="ServicioListado.php">LISTA DE SERVICIOS</a></li>
        <a class="nav-item nav-link" href="../Cliente/ClienteListado.php">CLIENTES</a></li>
        <a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">COBRANZA</a> </li>

    <br>	<br>	

    </ul>
	</div>



	

<form action="ServicioRegistro.php" method="post">
	
	<div class="float col-xs-12 col-sm-6">
	<br>	
	<h5>
	<label>	Nombre del Empleado</label>
	<br>	
	<select class="form-control" name="Id_Empleado">
		<?php 
		for ($i = 0; $i < count($oEmpleadoServicio); $i++) {
			echo '<option value='.$oEmpleadoServicio[$i]['Id_Empleado'].'>'.$oEmpleadoServicio[$i]['NombreEmpleado'].'</option>';
		}
		?>
	</select>
	<br>	
	<label>	Nombre del Cliente</label>
	<br>
	<select class="form-control" name="Id_Cliente">
		<?php 
		for ($i = 0; $i < count($oClienteServicio); $i++) {
			echo '<option value='.$oClienteServicio[$i]['Id_Cliente'].'>'.$oClienteServicio[$i]['NombreCliente'].'</option>';
		}
		?>
	</select>

	<br>	
	<label>	Tipo de Paquete</label>
        <select class="form-control" name="sTipoPaquete">
            <option value="BASICO">BASICO</option>
            <option value="INTERMEDIO">INTERMEDIO</option>
            <option value="PREMIUM">PREMIUM</option>
        </select>
	
	<br>	
	<label>	Precio del Paquete</label>
	<input class="form-control" type="text" name="nPrecioPaquete" placeholder="PRECIO">
	
	<br>	
	<label>	Descripción del Paquete</label>
	<input  class="form-control" type="text" name="sDescripcionPaquete" placeholder="DESCRIBE LAS CARACTERISTICAS DEL PAQUETE">
	
	<br>
	<label>	Tipo de Servicio</label>
        <select class="form-control" name="sTipoServicio">
            <option value="INSTALACION">INSTALACION</option>
            <option value="MANTENIMIENTO">MANTENIMIENTO</option>
            <option value="VENTA">VENTA</option>
        </select>
        
	<br>	
	<label>	Precio del Servicio</label>
	<input class="form-control" type="text" name="nPrecioServicio" placeholder="COSTO DEL SERVICIO">
	
	<br>	
	<label>	Descripción del Servicio</label>
	<input class="form-control" type="text" name="sDescripcionServicio" placeholder="DESCRIBE LAS CARACTERISTICAS DEL SERVICIO">
	
	<br>	
	<label>	Forma de Pago</label>
        <select class="form-control" name="sFormaPago">
            <option value="EFECTIVO">EFECTIVO</option>
            <option value="CUENTA">CUENTA BANCARIA</option>
        </select>
        
	<br>	
	<label>	Fecha del Servicio</label>
	<input class="form-control" type="date" name="sFechaServicio" placeholder="FECHA DEL SERVICIO">
	
	<!--<br>	
	<label>	Fecha de baja del Servicio</label>
	<input class="form-control" type="date" name="sBajaServicio" placeholder="BAJA DE SERVICIO">
	
	<br>	
	<label>	Estado del Servicio</label>
	<input class="form-control" type="text" name="sEstadoServicio" placeholder="ACTIVO o INACTIVO">
	-->
	<br>	
	<input class="btn btn-primary" type="submit" name="RegistrarServicio" value="REGISTRAR SERVICIO">
</FORM>
</body>
</html>