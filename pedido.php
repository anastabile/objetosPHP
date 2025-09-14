<?php

class Pedido {
    public $cliente;
    public $itens = array(); 

    public function __construct($cliente) {
        $this->cliente = $cliente;
    }

    // Adicionar item ao pedido
    public function adicionarItem($nome, $preco, $quantidade) {
        $this->itens[] = array(
            "nome" => $nome,
            "preco" => $preco,
            "quantidade" => $quantidade
        );
    }

    // Calcular valor total
    public function total() {
        $soma = 0;
        foreach ($this->itens as $item) {
            $soma += $item["preco"] * $item["quantidade"];
        }
        return $soma;
    }

    // Mostrar detalhes do pedido
    public function detalhes() {
        $texto = "Cliente: " . $this->cliente . "<br>";
        $texto .= "Itens do pedido:<br>";
        foreach ($this->itens as $item) {
            $subtotal = $item["preco"] * $item["quantidade"];
            $texto .= "- " . $item["nome"] . " | Preço: R$ " . $item["preco"] . 
                      " | Quantidade: " . $item["quantidade"] . 
                      " | Subtotal: R$ " . $subtotal . "<br>";
        }
        $texto .= "Total do pedido: R$ " . $this->total();
        return $texto;
    }
}

// Exemplo de uso
$pedido = new Pedido("Ana");

$pedido->adicionarItem("vestido", 50, 2);
$pedido->adicionarItem("blusa", 30, 1);

echo $pedido->detalhes();

?>
