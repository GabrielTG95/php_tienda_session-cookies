<div class="d-flex justify-content-between bg-light">
  <h1 class="ps-3">Práctica Cookies</h1>

</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light fs-5">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/tienda/index.php">Inicio</a>
        </li>
        <li class="nav-item nav-link cursor-manita" id="limpiarSesion">Limpiar Sesion</li>
        <!--<li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>-->
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/tienda/controladores/carrito/carritoControlador.php">Carrito <i class="fas fa-shopping-cart"></i></a>
        </li>
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login'] === true){
        $sesion = true;
      ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['usuario'] ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
              <li><a class="dropdown-item" href="#">Favoritos</a></li>
              <li><a class="dropdown-item" href="#">Configuración</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/tienda/funciones/cerrarSesion.php">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
          </li>
      <?php
      }else{
      ?>
          <li class="nav-item nav-link cursor-manita"data-bs-toggle="modal" data-bs-target="#iniciarSesion">
            Iniciar Sesión <i class="fas fa-key"></i>
          </li>
      <?php
      }
      ?>
      </ul>
    </div>
  </div>
</nav>

<?php
$sesion = false;
if (!isset($_SESSION['login']) || $_SESSION['login'] != true){
?>
  <div class="modal fade" id="iniciarSesion" tabindex="-1" aria-labelledby="iniciarSesion" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inicio de sesión</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/tienda/funciones/iniciarSesion.php" method="POST">
            <div>
              <label class="form-label" for="usuario">Usuario</label>
              <input class="form-control" type="text" id="usuario" name="usuario" value="usucli01" required>
            </div>
            <div>
              <label class="form-label" for="passw">Contraseña</label>
              <input class="form-control" type="password" id="passw" name="passw" value="usucli01pas" required>
            </div>
            <button type="submit" class="btn btn-success mt-3 w-100" id="btnSesion">Entrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>

