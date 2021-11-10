<?php
function datosJson(String $url): array{
    $datosJSON = file_get_contents($url);
    $datosArray = json_decode($datosJSON, true);
    return $datosArray;
}