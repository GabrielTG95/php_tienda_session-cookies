<?php
include 'funciones/getDatosJson.php';
function obtenerProducto()
{
    $datosArray = datosJson('content/data/articulos.json');
    if (isset($_COOKIE['favoritos'])) {
        $cookieFavoritos = explode(";", htmlspecialchars($_COOKIE['favoritos']));
    } else {
        $cookieFavoritos = [];
    }
    foreach ($datosArray as $articulo) {
        if (in_array($articulo['id'], $cookieFavoritos)) {
            $faheart = '<i data-id="' . $articulo['id'] . '" class="favorito fas fa-heart"></i>';
        } else {
            $faheart = '<i data-id="' . $articulo['id'] . '" class="favorito far fa-heart"></i>';
        }
        ?>
        <div class='articulo d-inline-block card'>
          <div class="card-header d-flex justify-content-between">
              <a href='controladores/articulo/articuloControlador.php?id=<?= $articulo['id'] ?>'><?= $articulo['nombre'] ?></a>
              <?= $faheart ?>
          </div>
          <div class="card-body">
            <img src='<?= $articulo['imagen'] ?>'>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <p class="precio">Precio:<br><?= $articulo['precio'] ?>€</p>
            <button class="btn btn-outline-success my-auto carrito" data-id="<?= $articulo['id'] ?>">Añadir <i class="fas fa-cart-plus"></i></button>
          </div>
        </div>
        <?php
    }
}
?>