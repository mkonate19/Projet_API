<?php



if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    exit;
}


$inputJSON = file_get_contents('php://input');
$pokemon = json_decode($inputJSON, TRUE);

// if(!array_key_exists("name", $pokemon) || !array_key_exists("url", $pokemon) || !array_key_exists("level", $pokemon) || !array_key_exists("power", $pokemon)) {
//     http_response_code(409);
//     exit;
// }

$file_name = "data.json";
$pokemons = [];
$index = 0;
if (file_exists($file_name)) {
    // chargement de la liste des champions depuis le fichier
    $pokemons = json_decode(file_get_contents($file_name), true);
}

foreach($pokemons as $key => $value){
    if($pokemon["old_name"] == $value["name"]){
        foreach ($pokemon as $key2 => $value2){
            if($key2 != "old_name") {
                $pokemons[$key][$key2] = $pokemon[$key2]; 
            }
                 
        }
    }
    $index++;
}
// Mise à jour du fichier
file_put_contents($file_name, json_encode($pokemons));






?>