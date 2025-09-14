<?php

class Agenda {
    public $contatos = array();

    // Adicionar contato
    public function adicionarContato($nome, $telefone) {
        $this->contatos[$nome] = $telefone;
    }

    // Remover contato
    public function removerContato($nome) {
        if (isset($this->contatos[$nome])) {
            unset($this->contatos[$nome]);
            return "Contato $nome removido";
        } else {
            return "Contato $nome não encontrado";
        }
    }

    // Buscar contato
    public function buscarContato($nome) {
        if (isset($this->contatos[$nome])) {
            return "Telefone de $nome: " . $this->contatos[$nome];
        } else {
            return "Contato $nome não encontrado";
        }
    }

    // Listar todos os contatos em ordem alfabética
    public function listarContatos() {
        if (count($this->contatos) == 0) {
            return "Nenhum contato cadastrado.";
        }

        ksort($this->contatos); // ordena pelo nome
        $lista = "Contatos da agenda:<br>";
        foreach ($this->contatos as $nome => $telefone) {
            $lista .= "- $nome: $telefone<br>";
        }
        return $lista;
    }
}

// Exemplo de uso
$agenda = new Agenda();

$agenda->adicionarContato("Ana", "99999-1111");
$agenda->adicionarContato("Luiz", "88888-2222");
$agenda->adicionarContato("Julia", "77777-3333");

echo $agenda->listarContatos() . "<br>";

echo $agenda->buscarContato("Bruno") . "<br>";
echo $agenda->removerContato("Ana") . "<br>";
echo $agenda->listarContatos() . "<br>";

?>
