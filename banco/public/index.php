<?php 

require_once 'bootstrap.php';

use App\Models\ContaCorrente;
use App\Models\ContaPoupanca;

$conta = new ContaCorrente('Hartur', 0, 1000);

echo $conta->getSaldo() . "\n";

$conta->depositar(500);
echo $conta->getSaldo() . "\n";

$conta->sacar(300);
echo $conta->getSaldo() . "\n";

echo $conta->sacar(300);
echo $conta->getSaldo() . "\n";

try  {
    $conta->sacar(1000) . "\n";
} catch (Exception $e) {
    echo $e->getMessage();
}

    
?>