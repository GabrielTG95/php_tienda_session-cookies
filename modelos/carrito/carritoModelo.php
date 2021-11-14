<?php
include '../../funciones/getDatosJson.php';
function mostrarCarrito(){
  if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0){
    $articulos = datosJson('../../content/data/articulos.json');
    echo '<div>';
    foreach ($_SESSION['carrito'] as $producto => $cantidad){
      $articulo = datosArticulo($articulos, 'id', $producto);
?>
      <div class="row border border-2 w-75 mx-auto my-2 articulos-carrito py-3">
        <div class="col-10">
          <img class="me-3" src="<?= $articulo['imagen'] ?>" alt="Imágen del artículo '<?= $articulo['nombre'] ?>'">
          <p class="d-inline"><?= $articulo['nombre'] ?></p>
        </div>
        <div class="col-1 my-auto">
          <input class="form-control" type="number" step="0" min="1" value="<?= $cantidad ?>">
        </div>
        <div class="col-1 my-auto">
          <button class="eliminarProducto btn btn-danger" data-id="<?= $producto ?>"><i class="fas fa-trash-alt"></i></button>
        </div>
      </div>
<?php
      //echo 'Producto: '.$producto.'  --->  Cantidad: '.$cantidad.'<br>';
    }
    echo '</div>';
  }else{
    echo '<h3 class="text-center">Aún no has seleccionado ningún producto <i class="fas fa-frown"></i></h3>';
  }
}