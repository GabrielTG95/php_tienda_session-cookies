<?php
include 'getDatosJson.php';
/*
echo '<pre>';
var_dump($_POST);
echo '</pre><br>';
*/
session_start();
$_SESSION['post'] = $_POST;
$resultado = [];

// nombre       --> R '/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/'
$nombre = false;
if(isset($_POST['nombre']) && $_POST['nombre'] !== "") {
  $nombre = (preg_match('/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/', $_POST['nombre']) === 1) ? true : false;
}
$resultado['nombre'] = $nombre;

// apellido1    --> R '/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/'
$apellido1 = false;
if(isset($_POST['apellido1']) && $_POST['apellido1'] !== "") {
  $apellido1 = (preg_match('/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/', $_POST['apellido1']) === 1) ? true : false;
}
$resultado['apellido1'] = $apellido1;

// apellido2    --> '/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/'
if(isset($_POST['apellido2']) && $_POST['apellido2'] !== "") {
  $apellido2 = (preg_match('/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/', $_POST['apellido2']) === 1) ? true : false;
  $resultado['apellido2'] = $apellido2;
}

// telefono     --> R '/^[0-9]{9}$/'
$telefono = false;
if(isset($_POST['telefono']) && $_POST['telefono'] !== "") {
  $telefono = (preg_match('/^[0-9]{9}$/', $_POST['telefono']) === 1) ? true : false;
}
$resultado['telefono'] = $telefono;

// telefonoAlt  --> '/^[0-9]{9}$/'
if(isset($_POST['telefonoAlt']) && $_POST['telefonoAlt'] !== "") {
  $telefonoAlt = (preg_match('/^[0-9]{9}$/', $_POST['telefonoAlt']) === 1) ? true : false;
  $resultado['telefonoAlt'] = $telefonoAlt;
}

// email        --> R '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/'
$email = false;
if(isset($_POST['email']) && $_POST['email'] !== "") {
  $email = (preg_match('/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/', $_POST['email']) === 1) ? true : false;
}
$resultado['email'] = $email;

// pais         --> R
$existePais = false;
if(isset($_POST['pais']) && $_POST['pais'] !== "") {
  $paises = datosJson('../content/data/paises.json');
  foreach ($paises as $pais) {
    if($pais['name_es'] === $_POST['pais']){
      $existePais = true;
    }
  }
}
$resultado['pais'] = $existePais;

// provincia    --> R
$existeProvincia = false;
if(isset($_POST['provincia']) && $_POST['provincia'] !== "") {
  $provincias = datosJson('../content/data/provincias.json');
  foreach ($provincias as $provincia) {
    if($provincia['nombre'] === $_POST['provincia']){
      $existeProvincia = true;
    }
  }
  $autonomias = datosJson('../content/data/autonomias.json');
  foreach ($autonomias as $autonomia) {
    if($autonomia['nombre'] === $_POST['provincia']){
      $existeProvincia = true;
    }
  }
}
$resultado['provincia'] = $existeProvincia;

// isla         -->
if(isset($_POST['isla'])){
  $existeIsla = false;
  if($_POST['isla'] !== "") {
    $islas = datosJson('../content/data/islas.json');
    foreach ($islas as $isla) {
      if($isla['nombre'] === $_POST['isla']){
        $existeIsla = true;
      }
    }
  }
  $resultado['isla'] = $existeIsla;
}

// municipio    --> R
$existeMunicipio = false;
if(isset($_POST['municipio']) && $_POST['municipio'] !== "") {
  $municipios = datosJson('../content/data/municipios.json');
  foreach ($municipios as $municipio) {
    if($municipio['nombre'] === $_POST['municipio']){
      $existeMunicipio = true;
    }
  }
  $municipiosIslas = datosJson('../content/data/municipios_islas.json');
  foreach ($municipiosIslas as $municipioIsla) {
    if($municipioIsla['nombre'] === $_POST['municipio']){
      $existeMunicipio = true;
    }
  }
}
$resultado['municipio'] = $existeMunicipio;

// localidad    --> R '/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/'
$localidad = false;
if(isset($_POST['localidad']) && $_POST['localidad'] !== "") {
  $localidad = (preg_match('/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/', $_POST['localidad']) === 1) ? true : false;
}
$resultado['localidad'] = $localidad;

// via          --> R '/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/'
$via = false;
if(isset($_POST['via']) && $_POST['via'] !== "") {
  $via = (preg_match('/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/', $_POST['via']) === 1) ? true : false;
}
$resultado['via'] = $via;

// direccion    --> R '/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/'
$direccion = false;
if(isset($_POST['direccion']) && $_POST['direccion'] !== "") {
  $direccion = (preg_match('/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/', $_POST['direccion']) === 1) ? true : false;
}
$resultado['direccion'] = $direccion;

// portal       --> '/^([a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/'
if(isset($_POST['portal'])&& $_POST['portal'] !== "" ) {
  $portal = (preg_match('/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/', $_POST['portal']) === 1) ? true : false;
  $resultado['portal'] = $portal;
}

// numero       --> '/^[0-9]+$/'
if(isset($_POST['numero']) && $_POST['numero'] !== "") {
  $numero = (preg_match('/^[0-9]+$/', $_POST['numero']) === 1) ? true : false;
  $resultado['numero'] = $numero;
}

// piso         --> '/^[0-9a-zA-Z]+$/'
if(isset($_POST['piso']) && $_POST['piso'] !== "") {
  $piso = (preg_match('/^[0-9a-zA-Z]+$/', $_POST['piso']) === 1) ? true : false;
  $resultado['piso'] = $piso;
}

// puerta       --> '/^[0-9a-zA-Z]+$/'
if(isset($_POST['puerta']) && $_POST['puerta'] !== "") {
  $puerta = (preg_match('/^[0-9a-zA-Z]+$/', $_POST['puerta']) === 1) ? true : false;
  $resultado['puerta'] = $puerta;
}

// cPostal      --> R '/^[0-9]{5}$/'
$existePostal = false;
if(isset($_POST['cPostal']) && $_POST['cPostal'] !== "") {
  $postales = datosJson('../content/data/codigos-postales.json');
  foreach ($postales as $postal) {
    if($postal['codigo_postal'] == $_POST['cPostal']){
      $existePostal = true;
    }
  }
}
$resultado['cPostal'] = $existePostal;

// politica     --> R checkbox
$politica = false;
if (isset($_POST['politica'])){
  $politica = ($_POST['politica'] === 'on') ? true : false;
}
$resultado['politica'] = $politica;

// publicidad   --> checkbox
if(isset($_POST['publicidad'])) {
  $publicidad = false;
  $publicidad = ($_POST['publicidad'] === 'on') ? true : false;
  $resultado['publicidad'] = $publicidad;
}

/*echo '<pre>';
var_dump($resultado);
echo '</pre><br>';*/

$todoCorrecto = true;

foreach ($resultado as $campo => $result){
  /*if ($result === true){
    $resul = 'true';
  }else{
    $resul = 'false';
  }
  echo 'Campo: '.$campo.', Resultado: '.$resul.'<br>';*/
  if($result === false){
    $todoCorrecto = false;
  }
}/*
if ($todoCorrecto === true){
  echo 'Todo bien';
}else{
  echo 'Hay algún error';
}*/
//var_dump($todoCorrecto);
if ($todoCorrecto === true){
  header('Location: ../controladores/carrito/carritoControlador.php?correcto');
}else{
  header('Location: ../controladores/carrito/carritoControlador.php?formulario');
}