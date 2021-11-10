<?php
setcookie("politicaCookie", date('m/d/Y h:i:s a', time()), time() + 1000, '/');

header('Content-type: application/json');
$respuesta = ["error" => "0", "descripcion" => "error de servidor"];

echo json_encode($respuesta);