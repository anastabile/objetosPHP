<?php

class ContaBancaria {
    public $titular;
    public $saldo;

    // Construtor
    public function __construct($titular, $saldoInicial = 0) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Depositar
    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
        }
    }

    // Sacar
    public function sacar($valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            return "Saque realizado com sucesso!";
        } else {
            return "Erro: saldo insuficiente.";
        }
    }

    // Transferir
    public function transferir($destino, $valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            $destino->depositar($valor);
            return "Transferência realizada com sucesso!";
        } else {
            return "Erro: saldo insuficiente para transferência.";
        }
    }
}

// Exemplo de uso
$conta1 = new ContaBancaria("Ana", 500);
$conta2 = new ContaBancaria("Maria", 300);

$conta1->depositar(200);
echo $conta1->sacar(100) . "<br>";
echo $conta1->transferir($conta2, 250) . "<br>";

echo "Saldo de " . $conta1->titular . ": R$ " . $conta1->saldo . "<br>";
echo "Saldo de " . $conta2->titular . ": R$ " . $conta2->saldo . "<br>";

?>
