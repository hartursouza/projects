<?php 

require_once 'bootstrap.php';

use App\Models\ContaCorrente;
use App\Models\ContaPoupanca;
use App\Exceptions\ContaException;

$conta = new ContaCorrente('Hartur', 0, 1000);
$conta_2 = new ContaPoupanca('Eduarda', 1000);


// Rendimento após  12 meses
echo $conta_2->rendimento(12);

    
?>