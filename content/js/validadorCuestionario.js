function validarRegExp($origen){
  let pattern;
  switch ($origen.attr('data-type')){
    case 'palabra':
      pattern = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
      break;
    case 'numero':
      pattern = /^[0-9]+$/;
      break;;
    case 'numeros y letras':
      pattern = /^[0-9a-zA-Z]+$/;
      break;
    case 'telefono':
      pattern = /^[0-9]{9}$/;
      break;
    case 'email':
      pattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
      break;
    case 'direccion':
      pattern = /^([a-zA-ZÀ-ÿ\u00f1\u00d1]+\s*)+/;
      break;
    case 'codigo postal':
      pattern = /^[0-9]{5}$/;
      break;
  }
  if(pattern.test($origen.val()) || $origen.val().length === 0 && typeof($origen.attr('required')) === 'undefined'){
    $origen.css('background','white');
  }else{
    $origen.css('background','rgba(255, 0, 0, 0.2)');
  }
}

$(document).ready(function() {
  $(document)
    .on('click', 'form button[type=submit]', function(e) {
      let $datos = $('form').serializeArray();
      let $pais = false;
      $.getJSON("/tienda/content/data/paises.json", function (paises) {
        $.each(paises, function (index, pais) {
          if ($datos[6]['value'] === pais['name_es']){
            console.log('Select pais: '+$datos[6]['value']+', Pais: '+pais['name_es'])
            $pais = true;
          }
        });
      });
      setTimeout(function(){
        console.log($pais);

        if($pais === false){
          console.log('No existe');
          e.preventDefault();
        }/*else{
          console.log('Sí existe');
        }*/
      },100);


      /*if ($datos[6]['value'] === ""){
        console.log($datos[6]);
      }*/

       //Previene la acción por defecto
      /*let pattern = /^[a-zA-Z]+$/;
      let isValid = true
      console.log(pattern.test($('#prueba').val()));
      if(pattern.test($('#prueba').val()) === false){
        isValid = false;
        $('#prueba').css('background','red');
      }
      if(isValid === false) {
        e.preventDefault(); //Previene la acción por defecto
      }*/
    });
});