

<?php
session_start();
if (isset($_POST['sesion'])) {
    
    $sUsuario = $_POST['sUsuario'];
    $sContrasena = md5($_POST['sContrasena']);

    require_once ('cUsuarioController.php');
    $oUsuarioController = new cUsuarioController;
    $oIniciaSesion = $oUsuarioController->iniciarSesion($sUsuario, $sContrasena);
    header("Location: ../index.php");
    die();
} else if (!isset($_SESSION['usuario'])){
    ?>
  <br><br><br>
  <div class="row">
    <div class="col-md-6"> 
    <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Acceso a SIAWIIVER</h4>
    <hr>
    <p class="mb-0"></p></div></div>
  <br><br>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm"></div> 
            <div class="col-sm">
                <div class="card border-success mb-3" style="max-width: 30rem;">
                    <div class="card-header">Inicio de sesión</div>
                    <div class="card-body">
                        <form action="Usuario/login.php" method="post">



                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input name="sUsuario" placeholder="Usuario" class="form-control" required/>
                            </div>
                        </div>

  
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="sContrasena" placeholder="Contraseña" required/>
                                </div>
                        </div>
                        

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="sesion" class="btn btn-primary">Iniciar sesión</button>
                                </div>
                        </div>

                        
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm"></div>      
        </div>
    </div>  
    <?php
}

if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 'ADMINISTRADOR') {
    ?>
    <!-- SESION ADMINISTRADOR -->
    <div class="container-fluid">
        <ul class="nav nav-tabs nav-justified ">
            <li><a  class="nav-item nav-link active" href="index.php">INICIO</a> </li>
            <li><a  class="nav-item nav-link" href="Cliente/ClienteListado.php">CLIENTES</a> </li>
            <li><a  class="nav-item nav-link" href="Empleado/EmpleadoListado.php">EMPLEADOS</a> </li>
            <li><a  class="nav-item nav-link" href="Producto/ProductoListado.php">PRODUCTOS</a> </li>
            <li><a  class="nav-item nav-link" href="Provedor/ProvedorListado.php">PROVEDORES</a> </li>
            <li><a  class="nav-item nav-link" href="PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a> </li>
            <li><a  class="nav-item nav-link" href="Usuario/UsuarioListado.php">USUARIOS</a> </li>
            <li><a  class="nav-item nav-link" href="Servicio/ServicioListado.php">SERVICIOS</a> </li>
            <li><a  class="nav-item nav-link" href="Cobranza/CobranzaListado.php">COBRANZA</a> </li>
            <li><a  class="nav-item nav-link" href="Usuario/cerrarSesion.php">CERRAR SESION</a> </li>
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

    <div class="container">
        <div class="row">
        <div class="col-md-3"> 
        <h4><p class="p-3 mb-2 bg-success text-white text-center">Misión</p></h4>
                    <p class="  text-justify">  Somos una empresa que otorga asesoría tecnológica en telecomunicaciones, brindando servicios de forma integral, responsable y competitiva, garantizando la calidad en nuestros servicios.</p>
        
        <h4><p class="p-3 mb-2 bg-success text-white text-center">Visión</p></h4>
                    <p class="text-justify text-dark">Seremos para el año 2025 una de las empresas más reconocidas en el estado de Veracruz ampliando los servicios a toda la república en el área de telecomunicaciones brindando servicios de calidad con el más capacitado personal humano y recursos tecnológicos de vanguardia.</p>
    </div>
        <div class="col-md-6">
        <h4><p class="p-3 mb-2 bg-dark text-white text-center">Historia</p></h4>
                    <p class="  text-justify">  WIIVER es una empresa 100% mexicana, creada con el objetivo de brindar servicios en el área de telecomunicaciones, brindar asesoría tecnológica y enlaces dedicados a empresas privadas de la zona centro del estado de Veracruz. 
Empresa en crecimiento creada en el año 2000, ha tenido el compromiso de brindar acceso a internet mediante redes de telecomunicaciones inalámbricas otorgando a poblaciones la oportunidad de tener acceso a comunicación de calidad a precios accesibles. Nace como parte de las necesidades de comunidades alejadas de las ciudades y que por consecuencia no tienen acceso a servicios de telecomunicaciones así como empresas privadas en asesoramiento tecnológico de comunicaciones. </p>

    </div>
        <div class="col-md-3">
        <h4><p class="p-3 mb-2 bg-success text-white text-center">Politica de calidad</p></h4>
                    <p class="  text-justify">  WIIVER es una empresa dedicada a las instalaciones y mantenimiento de equipos y redes de telecomunicaciones. En el desarrollo de su actividad es muy importante ampliar y perfeccionar los procedimientos en sus servicios para conseguir la mayor satisfacción por parte de nuestros clientes.</p>
    
    </div>



       
<?php } elseif (isset($_SESSION['usuario']) && $_SESSION['rol'] == 'COBRANZA') {
    ?>
    <!-- SESION COBRANZA -->
    <div class="container-fluid">
        <ul class="nav nav-tabs nav-justified ">
            <li><a  class="nav-item nav-link active" href="index.php">INICIO</a> </li>
            <li><a  class="nav-item nav-link" href="Cliente/ClienteListado.php">CLIENTES</a> </li>
            <li><a  class="nav-item nav-link" href="Empleado/EmpleadoListado.php">EMPLEADOS</a> </li>
            <li><a  class="nav-item nav-link" href="Servicio/ServicioListado.php">SERVICIOS</a> </li>
            <li><a  class="nav-item nav-link" href="Cobranza/CobranzaListado.php">COBRANZA</a> </li>
            <li><a  class="nav-item nav-link" href="Usuario/cerrarSesion.php">CERRAR SESION</a> </li>
        </ul>
        
        <div class="alert alert-primary" role="alert">
            <?php echo 'USUARIO: '.$_SESSION['usuario'].'<br> ROL: '.$_SESSION['rol'];?>    
        </div>
    </div>
        
    <?php
} elseif (isset($_SESSION['usuario']) && $_SESSION['rol'] == 'TECNICO') {
    echo $_SESSION['rol'];
    ?>
    <!-- SESION TECNICO -->
    <div class="container-fluid">
        <ul class="nav nav-tabs nav-justified ">
            <li><a  class="nav-item nav-link active" href="index.php">INICIO</a> </li>
            <li><a  class="nav-item nav-link" href="Cliente/ClienteListado.php">CLIENTES</a> </li>
            <li><a  class="nav-item nav-link" href="Producto/ProductoListado.php">PRODUCTOS</a> </li>
            <li><a  class="nav-item nav-link" href="Provedor/ProvedorListado.php">PROVEDORES</a> </li>
            <li><a  class="nav-item nav-link" href="PuntoAcceso/PuntoAccesoListado.php">PUNTOS DE ACCESO</a> </li>
            <li><a  class="nav-item nav-link" href="Servicio/ServicioListado.php">SERVICIOS</a> </li>
            <li><a  class="nav-item nav-link" href="Usuario/cerrarSesion.php">CERRAR SESION</a> </li>
        </ul>
        
        <div class="alert alert-primary" role="alert">
            <?php echo 'USUARIO: '.$_SESSION['usuario'].'<br> ROL: '.$_SESSION['rol'];?>    
        </div>
    </div>
        
    <?php
}
