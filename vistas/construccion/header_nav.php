<div class="d-flex justify-content-between">
  <h1>Práctica Cookies</h1>
  <?php
  $sesion = false;
  if (isset($_SESSION['login']) && $_SESSION['login'] == true){
    $sesion = true;
    echo '<a class="btn btn-warning">Mi Página <i class="fas fa-user"></i></a>';
  }else{
    echo '<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#iniciarSesion">Iniciar Sesión <i class="fas fa-key"></i></button>';
  }
  ?>
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
        <li class="nav-item">
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
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
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
          <form action="<?= $_SERVER['PHP_SELF'] ?>">
            <div>
              <label class="form-label" for="usuario">Usuario</label>
              <input class="form-control" type="text" id="usuario" name="usuario">
            </div>
            <div>
              <label class="form-label" for="passw">Contraseña</label>
              <input class="form-control" type="password" id="passw" name="passw">
            </div>
            <button class="btn btn-success mt-3 w-100">Entrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>

