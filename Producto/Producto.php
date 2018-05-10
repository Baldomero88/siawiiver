<?php 
	require_once('cProductoController.php');
	$oProductoController = new cProductoController;
	$oProvedorProducto = $oProductoController->ObtenerProvedorProducto();
	 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Producto</title>
</head>
<body>
<form action="ProductoRegistro.php" method="post">
	<select name="nId_Provedor">
		<?php 
		for ($i = 0; $i < count($oProvedorProducto); $i++) {
			echo '<option value='.$oProvedorProducto[$i]['Id_Provedor'].'>'.$oProvedorProducto[$i]['NombreCompania'].'</option>';
		}
		?>
	</select>
	<input type="text" name="sNombreProducto" placeholder="sNombreProducto">
	<input type="text" name="nCantidadUnidad" placeholder="nCantidadUnidad">
	<input type="text" name="nPrecioUnidad" placeholder="nPrecioUnidad">
	<input type="text" name="nUnidadAlmacen" placeholder="nUnidadAlmacen">
	<input type="text" name="nUnidadServicio" placeholder="nUnidadServicio">
	<input type="text" name="nReordenarNivel" placeholder="nReordenarNivel">
	<input type="text" name="nTerminado" placeholder="nTerminado">
	<input type="submit" name="RegistrarProducto" value="Registrar Producto">
</FORM>
</body>
</html>