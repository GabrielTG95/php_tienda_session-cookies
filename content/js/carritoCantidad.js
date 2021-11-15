$(document).ready(function () {
  $(".disminuirCantidad").click(function () {
    $cantidad = parseInt($('#cantidad_'+$(this).attr('data-id')).text());
    if ($cantidad > 1){
      $url = '/tienda/funciones/carritoCantidad.php?id='+$(this).attr('data-id')+'&accion=restar';
      $.get($url, function (data) {
        if (data.error != 0) {
          alert(data.descripcion);
        }else{
          //$('#cantidad_'+$(this).attr('data-id')).html('pepe');
          location.reload(true);
        }
      });
    }
  });
  $(".aumentarCantidad").click(function () {
    $url = '/tienda/funciones/carritoCantidad.php?id='+$(this).attr('data-id')+'&accion=sumar';
    $.get($url, function (data) {
      if (data.error != 0) {
        alert(data.descripcion);
      }else{
        //$('#cantidad_'+$(this).attr('data-id')).html(data.cantidad);
        location.reload(true);
      }
    });
  });
});