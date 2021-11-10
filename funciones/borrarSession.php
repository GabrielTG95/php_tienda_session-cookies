<?php
unset($_SESSION['usuairio']);
destroy_session();

$respuesta = ["error" => "0", "descripcion" => "Ha habido un problema al cerrar sesion."];