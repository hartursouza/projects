<?php 

namespace App\Models;

use Exception;

class ContaBancaria {

    protected string $titular;
    protected float $saldo;

    public function __construct($titular, $saldo = 0)
    {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function getTitular () 
    {
        return $this->titular;
    }

    public function getSaldo () 
    {
        return number_format($this->saldo, 2, ",", ".");
    }

    public function depositar (float $valor) 
    {
        $this->saldo += $valor;
    }

    public function sacar (float $valor) 
    {
        if($valor > $this->saldo) {
            throw new \Exception('Saldo insuficiente');
        } 

        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
        }
    }

    public function transferir(ContaBancaria $contaBancaria, float $valor) 
    {   
        if($valor > $this->saldo) {
            return 'Saldo insuficiente';
        }

        $this->saldo -= $valor;
        $contaBancaria->depositar($valor);
    }
}

?>