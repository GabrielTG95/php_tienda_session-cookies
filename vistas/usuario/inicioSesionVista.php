<?php
if (isset($_SESSION['login']) && $_SESSION['login'] === true){
  header("Location: /tienda/index.php");
}
?>
<!doctype html>
<html lang="es">
<head>
  <?php include '../../vistas/construccion/head.php'; ?>
  <!--Script Interno-->
  <script src="../content/js/favoritos.js"></script>
  <title>Iniciar Sesion</title>
</head>
<body>
<div class="container my-4">
  <header>
    <?php include '../../vistas/construccion/header_nav.php'; ?>
  </header>
  <section>
    <h2 class="text-center">Iniciar Sesion</h2>
    <div class="w-75 mx-auto">
      <?php
      if(isset($_REQUEST['error'])) {
        echo '<p class="text-center fw-bold text-danger">Usuarios y/o contraseña incorrectos</p>';
      }
      ?>
      <form action="/tienda/funciones/iniciarSesion.php" method="POST">
        <div>
          <label class="form-label" for="usuario">Usuario</label>
          <input class="form-control" type="text" id="usuario" name="usuario" required>
        </div>
        <div>
          <label class="form-label" for="passw">Contraseña</label>
          <input class="form-control" type="password" id="passw" name="passw" required>
        </div>
        <button type="submit" class="btn btn-success mt-3 w-100" id="btnSesion">Entrar</button>
      </form>
    </div>
  </section>
</div>
</body>
</html>
