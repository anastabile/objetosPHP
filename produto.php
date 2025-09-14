<?php

class Produto {
    public $nome;
    public $preco;
    public $estoque;

    // Construtor
    public function __construct($nome, $preco, $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    // Método para aplicar desconto
    public function aplicarDesconto($percentual) {
        $desconto = $this->preco * ($percentual / 100);
        $this->preco -= $desconto;
    }

    // Método para vender produto
    public function vender($quantidade) {
        if ($quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;
            return "Venda realizada";
        } else {
            return "Erro: quantidade insuficiente.";
        }
    }

    // Método para resumo
    public function resumo() {
        return "Produto: " . $this->nome . 
               " | Preço: R$ " . $this->preco . 
               " | Estoque: " . $this->estoque;
    }
}

// Exemplo de uso
$produto = new Produto("Camiseta", 100, 10);

echo $produto->resumo() . "<br>";
$produto->aplicarDesconto(10);
echo $produto->resumo() . "<br>";
echo $produto->vender(3) . "<br>";
echo $produto->resumo() . "<br>";
?>
