$(document).ready(function () {
  $(".carrito").click(function () {
    $url = '/tienda/funciones/carritoMeter.php?id='+$(this).attr('data-id');
    $.get($url, function (data) {
      if (data.error != 0) {
        alert(data.descripcion);
      }else{
        $('#totalCarrito').html('('+data.cantidad+')');
      }
    });
  });
});