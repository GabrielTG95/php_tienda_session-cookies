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
        <div class='articulo d-inline-block'>
            <p>
                <a href='controladores/articulo/articuloControlador.php?id=<?= $articulo['id'] ?>'><?= $articulo['nombre'] ?></a>
                <?= $faheart ?>
            </p>
            <img src='<?= $articulo['imagen'] ?>'>
        </div>
        <?php
    }
}
?>