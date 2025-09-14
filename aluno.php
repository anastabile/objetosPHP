<?php

class Aluno {
    public $nome;
    public $matricula;
    public $notas = array();

    // Construtor
    public function __construct($nome, $matricula) {
        $this->nome = $nome;
        $this->matricula = $matricula;
    }

    // Adiciona uma nota ao array
    public function adicionarNota($nota) {
        $this->notas[] = $nota;
    }

    // Calcula a média das notas
    public function media() {
        if (count($this->notas) == 0) {
            return 0;
        }
        $soma = array_sum($this->notas);
        return $soma / count($this->notas);
    }

    // Verifica se o aluno está aprovado
    public function aprovado() {
        if ($this->media() >= 6) {
            return true;
        } else {
            return false;
        }
    }
}

// Exemplo de uso
$aluno = new Aluno("Ana", "2025");

$aluno->adicionarNota(7);
$aluno->adicionarNota(5);
$aluno->adicionarNota(9);

echo "Nome: " . $aluno->nome . "<br>";
echo "Matrícula: " . $aluno->matricula . "<br>";
echo "Média: " . $aluno->media() . "<br>";

if ($aluno->aprovado()) {
    echo "Situação: Aprovado";
} else {
    echo "Situação: Reprovado";
}

?>
