<?php
include '../../funciones/getDatosJson.php';

function getArtInfo(): array{
  $datosArray = datosJson('../../content/data/articulos.json');
  $flag = false;
  $posicion = 0;
  $key = 0;
  while($flag == false && $posicion < count($datosArray)){
    if ($datosArray[$posicion]['id'] == $_REQUEST['id']){
      $flag = true;
      $key = $posicion;
    }
    $posicion++;
  }
  $articulo = $datosArray[$key];
  return $articulo;
}
function esFavorito(): bool{
  if (isset($_COOKIE['favoritos'])){
    $cookie = explode(";",htmlspecialchars($_COOKIE['favoritos']));
    return in_array(getArtInfo()['id'], $cookie);
  }
  return false;
}
function mostrarFavorito(){
  $articulo = getArtInfo();
  if (esFavorito()){
    echo '<i data-id="'.$articulo['id'].'" class="favorito fas fa-heart"></i>';
  }else{
    echo'<i data-id="'.$articulo['id'].'" class="favorito far fa-heart"></i>';
  }
}