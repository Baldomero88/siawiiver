<?php 
	require_once('cUsuarioController.php');
	$oUsuarioController = new cUsuarioController;
	$oEmpleadoUsuario = $oUsuarioController->ObtenerEmpleadoUsuario();
	 
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
 
  <div class="container-fluid">
    
    <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link active" href="../Usuario/Usuario.php">REGISTRAR USARIO</a></li>
        <a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">LISTA DE USUARIOS</a></li>
        <a class="nav-item nav-link" href="../Cliente/ClienteListado.php">CLIENTES</a></li>
        <a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>
        <a class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">COBRANZA</a> </li>

    <br>	<br>	

    </ul>
	</div>

<form action="UsuarioRegistro.php" method="post">
	
<div class="float col-xs-12 col-sm-6">
			<br>
			<h5>	
			<label>	Nombre del Empleado</label>
			<br>
	<select class="form-control" name="nId_Empleado">
		<?php 
		for ($i = 0; $i < count($oEmpleadoUsuario); $i++) {
			echo '<option value='.$oEmpleadoUsuario[$i]['Id_Empleado'].'>'.$oEmpleadoUsuario[$i]['NombreEmpleado'].'</option>';
		}
		?>
	</select>
	<br>	
	<label>	Rol </label>
	<input type="text" class="form-control" name="sRol" placeholder="ROL QUE DESEMPEÑA">

	<br>	
	<label>	Nombre del Usuario</label>
	<input type="text" class="form-control" name="sNombreUsuario" placeholder="NOMBRE DE USUARIO">

	<br>	
	<label>	Contraseña</label>
	<input type="password" class="form-control" name="sContrasena" placeholder="CONTRASEÑA">

	<br>	
	<input type="submit" class="btn btn-primary" name="RegistrarUsuario" value="REGISTRAR USUARIO">


</FORM>
</body>
</html>