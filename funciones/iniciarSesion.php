<?php
include 'getDatosJson.php';
if ((isset($_POST['usuario']) && !empty($_POST['usuario'])) && (isset($_POST['passw']) && !empty($_POST['passw']))){
  $usuario = $_POST['usuario'];
  $passw = $_POST['passw'];
  $usuArray = datosJson('../content/data/usuarios.json');
  function findUsu($array, $usu){
    foreach($array as $usuIndex => $info) {
      if($info['usuario'] == $usu){
        return $usuIndex;
      }
    }
    return false;
  }
  function checkPassw($array, $indice, $passw){
    if($array[$indice]['passw'] == $passw){
      return true;
    }
    return false;
  }
  $key = findUsu($usuArray, $usuario);
  if ($key !== false){
    if(checkPassw($usuArray, $key, $passw)){
      session_start();
      $_SESSION['usuario'] = $usuario;
      $_SESSION['login'] = true;
      header("Location: /tienda/index.php");
    }else{
      header("Location: /tienda/controladores/usuario/inicioSesionControlador.php?error");
    }
  }else{
    header("Location: /tienda/controladores/usuario/inicioSesionControlador.php?error");
  }
}else{
  header("Location: /tienda/index.php");
}