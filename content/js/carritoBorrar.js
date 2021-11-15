$(document).ready(function () {
  $(".eliminarProducto").click(function () {
    $url = '/tienda/funciones/carritoBorrar.php?id='+$(this).attr('data-id');
    $.get($url, function (data) {
      if (data.error != 0) {
        alert(data.descripcion);
      }else{
        location.reload(true);
      }
    });
  });
});