<!doctype html>
<html lang="es">
<head>
  <?php include 'vistas/construccion/head.php'; ?>
  <!--Script Interno-->
  <script src="/tienda/content/js/favoritos.js"></script>
  <script src="/tienda/content/js/carritoMeter.js"></script>
  <title>Tienda</title>
</head>
<body>
<div class="container py-2 bg-light">
  <header>
    <?php include 'vistas/construccion/header_nav.php'; ?>
  </header>
  <section>
    <div class="d-flex justify-content-between flex-wrap">
      <?php obtenerProducto(); ?>
    </div>
    <iframe src="/tienda/vistas/favoritos.php" class="my-4" id="frameFavoritos"></iframe>
    <iframe src="/tienda/vistas/visitados.php"></iframe>
  </section>
</div>
</body>
</html>
