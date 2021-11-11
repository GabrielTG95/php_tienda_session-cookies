<!doctype html>
<html lang="es">
<head>
  <?php include 'construccion/head.php'; ?>
  <!--CSS Interno-->
  <script src="/tienda/content/js/favoritos.js"></script>
  <title>Tienda</title>
</head>
<body>
<div class="container my-4">
  <header>
    <?php include 'construccion/header_nav.php'; ?>
  </header>
  <section>
    <div class="d-flex justify-content-between flex-wrap">
      <?php
      obtenerProducto();
      ?>
    </div>
  </section>
</div>
</body>
</html>
