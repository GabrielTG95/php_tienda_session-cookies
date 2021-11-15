//$(document).ready(function () {
  function validarRegExp($origen){
    console.log('Origen: '+$origen+', RegExp: '+$origen.attr('pattern')+', Valor: '+$origen.val());
    let $pattern = /$origen.attr('pattern')/;
    if($pattern.test($origen.val())){
      console.log('Correcto');
    }
  }
//});