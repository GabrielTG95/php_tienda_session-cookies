<!doctype html>
<html lang="es">
<head>
  <?php include '../../vistas/construccion/head.php'; ?>
  <!--Script Interno-->
  <script src="/tienda/content/js/favoritos.js"></script>
  <script src="/tienda/content/js/carritoBorrar.js"></script>
  <script src="/tienda/content/js/carritoCantidad.js"></script>
  <title>Tienda</title>
</head>
<body>
<div class="container py-2 bg-light">
  <header>
    <?php include '../../vistas/construccion/header_nav.php'; ?>
  </header>
  <section>
    <h2 class="text-center">Carrito</h2>
    <div>
      <?= mostrarCarrito() ?>
    </div>
  </section>
</div>
</body>
</html>
