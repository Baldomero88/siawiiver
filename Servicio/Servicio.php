

<?php 
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'COBRANZA' || $_SESSION['rol'] == 'TECNICO') {
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
    
    <ul class="nav nav-tabs nav-justified">
        <li><a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <li><a class="nav-item nav-link active" href="../Servicio/servicio">REGISTRAR SERVICIO</a></li>
        <li><a class="nav-item nav-link" href="ServicioListado.php">LISTA DE SERVICIOS</a></li>
        <li><a class="nav-item nav-link" href="../Cliente/ClienteListado.php">CLIENTES</a></li>
        <li><a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <li><a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <li><a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <li><a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <li><a class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">COBRANZA</a> </li>
        <li><a class="nav-item nav-link" href="../Usuario/cerrarSesion.php">CERRAR SESION</a> </li>
    	
	</ul>
   <br>	<br>
   
    <!--Indica la alerta de usuario-->
    
	<div class="row">
	<div class="col-md-12"> 
    <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">¡Bienvenido!</h4>
    <?php echo 'USUARIO: '.$_SESSION['usuario'].'<br> ROL: '.$_SESSION['rol'];?>
    <hr>
    <p class="mb-0"></p>

	</div></div></div>


	<!--determina el espacio que ocupara la columna de la izquierda-->

<form action="ServicioRegistro.php" method="post">
	
	<div class="container">
		<div class="row">
		<div class="col-md-3"> 
		<h4><p class="p-3 mb-2 bg-info text-white text-center">Misión</p></h4>
					<p class="	text-justify">	Somos una empresa que otorga asesoría tecnológica en telecomunicaciones, brindando servicios de forma integral, responsable y competitiva, garantizando la calidad en nuestros servicios.</p>
		
		<h4><p class="p-3 mb-2 bg-info text-white text-center">Visión</p></h4>
					<p class="text-justify text-dark">Seremos para el año 2025 una de las empresas más reconocidas en el estado de Veracruz ampliando los servicios a toda la república en el área de telecomunicaciones brindando servicios de calidad con el más capacitado personal humano y recursos tecnológicos de vanguardia.</p>
	</div>


<!--determina el espacio que ocupara el formulario en el centro-->
	<div class="col-md-6">
	<h5><p class="p-3 mb-2 bg-dark text-white text-center">Ingresa los datos del nuevo Servicio</p>
	<br><br>	
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
	
	<br>	
	<label>	Fecha de baja del Servicio</label>
	<input class="form-control" type="date" name="sBajaServicio" placeholder="BAJA DE SERVICIO">
	
	<br>	
	<label>	Estado de servicio</label>
        <select class="form-control" name="sEstadoServicio">
            <option value="ACTIVO">ACTIVO</option>
            <option value="INACTIVO">INACTIVO</option>
        </select>
        
	<br>	
	<input class="btn btn-primary" type="submit" name="RegistrarServicio" value="REGISTRAR SERVICIO">
</h5>
</div>


	<!--determina el espacio de la columna de la izquierda-->
	<div class="col-md-3">
	<img src="../img/wiiver.jpeg" class="rounded mx-auto float-right w-100"  >
	<br><br><br><br><br><br><br><br>		

	<!--	<h4><p class="p-3 mb-2 bg-secondary text-white text-center">Misión</p></h4>
	<p class="	text-justify">	Somos una empresa otorga asesoría tecnológica en telecomunicaciones, brindando servicios de forma integral, responsable y competitiva, garantizando la calidad en nuestros servicios.</p>
		
			<h4><p class="p-3 mb-2 bg-success text-white text-center">Visión</p></h4>
	<p class="text-justify text-dark">Seremos para el año 2025 una de las empresas más reconocidas en el estado de Veracruz ampliando los servicios a toda la república en el área de telecomunicaciones brindando servicios de calidad con el más capacitado personal humano y recursos tecnológicos de vanguardia.</p>-->

	
</div>
</div>
</div>

        <br> <br>	<br>
		<div class="p-3 mb-2 bg-info text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>	

</form>
</body>
</html>
<?php
}
?>