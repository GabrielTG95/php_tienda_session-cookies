<?php
  $cookie = $_COOKIE['favoritos'] ?? "";
  if($cookie != ""){
    // Transforma esto --> "id1;id2;id3;" --> en un array.
    $arrayIds = explode(";",$cookie);
  }else{
    $arrayIds = [];
  }
  $id = $_REQUEST['id'] ?? null;
  if(!in_array($id,$arrayIds) && $id != null){
    array_push($arrayIds, $id);
  }else{
    $key = array_search($id,$arrayIds);
    unset($arrayIds[$key]);
  }
  sort($arrayIds, SORT_STRING);
  $idesString = implode(";",$arrayIds);
  setcookie("favoritos",$idesString,time() + 1000, '/');

  header('Content-type: application/json');
  $respuesta = ["error" => "0", "descripcion" => "error de servidor"];

  echo json_encode($respuesta);