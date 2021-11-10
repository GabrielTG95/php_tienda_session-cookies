$(document).ready(function(){
  let $myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
  $myModal.show();
  $("#aceptar").click(function(){
    $.get('../../funciones/setpolitica.php', function(data){
      if (data.error == 0) {
        $myModal.hide();
      } else {
        alert("Ha habido un error al establecer la política");
      }
    });
  });
  $("#cancelar").click(function(){
    location.reload();
  });
});