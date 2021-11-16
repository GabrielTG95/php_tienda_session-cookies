<?php
include 'getDatosJson.php';
echo '<pre>';
var_dump($_POST);
echo '</pre><br>';

$resultado = [];

// nombre       --> R '/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/'
if($_POST['nombre'] !== "") {
  $nombre = (preg_match('/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/', $_POST['nombre']) === 1) ? true : false;
}
$resultado['nombre'] = $nombre;

// apellido1    --> R '/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/'
if($_POST['apellido1'] !== "") {
  $apellido1 = (preg_match('/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/', $_POST['apellido1']) === 1) ? true : false;
}
$resultado['apellido1'] = $apellido1;

// apellido2    --> '/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/'
if($_POST['apellido2'] !== "") {
  $apellido2 = (preg_match('/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/', $_POST['apellido2']) === 1) ? true : false;
}else{
  $apellido2 = false;
}
$resultado['apellido2'] = $apellido2;

// telefono     --> R '/^[0-9]{9}$/'
if($_POST['telefono'] !== "") {
  $telefono = (preg_match('/^[0-9]{9}$/', $_POST['telefono']) === 1) ? true : false;
}
$resultado['telefono'] = $telefono;

// telefonoAlt  --> '/^[0-9]{9}$/'
if($_POST['telefonoAlt'] !== "") {
  $telefonoAlt = (preg_match('/^[0-9]{9}$/', $_POST['telefonoAlt']) === 1) ? true : false;
}else{
  $telefonoAlt = false;
}
$resultado['telefonoAlt'] = $telefonoAlt;

// email        --> R '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/'
if($_POST['email'] !== "") {
  $email = (preg_match('/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/', $_POST['email']) === 1) ? true : false;
}
$resultado['email'] = $email;

// pais         --> R
$existePais = false;
if($_POST['pais'] !== "") {
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
if($_POST['provincia'] !== "") {
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
if($_POST['municipio'] !== "") {
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
if($_POST['localidad'] !== "") {
  $localidad = (preg_match('/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/', $_POST['localidad']) === 1) ? true : false;
}
$resultado['localidad'] = $localidad;

// via          --> R '/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/'
if($_POST['via'] !== "") {
  $via = (preg_match('/^[a-zA-ZÀ-ÿ\x00f1\x00d1]+$/', $_POST['via']) === 1) ? true : false;
}
$resultado['via'] = $via;

// direccion    --> R '/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/'
if($_POST['direccion'] !== "") {
  $direccion = (preg_match('/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/', $_POST['direccion']) === 1) ? true : false;
}
$resultado['direccion'] = $direccion;

// portal       --> '/^([a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/'
if($_POST['portal'] !== "") {
  $portal = (preg_match('/^([0-9a-zA-ZÀ-ÿ\x00f1\x00d1]+\s*)+/', $_POST['portal']) === 1) ? true : false;
}else{
  $portal = false;
}
$resultado['portal'] = $portal;

// numero       --> '/^[0-9]+$/'
if($_POST['numero'] !== "") {
  $numero = (preg_match('/^[0-9]+$/', $_POST['numero']) === 1) ? true : false;
}else{
  $numero = false;
}
$resultado['numero'] = $numero;

// piso         --> '/^[0-9a-zA-Z]+$/'
if($_POST['piso'] !== "") {
  $piso = (preg_match('/^[0-9a-zA-Z]+$/', $_POST['piso']) === 1) ? true : false;
}else{
  $piso = false;
}
$resultado['piso'] = $piso;

// puerta       --> '/^[0-9a-zA-Z]+$/'
if($_POST['puerta'] !== "") {
  $puerta = (preg_match('/^[0-9a-zA-Z]+$/', $_POST['puerta']) === 1) ? true : false;
}else{
  $puerta = false;
}
$resultado['puerta'] = $puerta;

// cPostal      --> R '/^[0-9]{5}$/'
$existePostal = false;
if($_POST['cPostal'] !== "") {
  $postales = datosJson('../content/data/codigos-postales.json');
  foreach ($postales as $postal) {
    if($postal['codigo_postal'] === $_POST['cPostal']){
      $existePostal = true;
    }
  }
}
$resultado['cPostal'] = $existePostal;

// politica     --> R checkbox
if (isset($_POST['politica'])){
  $politica = ($_POST['politica'] === 'on') ? true : false;
}else{
  $politica = false;
}

$resultado['politica'] = $politica;

// publicidad   --> checkbox
if(isset($_POST['publicidad'])) {
  $publicidad = ($_POST['publicidad'] === 'on') ? true : false;
}else{
  $publicidad = false;
}
$resultado['publicidad'] = $publicidad;

echo '<pre>';
var_dump($resultado);
echo '</pre><br>';