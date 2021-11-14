<?php
session_start();
unset($_SESSION['usuario'],$_SESSION['login'],$_SESSION['carrito']);
session_destroy();

header('Content-type: application/json');
$respuesta = ["error" => "0", "descripcion" => "No se ha podido limpiar la sesión"];
echo json_encode($respuesta);