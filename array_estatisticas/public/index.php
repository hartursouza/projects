<?php 

namespace array_estatisticas\public;

require __DIR__ . "/../src/classes/estatisticas.php";

use array_estatisticas\src\Estatisticas;

/* Fazendo algorítmos */

$array = [];

// Populando o array com notas aleatórias
for ($i=0; $i < 10; $i++) { 
    $array[] = mt_rand(1, 10);
}

$valor_máximo =  Estatisticas::max($array);
$valor_mínimo =  Estatisticas::min($array);
$soma = Estatisticas::sum($array);
$média =  Estatisticas::media($array);

$estatísticas = [
    'Máximo' => $valor_máximo, 
    'Mínimo' => $valor_mínimo, 
    'Soma' => $soma,
    'Média' => $média
    ];

print_r($estatísticas);

?>