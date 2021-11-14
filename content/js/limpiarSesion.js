$(document).ready(function () {
  $("#limpiarSesion").click(function () {
    $url = '/tienda/funciones/limpiarSesion.php';
    $.get($url, function (data) {
      if (data.error != 0) {
        alert(data.descripcion);
      }else{
        location.reload(true);
      }
    });
  });
});