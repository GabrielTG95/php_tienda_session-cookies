<!doctype html>
<html lang="es">
<head>
  <?php include '../../vistas/construccion/head.php'; ?>
  <!--Script Interno-->
  <script src="/tienda/content/js/favoritos.js"></script>
  <script src="/tienda/content/js/carritoMeter.js"></script>
  <script>
    $(document).ready(function(){
      $url = '/tienda/funciones/setvisitas.php?id=' + '<?= $_REQUEST['id'] ?>';
      $.get($url, function(data){
        if (data.error != 0) {
          alert("Ha habido un error al registrar la visita");
        }
      });
    });
  </script>
  <title>Tienda</title>
</head>
<body>
<div class="container py-2 bg-light">
  <header>
    <?php include '../../vistas/construccion/header_nav.php'; ?>
    </header>
    <section>
        <div class="d-flex justify-content-between flex-wrap">
            <h2 class="ps-5"><?= getArtInfo()['nombre'] ?> <?= mostrarFavorito() ?></h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 text-center">
                    <img src="<?= getArtInfo()['imagen'] ?>" alt="Imagen del artículo">
                </div>
                <div class="col-lg-9 col-md-8" id="descripcion">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat justo et eros rutrum
                        laoreet.
                        Praesent tristique nisi a ligula mollis rutrum. Sed eleifend lacus elit, sed lacinia est
                        volutpat vel.
                        Donec at felis quis justo tristique fringilla et vitae tortor. Donec feugiat tempor varius.
                        Praesent
                        maximus id metus ac malesuada. Donec sed felis at dui laoreet viverra non sed arcu. Sed semper
                        tortor sit
                        amet justo lacinia, in gravida nisi vulputate. Morbi fermentum velit est, eget pretium quam
                        malesuada vel.
                        Aenean vehicula dui justo, lacinia posuere nulla pellentesque at. Proin posuere ornare aliquam.
                    </p>
                    <p>
                        Suspendisse fermentum elit nisl, sit amet pretium felis hendrerit eget. Aenean ut risus mauris.
                        Donec sit
                        amet ipsum a erat feugiat commodo pellentesque id leo. Curabitur non lobortis ex, sed elementum
                        nunc. Ut
                        id iaculis enim, in pretium ex. Duis egestas malesuada finibus. Curabitur lobortis vestibulum
                        lacus. Donec
                        vestibulum facilisis facilisis. Sed sapien enim, faucibus molestie finibus ac, tincidunt ut
                        nisl. Vivamus
                        venenatis gravida ante, ut faucibus velit. Curabitur vitae felis magna. Morbi vitae est enim.
                        Cras at odio
                        quis tortor tempor dapibus vel nec nibh.
                    </p>
                </div>
              <button class="btn btn-outline-success w-25 mx-auto carrito" data-id="<?= getArtInfo()['id'] ?>">Añadir <i class="fas fa-cart-plus"></i></button>
            </div>
        </div>
    </section>
</div>
</body>
</html>