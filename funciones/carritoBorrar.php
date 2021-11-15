<?php
session_start();
unset($_SESSION['carrito'][$_REQUEST['id']]);

header('Content-type: application/json');
$respuesta = ["error" => "0", "descripcion" => "no ha podido borrarse el artículo"];

echo json_encode($respuesta);