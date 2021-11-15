$(document).ready(function () {
  $(".disminuirCantidad").click(function () {
    $cantidad = parseInt($('#cantidad_'+$(this).attr('data-id')).text());
    if ($cantidad > 0){
      $url = '/tienda/funciones/carritoCantidad.php?id='+$(this).attr('data-id')+'&accion=restar';
      $.get($url, function (data) {
        if (data.error != 0) {
          alert(data.descripcion);
        }else{
          $('#cantidad_'+$(this).attr('data-id')).text($cantidad--);
        }
      });
    }
  });
  $(".aumentarCantidad").click(function () {
    $cantidad = parseInt($('#cantidad_'+$(this).attr('data-id')).text());
    console.log($('#cantidad_'+$(this).attr('data-id')).text());
    $url = '/tienda/funciones/carritoCantidad.php?id='+$(this).attr('data-id')+'&accion=sumar';
    $.get($url, function (data) {
      if (data.error != 0) {
        alert(data.descripcion);
      }else{
        $('#cantidad_'+$(this).attr('data-id')).text($cantidad++);
      }
    });
  });
});