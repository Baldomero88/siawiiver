

<?php
session_start();
if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'COBRANZA') {

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
            <ul class="nav nav-tabs nav-justified">
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
                <li><a class="nav-item nav-link" href="../Usuario/cerrarSesion.php">CERRAR SESION</a> </li>
        
    </ul>
   <br> <br>
   
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
            <form action="CobranzaRegistro.php" method="post">
              <div class="container">
        <div class="row">
        <div class="col-md-3"> 
        <h4><p class="p-3 mb-2 bg-info text-white text-center">Misión</p></h4>
                    <p class="  text-justify">  Somos una empresa que otorga asesoría tecnológica en telecomunicaciones, brindando servicios de forma integral, responsable y competitiva, garantizando la calidad en nuestros servicios.</p>
        
        <h4><p class="p-3 mb-2 bg-info text-white text-center">Visión</p></h4>
                    <p class="text-justify text-dark">Seremos para el año 2025 una de las empresas más reconocidas en el estado de Veracruz ampliando los servicios a toda la república en el área de telecomunicaciones brindando servicios de calidad con el más capacitado personal humano y recursos tecnológicos de vanguardia.</p>
    </div>


<!--determina el espacio que ocupara el formulario en el centro-->
    <div class="col-md-6">
    <h5><p class="p-3 mb-2 bg-dark text-white text-center">Ingresa los datos del Pago</p>
    <br><br>    

                    <label>SERVICIO(CLIENTE)</label>
                    <select class="form-control" name="nId_Servicio">
                        <?php 
                        for ($i = 0; $i < count($oServicioCobranza); $i++) {
                            echo '<option value='.$oServicioCobranza[$i]['Id_Servicio'].'>'.$oServicioCobranza[$i]['NombreCliente'].'</option>';
                        }
                        ?>
                    </select>
                

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
                        <option value="VENCIDO">VENCIDO</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="RegistrarCobranza" value="REGISTRAR COBRANZA">
                </div>
            </div>


    <!--determina el espacio de la columna de la izquierda-->
    <div class="col-md-3">
    <img src="../img/wiiver.jpeg" class="rounded mx-auto float-right w-100"  >
    <br><br><br><br><br><br><br><br>        

    <!--    <h4><p class="p-3 mb-2 bg-secondary text-white text-center">Misión</p></h4>
    <p class="  text-justify">  Somos una empresa otorga asesoría tecnológica en telecomunicaciones, brindando servicios de forma integral, responsable y competitiva, garantizando la calidad en nuestros servicios.</p>
        
            <h4><p class="p-3 mb-2 bg-success text-white text-center">Visión</p></h4>
    <p class="text-justify text-dark">Seremos para el año 2025 una de las empresas más reconocidas en el estado de Veracruz ampliando los servicios a toda la república en el área de telecomunicaciones brindando servicios de calidad con el más capacitado personal humano y recursos tecnológicos de vanguardia.</p>-->

    
</div>
</div>
</div>

        <br> <br>   <br>
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