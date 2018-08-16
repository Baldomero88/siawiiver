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
                <li><a class="nav-item nav-link" href="../index.php">INICIO</a></li>
                <li><a class="nav-item nav-link active" href="../Cobranza/Cobranza.php">REGISTRAR PAGO</a></li>
                <li><a class="nav-item nav-link" href="../Cobranza/CobranzaListado.php">LISTA DE PAGOS</a></li>
                <li><a class="nav-item nav-link" href="../Cliente/ClienteListado.php">CLIENTES</a></li>
                <li><a class="nav-item nav-link" href="../Empleado/EmpleadoListado.php">EMPLEADOS</a></li>
                <li><a class="nav-item nav-link" href="../Producto/ProductoListado.php">PRODUCTOS</a></li>
                <li><a class="nav-item nav-link" href="../Provedor/ProvedorListado.php">PROVEDORES</a></li>
                <li><a class="nav-item nav-link" href="../PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a></li>
                <li><a class="nav-item nav-link" href="../Usuario/UsuarioListado.php">USUARIOS</a></li>
                <li><a class="nav-item nav-link" href="../Servicio/servicioListado.php">SERVICIOS</a></li>

                <br>	<br>	

            </ul>
        </div>
        
        <div class="float col-xs-12 col-sm-6">
            <form action="CobranzaRegistro.php" method="post">
                <div class="form-group">
                    <label>SERVICIO(CLIENTE)</label>
                    <select class="form-control" name="nId_Servicio">
                        <?php 
                        for ($i = 0; $i < count($oServicioCobranza); $i++) {
                            echo '<option value='.$oServicioCobranza[$i]['Id_Servicio'].'>'.$oServicioCobranza[$i]['NombreCliente'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>MES A FACTURAR</label>
                    <select name="sMesPago" class="form-control">
                        <option value="ENERO">ENERO</option>
                        <option value="FEBRERO">FEBRERO</option>
                        <option value="MARZO">MARZO</option>
                        <option value="ABRIL">ABRIL</option>
                        <option value="MAYO">MAYO</option>
                        <option value="JUNIO">JUNIO</option>
                        <option value="JULIO">JULIO</option>
                        <option value="AGOSTO">AGOSTO</option>
                        <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                        <option value="OCTUBRE">OCTUBRE</option>
                        <option value="NOVIEMBRE">NOVIEMBRE</option>
                        <option value="DICIEMBRE">DICIEMBRE</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Año</label>
                    <select name="nAnoPago" class="form-control">
                        <option value="2017">2017</option>
                        <option value="2018" selected>2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>SERVICIO</label>                
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input name="nServicio" class="form-control" required/>
                    </div>
                </div>
                                    
                <div class="form-group">
                    <label>OTROS CARGOS</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input name="nOtrosCargos" class="form-control" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label>ESTADO DE PAGO</label>
                    <select name="sEstadoPago" class="form-control">
                        <option value="PAGADO">PAGADO</option>
                        <option value="VENCIDO"ue>VENCIDO</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="RegistrarCobranza" value="REGISTRAR COBRANZA">
                </div>
            </form>
        </div>
        
    </body>
</html>