<?php

class Biblioteca {
    public $nome;
    public $livros = array();

    // Construtor
    public function __construct($nome) {
        $this->nome = $nome;
    }

    // Adicionar um livro
    public function adicionarLivro($titulo) {
        $this->livros[] = $titulo;
    }

    // Buscar livros pelo termo
    public function buscarLivro($termo) {
        $resultado = array();
        foreach ($this->livros as $livro) {
            if (stripos($livro, $termo) !== false) { // stripos ignora maiúsculas/minúsculas
                $resultado[] = $livro;
            }
        }
        return $resultado;
    }

    // Listar todos os livros
    public function listarLivros() {
        if (count($this->livros) == 0) {
            return "Nenhum livro cadastrado.";
        }

        $lista = "Livros na biblioteca " . $this->nome . ":<br>";
        foreach ($this->livros as $livro) {
            $lista .= "- " . $livro . "<br>";
        }
        return $lista;
    }
}

// Exemplo de uso
$biblioteca = new Biblioteca("Biblioteca Escolar");

$biblioteca->adicionarLivro("Anne de Greengables");
$biblioteca->adicionarLivro("Emma");
$biblioteca->adicionarLivro("Aristóteles e Dante");
$biblioteca->adicionarLivro("Harry Potter");

echo $biblioteca->listarLivros() . "<br>";

// Buscar por termo
$resultado = $biblioteca->buscarLivro("o");
echo "Resultado da busca por 'o':<br>";
foreach ($resultado as $livro) {
    echo "- " . $livro . "<br>";
}

?>
