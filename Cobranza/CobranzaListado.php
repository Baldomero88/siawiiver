

<?php
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'COBRANZA') {

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

            <ul class="nav nav-tabs nav-justified">
                <li><a class="nav-item nav-link" href="../index.php">INICIO</a></li>
                <li><a class="nav-item nav-link" href="Cobranza.php">REGISTRAR COBRANZA</a></li>
                <li><a class="nav-item nav-link" href="../Cliente/ClienteListado.php ">CLIENTES</a></li>
                <li><a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
                <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
                <li><a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
                <li><a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
                <li><a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
                <li><a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>
                <li><a class="nav-item nav-link active" href="CobranzaListado.php">COBRANZA</a> </li>
                <li><a class="nav-item nav-link" href="../Usuario/cerrarSesion.php">CERRAR SESION</a> </li>
                </ul>
        <br>    <br>


  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">¡Bienvenido!</h4>
   <?php echo 'USUARIO: '.$_SESSION['usuario'].'<br> ROL: '.$_SESSION['rol'];?>
  <hr>
  <p class="mb-0"></p>
</div>
            <?php
            
            // Condicion que se ejecuta si se presiona el boton de Modificar
            if (isset($_POST['modificarCobranza'])) {
                $nId_Cobranza = $_POST['nId_Cobranza'];

                $oListadoCobranzaPorId = $oCobranzaController->obtenerServicioCobranza($nId_Cobranza);

                echo '<form action="CobranzaRegistro.php" method="post">';

                

                echo '<div class="form-group">';
                echo'<div class="float col-xs-12 col-sm-6">';
                echo'<h5>';
                
                echo '<input type="hidden" name="Id_Cobranza" value="'.$oListadoCobranzaPorId[0]['Id_Cobranza'].'"" >';

                echo '<label>Nombre del Cliente</label>';
                echo'<br>';
                echo '<select name="nId_Servicio" class="form-control" >';
                for ($i = 0; $i < count($oServicioCobranza); $i++) {
                    echo '<option value=' . $oServicioCobranza[$i]['nId_Servicio'] . '>' . $oServicioCobranza[$i]['NombreCliente'] . '</option>';
                }

                echo'<br>';
                echo '</select>';
                


                echo'<br>';

                 echo'<label>Mes de pago</label>';
                    echo '<select class="form-control" name="sMesPago">';
                        echo'<option value="ENERO">ENERO</option>';
                        echo'<option value="FEBRERO">FEBRERO</option>';
                        echo'<option value="MARZO">MARZO</option>';
                        echo'<option value="ABRIL">ABRIL</option>';
                        echo'<option value="MAYO">MAYO</option>';
                        echo'<option value="JUNIO">JUNIO</option>';
                        echo'<option value="JULIO">JULIO</option>';
                        echo'<option value="AGOSTO">AGOSTO</option>';
                        echo'<option value="SEPTIEMBRE">SEPTIEMBRE</option>';
                        echo'<option value="OCTUBRE">OCTUBRE</option>';
                        echo'<option value="NOVIEMBRE">NOVIEMBRE</option>';
                        echo'<option value="DICIEMBRE">DICIEMBRE</option>';
                    echo'</select>';

                echo'<br>';
                echo '<label>Año</label>';
                 echo '<select class="form-control" name="sAno">';
                        echo'<option value="2017">2017</option>';
                        echo'<option value="2018">2018</option>';
                        echo'<option value="2019">2019</option>';
                        echo'<option value="2020">2020</option>';
                        echo'<option value="2021">2021</option>';
                        echo'<option value="2022">2022</option>';

                    echo'</select>';

                 echo'<br>';
                echo '<label>Servicio</label>';
                echo '<input type="text" class="form-control" name="nServicio" value="' . $oListadoCobranzaPorId[0]['Servicio'] . '" placeholder="SERVICIO">';

                 echo'<br>';
                echo '<label>Otros cargos</label>';
                echo '<input type="text" class="form-control" name="OtrosCargos" value="' . $oListadoCobranzaPorId[0]['OtrosCargos'] . '" placeholder="OTROS CARGOS">';


                echo'<label>Estado de pago</label>';
                    echo '<select class="form-control" name="sEstadoServicio">';
                        echo'<option value="ACTIVO">ACTIVO</option>';
                        echo'<option value="INACTIVO">INACTIVO</option>';
                    echo'</select>';

                echo'<br>';
                echo '<input type="submit" class="btn btn-success" name="modificarCobranza" value="MODIFICAR Cobranza">';
                echo '</form>';
            }

            // Condicion que se ejecuta si se presiona el boton de Eliminar
            elseif (isset($_POST['eliminarCobranza'])) {
                $nId_Cobranza = $_POST['nId_Cobranza'];

                $oEliminarCobranzaPorId = $oCobranzaController->eliminarCobranzaPorId($nId_Cobranza);
            }

            // Por default se muestra la tabla de datos, ya que no cumple ninguna de las condiciones anteriores
            else {
                ?>
            <div class="float col-xs-12 col-sm-6">
                <form action="CobranzaListado.php" method="post">
                    <div class="form-group">
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" name="listarVencidos" value="Listar por Meses Vencidos">
                        </div>
                        <label><h4>Listar por Servicio(Cliente)</h4></label>
                        <select class="form-control" name="nId_Servicio">';
                            <?php 
                                for ($i = 0; $i < count($oServicioCobranza); $i++) {
                                    echo '<option value='.$oServicioCobranza[$i]['Id_Servicio'].'>'.$oServicioCobranza[$i]['NombreCliente'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="listar" value="Listar por Servicios de Clientes">
                    </div>
                </form>
                </div>
                
                <?php
                 if (isset($_POST['listar'])){
                ?>
                <!-- Se muestra la tabla de Cobranzas-->
                <div class="table-bordered table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="COL">Servicio(Cliente)</th>
                                <th scope="COL">Mes de Pago</th>
                                <th scope="COL">Año de Pago</th>
                                <th scope="COL">Servicio</th>
                                <th scope="COL">Otros Cargos</th>
                                <th scope="COL">Estado de Pago</th>
                                <th scope="COL">Modificar</th>
                                <th scope="COL">Eliminar</th>
                            </tr>
                        </thead>

                        
                        <?php
                        //Se recorre el objeto $oListadoCobranza que contiene todos los registros que se solicitaron a través del controller
                        $oListadoCobranza = $oCobranzaController->obtenerListadoCobranzaPorId($_POST['nId_Servicio']);

                        for ($i = 0; $i < count($oListadoCobranza); $i++) {

                            // Se crea un formlario que se direcciona hacia la misma ruta de este archivo y se condiciona en los primeras lineas dependiendo el boton presionado
                            echo ' <form action="CobranzaListado.php" method="post">';

                            // Se envía el id del Cobranza de forma oculta
                            echo '<input type="hidden" name="nId_Cobranza" value=' . $oListadoCobranza[$i]['Id_Cobranza'] . ' />';

                            // Mostramos todas las columnas oobtenidas a través del objeto
                            echo '<tr>';
                            echo '<td>' . $oListadoCobranza[$i]['NombreCliente'] . '</td>';
                            echo '<td>' . $oListadoCobranza[$i]['MesPago'] . '</td>';
                            echo '<td>' . $oListadoCobranza[$i]['AnoPago'] . '</td>';
                            echo '<td>' . $oListadoCobranza[$i]['Servicio'] . '</td>';
                            echo '<td>' . $oListadoCobranza[$i]['OtrosCargos'] . '</td>';
                            echo '<td>' . $oListadoCobranza[$i]['EstadoPago'] . '</td>';
                            // Mostramos los botones Modificar y Eliminar los cuales entran en las condiciones
                            echo '<td><input type="submit" class="btn btn-primary" name="modificarCobranza" value="Modificar" /></td>';
                            echo '<td><input type="submit" class="btn btn-danger" name="eliminarCobranza" value="Eliminar" /></td>';
                            echo '</tr>';
                            echo '</form>';
                        }
                        echo '</table>';
                 }elseif(isset($_POST['listarVencidos'])) {
                    $oListadoPagosVencidos = $oCobranzaController->obtenerListadoPagosVencidos();
                    
                    for ($i = 0; $i < count($oListadoPagosVencidos); $i++) {
                        $nTotalPagosVencidos = $oListadoPagosVencidos[$i]['TotalServicio'] + $oListadoPagosVencidos[$i]['TotalCargos'];
                        echo '<div class="table-bordered table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="COL">Nombre Cliente</th>
                                        <th scope="COL">No. Meses Vencidos</th>
                                        <th scope="COL">Servicios</th>
                                        <th scope="COL">Cargos</th>
                                        <th scope="COL">Total</th>
                                    </tr>
                                    </thead>

                                    <tr class="table-danger">
                                        <td>'.$oListadoPagosVencidos[$i]['NombreCliente'].'</td>
                                        <td>'.$oListadoPagosVencidos[$i]['NumeroVencidos'].'</td>
                                        <td>'.$oListadoPagosVencidos[$i]['TotalServicio'].'</td>
                                        <td>'.$oListadoPagosVencidos[$i]['TotalCargos'].'</td>
                                        <td>'.$nTotalPagosVencidos.'</td>
                                    </tr>
                                </table>
                            </div>';
                    }
                 }
                    }
                    ?>
                    </body>
                    </html>
<br> <br>   <br>    <br>


<div class="p-3 mb-2 bg-info text-white">.bg-info
<div class="col-12">

    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.    </p>
    </div>  
</div>
</body>
</html>
<?php
}
?>
