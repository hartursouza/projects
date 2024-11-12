<?php 

namespace App\Models;

require_once '../public/bootstrap.php';
use App\Models\ContaBancaria;

class ContaCorrente extends ContaBancaria {

    private $limiteDeCredito;
    public $taxaDeTransferencia;

    public function __construct($titular, $saldo = 0, $limiteDeCredito = 0)
    {
        parent::__construct($titular, $saldo);
        $this->limiteDeCredito = $limiteDeCredito;
    }

    public function sacar(float $valor)
    {

        if($valor > ($this->saldo + $this->limiteDeCredito)) {
            throw new \Exception('Saldo + créditos insuficientes');
        } 

        if ($valor > 0 && $valor <= ($this->saldo + $this->limiteDeCredito)) {
            $this->saldo -= $valor;
        }
    }

    public function transferirParaCorrente(ContaCorrente $contaCorrente, float $valor)
    {
        if($valor > $this->saldo) {
            return 'Saldo insuficiente';
        }

        $this->saldo -= $valor;
        $contaCorrente->depositar($valor);
    }

    public function transferirParaPoupanca(ContaPoupanca $contaPoupanca, float $valor)
    {  
        if($valor > ($this->saldo + $this->limiteDeCredito)) {
            return 'Saldo insuficiente';
        }

        $this->saldo -= $valor + $this->taxaDeTransferencia;
        $contaPoupanca->depositar($valor);
    }
}

?>