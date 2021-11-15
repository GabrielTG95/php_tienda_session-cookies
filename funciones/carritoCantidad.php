<?php
session_start();
switch ($_REQUEST['accion']){
  case 'restar':
    if ($_SESSION['carrito'][$_REQUEST['id']] > 1){
      $_SESSION['carrito'][$_REQUEST['id']] -= 1;
    }
    break;
  case 'sumar':
    $_SESSION['carrito'][$_REQUEST['id']] += 1;
    break;
  default:
    break;
}

header('Content-type: application/json');
$respuesta = ["error" => "0", "descripcion" => "no ha podido borrarse el artículo", "cantidad" => $_SESSION['carrito'][$_REQUEST['id']]];

echo json_encode($respuesta);