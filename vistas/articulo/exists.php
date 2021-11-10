<?php
function existeFichero($url){
  $contador = 0;
  while($contador <= 14){
    $url = '../'.$url;
    echo $contador++.'<br>';
    echo $url;
  }
}
existeFichero('index.php');