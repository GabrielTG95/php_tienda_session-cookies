<?php
include '../../funciones/getDatosJson.php';
function mostrarCarrito(){
  if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0){
    $total = 0;
    $articulos = datosJson('../../content/data/articulos.json');
    echo '<div>';
    foreach ($_SESSION['carrito'] as $producto => $cantidad){
      $articulo = datosArticulo($articulos, 'id', $producto);
      $total += $articulo['precio'] * $cantidad;
?>
      <div class="row border border-2 w-75 mx-auto my-2 articulos-carrito py-3">
        <div class="col-7">
          <img class="me-3" src="<?= $articulo['imagen'] ?>" alt="Imágen del artículo '<?= $articulo['nombre'] ?>'">
          <p class="d-inline"><?= $articulo['nombre'] ?></p>
        </div>
        <div class="col-2 my-auto">
          <div>
            <button class="w-25 p-0 btn btn-secondary disminuirCantidad" data-id="<?= $producto ?>">-</button>
            <p class="w-50 d-inline" id="cantidad_<?= $producto ?>"><?= $cantidad ?></p>
            <button class="w-25 p-0 btn btn-secondary aumentarCantidad" data-id="<?= $producto ?>">+</button>
          </div>
        </div>
        <div class="col-2 my-auto">
          <div>
            <p class="w-50 d-inline precio" id="precio_<?= $producto ?>"><?= $articulo['precio'] * $cantidad ?>€</p>
          </div>
        </div>
        <div class="col-1 my-auto">
          <button class="eliminarProducto btn btn-danger" data-id="<?= $producto ?>"><i class="fas fa-trash-alt"></i></button>
        </div>
      </div>
<?php
    }
?>
    </div>
    <div class="w-75 mx-auto">
      <p class="text-end" id="total">Total: <?= $total ?>€</p>
    </div>
    <div class="text-center">
      <a class="btn btn-primary w-25" href="/tienda/index.php" alt="">Seguir Comprando <i class="fas fa-shopping-bag"></i></a>
      <button class="btn btn-success w-25">Continuar <i class="fas fa-arrow-circle-right"></i></button>
    </div>
<?php
  }else{
    echo '<h3 class="text-center">Aún no has seleccionado ningún producto <i class="fas fa-frown"></i></h3>';
  }
}