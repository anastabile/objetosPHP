<?php

// Classe Aluno s
class Aluno {
    public $nome;
    public $notas = array();

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function adicionarNota($nota) {
        $this->notas[] = $nota;
    }

    public function media() {
        if (count($this->notas) == 0) {
            return 0;
        }
        return array_sum($this->notas) / count($this->notas);
    }

    public function aprovado() {
        return $this->media() >= 6;
    }
}

// Classe Turma
class Turma {
    public $disciplina;
    public $alunos = array();

    public function __construct($disciplina) {
        $this->disciplina = $disciplina;
    }

    // Adicionar aluno na turma
    public function adicionarAluno($aluno) {
        $this->alunos[] = $aluno;
    }

    // Retorna o aluno com maior média
    public function melhorAluno() {
        if (count($this->alunos) == 0) {
            return null;
        }

        $melhor = $this->alunos[0];
        foreach ($this->alunos as $aluno) {
            if ($aluno->media() > $melhor->media()) {
                $melhor = $aluno;
            }
        }
        return $melhor;
    }

    // Lista alunos e situação
    public function resultadoFinal() {
        if (count($this->alunos) == 0) {
            return "Nenhum aluno cadastrado.";
        }

        $resultado = "Disciplina: " . $this->disciplina . "<br>";
        foreach ($this->alunos as $aluno) {
            $situacao = $aluno->aprovado() ? "Aprovado" : "Reprovado";
            $resultado .= $aluno->nome . " | Média: " . $aluno->media() . " | " . $situacao . "<br>";
        }
        return $resultado;
    }
}

// Exemplo de uso
$aluno1 = new Aluno("Ana");
$aluno1->adicionarNota(7);
$aluno1->adicionarNota(8);

$aluno2 = new Aluno("Luiz");
$aluno2->adicionarNota(5);
$aluno2->adicionarNota(6);

$aluno3 = new Aluno("Julia");
$aluno3->adicionarNota(9);
$aluno3->adicionarNota(10);

$turma = new Turma("Matemática");
$turma->adicionarAluno($aluno1);
$turma->adicionarAluno($aluno2);
$turma->adicionarAluno($aluno3);

echo $turma->resultadoFinal() . "<br>";

$melhor = $turma->melhorAluno();
echo "Melhor aluno: " . $melhor->nome . " | Média: " . $melhor->media();

?>
