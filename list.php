<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    exit;
}

header('Content-Type: application/json; charset=utf-8');

$file_name = "data.json";
$pokemons = [];
if(file_exists($file_name)) {
    // chargement de la liste des champions depuis le fichier
    $pokemons = json_decode(file_get_contents($file_name), true);
}

$json_text = json_encode($pokemons);
echo $json_text;

?>
