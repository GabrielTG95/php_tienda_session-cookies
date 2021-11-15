<?php
session_start();
include 'getDatosJson.php';
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

$articulos = datosJson('../content/data/articulos.json');
$articulo = datosArticulo($articulos, 'id', $_REQUEST['id']);
$precio = round($articulo['precio'] * $_SESSION['carrito'][$_REQUEST['id']], 2);

header('Content-type: application/json');
$respuesta = [
    "error" => "0",
    "descripcion" => "no ha podido borrarse el artículo",
    "cantidad" => $_SESSION['carrito'][$_REQUEST['id']],
    "precio" => $precio
  ];

echo json_encode($respuesta);