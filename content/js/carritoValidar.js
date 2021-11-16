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
      pattern = /^([0-9a-zA-ZÀ-ÿ\u00f1\u00d1]+\s*)+/;
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