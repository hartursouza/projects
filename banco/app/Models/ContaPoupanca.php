<?php 

namespace App\Models;

require_once '../public/bootstrap.php';

use App\Exceptions\ContaException;
use App\Models\ContaBancaria;

class ContaPoupanca extends ContaBancaria {
    
    protected float $taxaDeTransferencia = 7;

    public function __construct($titular, $saldo, )
    {
        parent::__construct($titular, $saldo);
    }

    public function rendimento ($meses, float $taxaReferencial = 0.5)
    {
        $total = $this->saldo;
        $rendimento = $taxaReferencial;

        for($mes = 1; $mes <= $meses; $mes++)
        {
            $rendimentoDecimal = $rendimento / 100; // Converter para decimal
            $lucro = $total * $rendimentoDecimal;
            $total += $lucro;
        }

        return $total;
    }


    public function transferirParaCorrente(ContaCorrente $contaCorrente, float $valor)
    {
        if($valor > $this->saldo) {
            throw new ContaException('Saldo insuficiente');
        }

        $this->saldo -= $valor + $this->taxaDeTransferencia;
        $contaCorrente->depositar($valor);
    }

    public function transferirParaPoupanca(ContaPoupanca $contaPoupanca, float $valor)
    {  
        if($valor > $this->saldo) {
            throw new ContaException('Saldo insuficiente');
        }

        $this->saldo -= $valor;
        $contaPoupanca->depositar($valor);
    }
}

?>