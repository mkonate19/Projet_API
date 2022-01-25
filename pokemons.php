<?php




$tiplouf = [
    'name' => 'Tiplouf',
    'level' =>  1,
    'power' => 'Type eau',
    'image' => 'https://tse3.mm.bing.net/th?id=OIP.XqgFnwIny68ttIkZLGeIzQHaG1&pid=Api&P=0&w=180&h=167'
];


$artikodin = [
    'name' => 'Artikoden',
    'level' =>  'Légendaire',
    'power' => 'Type glace',
    'image' => 'https://www.pokepedia.fr/images/b/bb/Artikodin-RFVF.png'
];

$pikachu = [
    'name' => 'Pikachu',
    'level' =>  10,
    'power' => 'Type éclair',
    'image' => 'https://tse3.mm.bing.net/th?id=OIP.Myh354Tnmz2QhbtdWHF_YQHaHa&pid=Api&P=0&w=187&h=187'
];

$pokemons = [$tiplouf, $artikodin, $pikachu];

$json_text = json_encode($pokemons);
echo $json_text;
















?>