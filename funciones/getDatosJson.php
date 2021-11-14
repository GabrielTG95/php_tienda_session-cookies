<?php
function datosJson(String $url): array{
    $datosJSON = file_get_contents($url);
    $datosArray = json_decode($datosJSON, true);
    return $datosArray;
}
function datosArticulo(array $arrayArticulos,String $key, String $dato): array{
  foreach($arrayArticulos as $articulo => $datos){
    if($datos[$key] == $dato){
      return $datos;
    }
  }
  return false;
}