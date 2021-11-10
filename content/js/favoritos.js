$(document).ready(function () {
  $(".favorito").click(function () {
    $(this).toggleClass("far fas");
    $url = '../../funciones/setfavoritos.php?id=' + $(this).attr('data-id');
    $.get($url, function (data) {
      if (data.error != 0) {
        alert("Ha habido un error al registrar el favorito");
      }
    });
  });
});