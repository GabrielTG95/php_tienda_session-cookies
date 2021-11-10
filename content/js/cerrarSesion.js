$(document).ready(function () {
  $("#cerrarSesion").click(function () {
    $url = '../../funciones/borrarSession.php';
    $.get($url, function (data) {
      if (data.error != 0) {
        alert(data.descripcion);
      }
    });
  });
});