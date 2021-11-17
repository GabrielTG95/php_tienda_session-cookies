$.getJSON("/tienda/content/data/paises.json", function (paises) {
  if ($("#pais").val() === "") {
    $("#pais").val('España');
  }
  let $paises = $("#paisl");
  $.each(paises, function (index, pais) {
    $paises.append("<option value='" + pais['name_es'] + "'>");
  });

});

$.getJSON("/tienda/content/data/provincias.json", function (provincias) {
  let $provincias = $("#provincial");
  $.each(provincias, function (index, provincia) {
    $provincias.append("<option value='" + provincia['nombre'] + "'>");
  });
});

$("#pais").change(function () {
  console.log('hola');
  if ($("#pais").val() != 'España') {
    $("#provincia").empty();
    $("#provincia").attr("disabled", true);
    $("#provincia").val("Escoja España");
    $("#isla").attr('disabled', true);
    $("#isla").empty();
    $("#isla").append("<option value=''>Escoja una provincia</option>");
    $("#municipio").attr('disabled', true);
    $("#municipio").empty();
    $("#municipio").append("<option value=''>Escoja una provincia</option>");
    $("#localidad").attr('disabled', true);
    $("#localidad").empty();
    $("#localidad").val("Escoja un municipio");
    $("#codigoPostal").attr('disabled', true);
    $("#codigoPostal").empty();
    $("#codigoPostal").val("");
  } else {
    $("#provincia").attr("disabled", false);
    $("#provincia").val("");
  }
});

$("#provincia").change(function () {
  let $municipios = $("#municipio");
  if ($('#provincia').val().length != 0){
    $municipios.empty();
    $.getJSON("/tienda/content/data/provincias.json", function (provincias) {
      let $flag = false;
      let $posicion = 0;
      let $provincia_id = '';
      while ($flag == false && $posicion < provincias.length) {
        if (provincias[$posicion]['nombre'] == $('#provincia').val()) {
          $flag = true;
          $provincia_id = provincias[$posicion]['provincia_id'];
        }
        $posicion++;
      }
      if ($provincia_id == '07' || $provincia_id == '35' || $provincia_id == '38') {
        $municipios.attr("disabled", true);
        $.getJSON("/tienda/content/data/islas.json", function (islas) {
          let $islas = $("#isla");
          $islas.attr('disabled', false);
          $islas.empty();
          $islas.append("<option value=''>Escoja una isla</option>");
          $municipios.append("<option value=''>Escoja una isla</option>");
          $.each(islas, function (index, isla) {
            if (isla['provincia_id'] == $provincia_id) {
              $islas.append("<option value='" + isla['nombre'] + "'>" + isla['nombre'] + "</option>");
            }
          });
        });
      } else {
        $municipios.attr("disabled", false);
        $municipios.append("<option value=''>Escoja un municipio</option>");
        $.getJSON("/tienda/content/data/municipios.json", function (municipios) {
          $("#isla").attr('disabled', true);
          $("#isla").empty();
          $("#isla").append("<option value=''>Escoja una provincia</option>");
          $.each(municipios, function (index, municipio) {
            if (municipio['provincia_id'] == $provincia_id) {
              $municipios.append("<option value='" + municipio['nombre'] + "'>" + municipio['nombre'] + "</option>");
            }
          });

        });
      }
    });
  }else{
    $municipios.attr("disabled", true);
    $municipios.empty();
    $municipios.append("<option value=''>Escoja una provincia</option>");
  }
  $('#localidad').attr('disabled', true);
  $('#localidad').val('Escoja un municipio');
  $("#codigoPostal").attr('disabled', true);
  $("#codigoPostal").empty();
  $("#codigoPostal").val("");
});

$("#isla").change(function () {
  $.getJSON("/tienda/content/data/municipios_islas.json", function (municipios) {
    let $municipios = $("#municipio");
    $municipios.attr("disabled", false);
    $municipios.empty();
    $municipios.append("<option value=''>Escoja un municipio</option>");
    $('#localidad').attr('disabled', true);
    $('#localidad').val('Escoja un municipio');
    /*$.each(municipios, function (index, municipio) {
      if (municipio['isla_id'] == $("#isla option:selected").val()) {
        $municipios.append("<option value='" + municipio['nombre'] + "'>" + municipio['nombre'] + "</option>");
      }
    });*/
    $.getJSON("/tienda/content/data/islas.json", function(islas){
      let $flag = false;
      let $posicion = 0;
      while($flag == false && $posicion < islas.length){
        if(islas[$posicion]['nombre'] == $("#isla option:selected").val()){
          $.each(municipios, function (index, municipio) {
            if (islas[$posicion]['isla_id'] == municipios[index]['isla_id']){
              $municipios.append("<option value='" + municipio['nombre'] + "'>" + municipio['nombre'] + "</option>");
            }
          });
          $flag = true;
        }
        $posicion++;
      }
    })
  });
  $("#codigoPostal").attr('disabled', true);
  $("#codigoPostal").empty();
  $("#codigoPostal").val("");
});

$("#municipio").change(function () {
  let $municipio = $('#municipio');
  let $localidad = $('#localidad');
  if($municipio.val() != 'base' || $municipio.attr('disabled') == false){
    $localidad.attr('disabled', false);
    $localidad.val('');
  }else{
    $localidad.attr('disabled', true);
    $localidad.val('Escoja un municipio');
  }
  $("#codigoPostal").attr('disabled', true);
  $("#codigoPostal").empty();
  $("#codigoPostal").val("");
});
$("#localidad").change(function () {
  let $localidad = $('#localidad');
  let $codigoPostal = $('#codigoPostal');
  if($localidad.val() != '' || $localidad.attr('disabled') == false){
    $codigoPostal.attr('disabled', false);
    $codigoPostal.val('');
  }else{
    $codigoPostal.attr('disabled', true);
    $codigoPostal.val('');
  }
});