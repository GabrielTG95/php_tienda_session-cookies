<?php
  $cookie = $_COOKIE['visitas'] ?? "";
  if($cookie != ""){
    // Transforma esto --> "id1;id2;id3;" --> en un array.
    $arrayIds = json_decode($_COOKIE['visitas'],true);
  }else{
    $arrayIds = [];
  }
  $id = $_REQUEST['id'] ?? null;
  if(isset($arrayIds[$id]) && $id != null){
    $arrayIds[$id] += 1;
  }else{
    $arrayIds[$id] = 1;
  }
  $idesString = json_encode($arrayIds);
  setcookie("visitas",$idesString,time() + 1000, '/');

  header('Content-type: application/json');
  $respuesta = ["error" => "0", "descripcion" => "error de servidor"];

  echo json_encode($respuesta);