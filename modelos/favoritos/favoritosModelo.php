<?php
function getFavoritos(){
    $datosJSON = file_get_contents('../../content/data/articulo.json');
    $datosArray = json_decode($datosJSON, true);
    if (isset($_COOKIE['favoritos'])){
        $cuki = explode(";",htmlspecialchars($_COOKIE['favoritos']));
    }else{
        $cuki = [];
    }
    foreach ($datosArray as $articulo) {
        if (in_array($articulo['id'], $cuki)){
            echo "<div class='d-inline-block mx-2'><p>" . $articulo['nombre']."</p>";
            echo "<img src='".$articulo['imagen']."'></div>";
        }
    }
}