<?php 
	require_once('cUsuarioController.php');
	$oUsuarioController = new cUsuarioController;
	$oEmpleadoUsuario = $oUsuarioController->ObtenerEmpleadoUsuario();
	 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuario</title>
</head>
<body>
<form action="UsuarioRegistro.php" method="post">
	<select name="Id_Empleado">
		<?php 
		for ($i = 0; $i < count($oEmpleadoUsuario); $i++) {
			echo '<option value='.$oEmpleadoUsuario[$i]['Id_Empleado'].'>'.$oEmpleadoUsuario[$i]['NombreEmpleado'].'</option>';
		}
		?>
	</select>
	<input type="text" name="sRol" placeholder="ROL">
	<input type="text" name="sNombreUsuario" placeholder="NOMBRE DE USUARIO">
	<input type="text" name="sContrasena" placeholder="CONTRASEÑA">
	<input type="submit" name="RegistrarUsuario" value="Registrar Usuario">
</FORM>
</body>
</html>