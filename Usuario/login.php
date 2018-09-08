

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
  
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm"></div> 
            <div class="col-sm">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Inicio de sesión</div>
                    <div class="card-body">
                        <form action="Usuario/login.php" method="post">

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sUsuario" placeholder="Usuario" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="sContrasena" placeholder="Contraseña">
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
