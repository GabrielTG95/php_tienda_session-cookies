$(document).ready(function () {
  $(".disminuirCantidad").click(function () {
    $destinoCantidad = '#cantidad_'+$(this).attr('data-id');
    $destinoPrecio = '#precio_'+$(this).attr('data-id');
    $url = '/tienda/funciones/carritoCantidad.php?id='+$(this).attr('data-id')+'&accion=restar';
    $.get($url, function (data) {
      if (data.error != 0) {
        alert(data.descripcion);
      }else{
        setTimeout(function(){
          $total = 0;
          let $dataList = $(".precio").map(function() {
            return $(this).text();
          }).get();
          for (const $precio of $dataList) {
            $total += parseFloat($precio);
          }
          $('#total').html('Total: '+($total).toFixed(2)+'€');
          if($total < 500){
            $('#envio').html('Envío: '+($total * 0.1).toFixed(2)+'€');
          }else{
            $('#envio').html('Envío: Gratis');
          }
        },25)
        $($destinoCantidad).html(data.cantidad);
        $($destinoPrecio).html(data.precio+'€');
        $('#totalCarrito').html('('+data.carrito+')');
      }
    });
  });
  $(".aumentarCantidad").click(function () {
    $destinoCantidad = '#cantidad_'+$(this).attr('data-id');
    $destinoPrecio = '#precio_'+$(this).attr('data-id');
    $url = '/tienda/funciones/carritoCantidad.php?id='+$(this).attr('data-id')+'&accion=sumar';
    $.get($url, function (data) {
      if (data.error != 0) {
        alert(data.descripcion);
      }else{
        setTimeout(function(){
          $total = 0;
          let $dataList = $(".precio").map(function() {
            return $(this).text();
          }).get();
          for (const $precio of $dataList) {
            $total += parseFloat($precio);
          }
          $('#total').html('Total: '+($total).toFixed(2)+'€');
          if($total < 500){
            $('#envio').html('Envío: '+($total * 0.1).toFixed(2)+'€');
          }else{
            $('#envio').html('Envío: Gratis');
          }
        },25)
        $($destinoCantidad).html(data.cantidad);
        $($destinoPrecio).html(data.precio+'€');
        $('#totalCarrito').html('('+data.carrito+')');
      }
    });
  });
});