<?php


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    exit;
}

$inputJSON = file_get_contents('php://input'); // récupération du corps de la requete HTTP
$pokemon = json_decode($inputJSON, TRUE);
// Vérifier la validité du champion et l'ajouter:
// En BDD -> C'est ce qu'il faut faire dans un vrai projet
// === Dans un fichier ===
if(!isset($pokemon["name"]) or !isset($pokemon["imageSrc"]) or !isset($pokemon["level"]) or !isset($pokemon["power"])){
    header($_SERVER["SERVER_PROTOCOL"] . " 400 miss some(s) value(s) in request", true, 400);
    exit;
}
// if(!array_key_exists("name", $pokemon) || !array_key_exists("url", $pokemon) || !array_key_exists("level", $pokemon) || !array_key_exists("power", $pokemon)) {
//     http_response_code(409);
//     exit;
// }
$file_name = "data.json";
$pokemons = [];
if (file_exists($file_name)) {
    // chargement de la liste des champions depuis le fichier
    $pokemons = json_decode(file_get_contents($file_name), true);
}


array_push($pokemons, $pokemon);


// Mise à jour du fichier
file_put_contents($file_name, json_encode($pokemons));






?>