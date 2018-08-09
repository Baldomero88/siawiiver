
<?php
    require_once('cCobranzaController.php');
    $oCobranzaController = new cCobranzaController;
    $oServicioCobranza = $oCobranzaController->ObtenerServicioCobranza();

    //Imprime un Array u objeto
    //echo '<pre>';
    //print_r($oListadoCobranza);
    //echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Pagos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Librería CDN de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">

       <ul class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="../index.php">INICIO</a></li>
        <a class="nav-item nav-link" href="Cobranza.php">REGISTRAR COBRANZA</a></li>
        <a class="nav-item nav-link" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
        <a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
        <a class="nav-item nav-link active" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
        <a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
        <a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
        <a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
        <a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>
        <a  class="nav-item nav-link" href="Cobranza/CobranzaListado.php">COBRANZA</a> </li>
        
        <br>    <br>    
        </ul>
        <br>    <br>    
        <h3> <P> <EM>WIIVER Ingenieria Aplicada en Redes PAGOS</EM></P></h3>
    <?php
        // Condicion que se ejecuta si se presiona el boton de Modificar
        if (isset($_POST['modificarCobranza'])) {
            $nId_Cobranza = $_POST['nId_Cobranza'];

            $oListadoCobranzaPorId = $oCobranzaController->obtenerListadoCobranzaPorId($nId_Cobranza);

            echo '<form action="CobranzaRegistro.php" method="post">';

            echo '<div class="form-group">';
                echo'<div class="float col-xs-12 col-sm-6">';
                echo'<h5>';
                echo '<label>Nombre del Servicio</label>';
                echo'<br>';    
                echo '<select name="nId_Servicio" class="form-control" >';
                for ($i = 0; $i < count($oServicioCobranza); $i++) {
                    echo '<option value='.$oServicioCobranza[$i]['Id_Servicio'].'>'.$oServicioCobranza[$i]['TipoPaquete'].'</option>';
                }

                echo'<br>';
                echo '</select>';
                echo '<input type="hidden" class="form-control" name="Id_Cobranza" value='.$oListadoCobranzaPorId[0]['Id_Cobranza'].' >';


                echo'<br>';
                echo '<label>Mes de Pago</label>';                
                echo '<input type="text" class="form-control" name="sNombreCobranza" value="'.$oListadoCobranzaPorId[0]['NombreCobranza'].'" placeholder="MES DE PAGO">';

                echo'<br>';
                echo '<label>Estado de Pago</label>';                
                echo '<input type="text" class="form-control" name="sEstadoPago" value="'.$oListadoCobranzaPorId[0]['EstadoPago'].'" placeholder="ESTADO DE PAGO">';

                echo '<br>';
                echo '<input type="submit" class="btn btn-success" name="modificarCobranza" value="MODIFICAR Cobranza">';
            echo '</form>';
        }

        // Condicion que se ejecuta si se presiona el boton de Eliminar
        elseif (isset($_POST['eliminarCobranza'])) {
            $nId_Cobranza = $_POST['nId_Cobranza'];

            $oEliminarCobranzaPorId = $oCobranzaController->eliminarCobranzaPorId($nId_Cobranza);
        }

        // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
        else{
    ?>
            <!-- Se muestra la tabla de Cobranzas-->
            <div class="table-bordered table-responsive">
                <table class="table">
                    <thead class="thead-light">
                <tr>
                    <th scope="COL">Servicio</th>
                    <th scope="COL">Tipo de Paquete</th>
                    <th scope="COL">Mes de Pago</th>
                    <th scope="COL">Estado de Pago</th>
                    <th scope="COL">Modificar</th>
                    <th scope="COL">Eliminar</th>
                </thead>

                </tr>
    <?php

            //Se recorre el objeto $oListadoCobranza que contiene todos los registros que se solicitaron a través del controller
            $oListadoCobranza = $oCobranzaController->obtenerListadoCobranza();

            for ($i = 0; $i < count($oListadoCobranza); $i++) {

                // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                echo ' <form action="CobranzaListado.php" method="post">';

                // Se envía el id del Cobranza de forma oculta
                echo '<input type="hidden" name="nId_Cobranza" value='.$oListadoCobranza[$i]['Id_Cobranza'].' />';

                // Mostramos todas las columnas oobtenidas a través del objeto
                echo '<tr>';
                    echo '<th scope="row">'.$oListadoCobranza[$i]['TipoPaquete'].'</th>';
                    echo '<td>'.$oListadoCobranza[$i]['MesPago'].'</td>';
                    echo '<td>'.$oListadoCobranza[$i]['EstadoPago'].'</td>';
                    // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                    echo '<td><input type="submit" class="btn btn-primary" name="modificarCobranza" value="Modificar" /></td>';
                    echo '<td><input type="submit" class="btn btn-danger" name="eliminarCobranza" value="Eliminar" /></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
