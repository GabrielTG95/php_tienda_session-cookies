<?php
function mostrarCarrito(){
  if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0){
    foreach ($_SESSION['carrito'] as $producto){
      echo $producto;
    }
  }else{
    echo '<h3 class="text-center">Aún no has seleccionado ningún producto <i class="fas fa-frown"></i></h3>';
  }
}