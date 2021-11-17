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
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login'] === true){
        ?>
        <a class="btn btn-success w-25" href="<?= $_SERVER['PHP_SELF'].'?formulario' ?>">
          Tramitar Pedido <i class="fas fa-arrow-circle-right"></i>
        </a>
        <?php
      }else{
        ?>
        <button class="btn btn-success w-25" data-bs-toggle="modal" data-bs-target="#iniciarSesion">
          Tramitar Pedido <i class="fas fa-arrow-circle-right"></i>
        </button>
        <?php
      }
      ?>
    </div>
<?php
  }else{
    echo '<h3 class="text-center">Aún no has seleccionado ningún producto <i class="fas fa-frown"></i></h3>';
  }
}

function carritoFormulario($post){
  ?>
  <div class="w-75 mx-auto">
    <h3 class="text-center">Formulario</h3>
    <script src="/tienda/content/js/carritoValidar.js"></script>
    <form action="/tienda/funciones/carritoValidar.php" method="POST" class="my-4">
      <div class="row">
        <div class="col-4">
          <label class="form-label" for="nombre">Nombre</label>
          <input class="form-control" name="nombre" id="nombre" type="text"
                 pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-type="palabra"
                 value="<?= ($post === false) ? '' : $post['nombre']; ?>"
                 onkeyup="validarRegExp($(this))" required>
        </div>
        <div class="col-4">
          <label class="form-label" for="apellido1">Primer Apellido</label>
          <input class="form-control" name="apellido1" id="apellido1" type="text"
                 pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-type="palabra"
                 value="<?= ($post === false) ? '' : $post['apellido1']; ?>"
                 onkeyup="validarRegExp($(this))" required>
        </div>
        <div class="col-4">
          <label class="form-label" for="apellido2">Segundo Apellido</label>
          <input class="form-control" name="apellido2" id="apellido2" type="text"
                 pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-type="palabra"
                 value="<?= ($post === false) ? '' : $post['apellido2']; ?>"
                 onkeyup="validarRegExp($(this))" required>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <label class="form-label" for="telefono">Nº de Teléfono</label>
          <input class="form-control" name="telefono" id="telefono" type="tel"
                 pattern="^[0-9]{9}$" data-type="telefono"
                 value="<?= ($post === false) ? '' : $post['telefono']; ?>"
                 onkeyup="validarRegExp($(this))" required>
        </div>
        <div class="col-4">
          <label class="form-label" for="telefonoAlt">Nº de Teléfono Alternativo</label>
          <input class="form-control" name="telefonoAlt" id="telefonoAlt" type="tel"
                 pattern="^[0-9]{9}$" data-type="telefono"
                 value="<?= ($post === false) ? '' : $post['telefonoAlt']; ?>"
                 onkeyup="validarRegExp($(this))">
        </div>
        <div class="col-4">
          <label class="form-label" for="email">Correo Electrónico</label>
          <input class="form-control" name="email" id="email" type="text"
                 pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" data-type="email"
                 value="<?= ($post === false) ? '' : $post['email']; ?>"
                 onkeyup="validarRegExp($(this))" required>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label class="form-label" for="pais">País</label>
          <input class="form-control" list="paisl" name="pais" id="pais"
                 value="<?php /*if (!empty($valoresAnteriores["pais"])) {echo $valoresAnteriores["pais"];}*/ ?>" required>
          <datalist id="paisl"></datalist>
        </div>
        <div class="col-6">
          <label class="form-label" for="provincia">Provincia</label>
          <input class="form-control" list="provincial" name="provincia" id="provincia"
                 value="<?php /*if (!empty($valoresAnteriores["provincia"])) {echo $valoresAnteriores["provincia"];}*/ ?>" required>
          <datalist id="provincial"></datalist>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <label class="form-label" for="isla">Isla</label>
          <select class="form-select" name="isla" id="isla" disabled required>
            <option value="">Escoja una provincia</option>
            <?php
            //if(!empty($valoresAnteriores["isla"])){echo '<option value="'.$valoresAnteriores["isla"].'" selected>'. ucfirst($valoresAnteriores["isla"]).'</option>';}
            ?>
          </select>
        </div>
        <div class="col-4">
          <label class="form-label" for="municipio">Municipio</label>
          <select class="form-select" name="municipio" id="municipio" disabled required>
            <option value="">Escoja una provincia</option>
            <?php
            if(!empty($valoresAnteriores["municipio"])){echo '<option value="'.$valoresAnteriores["municipio"].'" selected>'. ucfirst($valoresAnteriores["municipio"]).'</option>';}
            ?>
          </select>
        </div>
        <div class="col-4">
          <label class="form-label" for="localidad">Localidad</label>
          <input class="form-control" name="localidad" id="localidad" type="text"
                 pattern="^([a-zA-ZÀ-ÿ\u00f1\u00d1]+\s*)+$" data-type="direccion"
                 onkeyup="validarRegExp($(this))" required>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label class="form-label" for="via">Tipo de vía</label>
          <select class="form-select" name="via" id="via" aria-label="Default select example" required>
            <option value="">Seleccione un tipo de vía</option>
            <option value="avenida">Avenida</option>
            <option value="bulevar">Bulevar</option>
            <option value="calle">Calle</option>
            <option value="callejon">Callejón</option>
            <option value="camino">Camino</option>
            <option value="carretera">Carretera</option>
            <option value="parque">Parque</option>
            <option value="pasaje">Pasaje</option>
            <option value="plaza">Plaza</option>
            <option value="urbanizacion">Urbanización</option>
          </select>
        </div>
        <div class="col-6">
          <label class="form-label" for="direccion">Dirección</label>
          <input class="form-control" name="direccion" id="direccion" type="text"
                 pattern="^([a-zA-ZÀ-ÿ\u00f1\u00d1]+\s*)+$" data-type="direccion"
                 value="<?= ($post === false) ? '' : $post['direccion']; ?>"
                 onkeyup="validarRegExp($(this))" required>
        </div>
        <div class="col-3">
          <label class="form-label" for="portal">Portal</label>
          <input class="form-control" name="portal" id="portal" type="text"
                 pattern="^([0-9a-zA-ZÀ-ÿ\u00f1\u00d1]+\s*)+$" data-type="direccion"
                 value="<?= ($post === false) ? '' : $post['portal']; ?>"
                 onkeyup="validarRegExp($(this))">
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label class="form-label" for="numero">Número</label>
          <input class="form-control" name="numero" id="numero" type="text"
                 pattern="^[0-9]+$" data-type="numero"
                 value="<?= ($post === false) ? '' : $post['numero']; ?>"
                 onkeyup="validarRegExp($(this))">
        </div>
        <div class="col-3">
          <label class="form-label" for="piso">Piso</label>
          <input class="form-control" name="piso" id="piso" type="text"
                 pattern="^[0-9a-zA-Z]+$" data-type="numeros y letras"
                 value="<?= ($post === false) ? '' : $post['piso']; ?>"
                 onkeyup="validarRegExp($(this))">
        </div>
        <div class="col-3">
          <label class="form-label" for="puerta">Puerta</label>
          <input class="form-control" name="puerta" id="puerta" type="text"
                 pattern="^[0-9a-zA-Z]+$" data-type="numeros y letras"
                 value="<?= ($post === false) ? '' : $post['puerta']; ?>"
                 onkeyup="validarRegExp($(this))">
        </div>
        <div class="col-3">
          <label class="form-label" for="cPostal">Código Postal</label>
          <input class="form-control" name="cPostal" id="cPostal" type="text"
                 pattern="^[0-9]{5}$" data-type="codigo postal"
                 value="<?= ($post === false) ? '' : $post['cPostal']; ?>"
                 onkeyup="validarRegExp($(this))" required>
        </div>
      </div>
      <div class="mt-2">
        <input class="form-check-input" name="politica" id="politica" type="checkbox" <?= ($post === false && !isset($post['politica'])) ? '' : 'checked'; ?> required>
        <label class="form-label" for="politica">Política de Datos</label>
      </div>
      <div class="mt-2">
        <input class="form-check-input" name="publicidad" id="publicidad" type="checkbox" <?= ($post === false && !isset($post['publicidad'])) ? '' : 'checked'; ?>>
        <label class="form-label" for="publicidad">Recibir Publicidad</label>
      </div>
      <div class="text-center">
        <a class="btn btn-secondary w-25" href="<?= $_SERVER['PHP_SELF'] ?>" alt="Volver al carrito">Carrito</a>
        <button type="submit" class="btn btn-success w-25" alt="Tramitar pago">Tramitar Pago</button>
      </div>
    </form>

    <script src="/tienda/content/js/selects-anidados.js"></script>
  </div>
  <?php
  if(isset($_SESSION['post'])){
    unset($_SESSION['post']);
  }
}