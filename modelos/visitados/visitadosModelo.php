<?php
function getVisitados(){
    $datosJSON = file_get_contents('../../content/data/articulo.json');
    $datosArray = json_decode($datosJSON, true);
    if (isset($_COOKIE['visitas'])){
        if (isset($_COOKIE['favoritos'])) {
            $cookieFavoritos = explode(";", htmlspecialchars($_COOKIE['favoritos']));
        } else {
            $cookieFavoritos = [];
        }
        foreach (json_decode($_COOKIE['visitas']) as $idVisita => $infoVisita) {
            foreach ($datosArray as $articulo) {
                if ($idVisita == $articulo['id']) {
                    echo "<div class='d-inline-block mx-2'><p class='my-1'>" . $articulo['nombre'] . "</p>";
                    echo "<p class='my-1'>Veces visitado: " . $infoVisita . "</p>";
                    echo "<img src='" . $articulo['imagen'] . "'></div>";
                }
            }
        }
    }
}