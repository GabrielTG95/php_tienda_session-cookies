<?php
session_start();
if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0){
  if(isset($_SESSION['carrito'][$_REQUEST['producto']])){
    $_SESSION['carrito'][$_REQUEST['producto']] += 1;
  }else{
    $_SESSION['carrito'][$_REQUEST['producto']] = 1;
  }
}else{
  $_SESSION['carrito'] = [$_REQUEST['id'] => 1];
}

header('Content-type: application/json');
$respuesta = ["error" => "0", "descripcion" => "No se ha podido añadir el producto"];