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
      <?php
      if(isset($_REQUEST['correcto'])){
        echo '<h3 class="text-center">Su pedido se ha procesado correctamente</h3>';
        echo '<a class="btn btn-warning" href="/tienda/index.php">Volver a la tienda</a>';
      }else{
        if (isset($_REQUEST['formulario'])
          && isset($_SESSION['login']) && $_SESSION['login'] === true
          && isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
          if (isset($_SESSION['post'])){
            carritoFormulario($_SESSION['post']);
            unset($_SESSION['post']);
          }else{
            carritoFormulario(false);
          }

        }else if(isset($_REQUEST['pago'])){
          mostrarPago();
        }else{
          mostrarCarrito();
        }
      }

      ?>
    </div>
  </section>
</div>
</body>
</html>
