<?php
// Feito por Sarah Rabelo e Isabela

abstract class Pessoa {
    public $nome;
    public $cpf;

    public function __construct($nome, $cpf) {
        $this->nome = $nome;
        $this->cpf = $cpf;
    }
}

class Aluno extends Pessoa {
    public $ra;

    public function __construct($nome, $cpf, $ra) {
        parent::__construct($nome, $cpf);
        $this->ra = $ra;
    }
}

class Professor extends Pessoa {
    public $siape;

    public function __construct($nome, $cpf, $siape) {
        parent::__construct($nome, $cpf);
        $this->siape = $siape;
    }
}

function criarPessoa() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $tipo = $_POST['tipo'];

        if ($tipo === 'aluno' && isset($_POST['ra']) && !empty($_POST['ra'])) {
            $ra = $_POST['ra'];
            return new Aluno($nome, $cpf, $ra);
        } elseif ($tipo === 'professor' && isset($_POST['siape']) && !empty($_POST['siape'])) {
            $siape = $_POST['siape'];
            return new Professor($nome, $cpf, $siape);
        }
    }
    return null; 
}

$pessoa = criarPessoa();

if ($pessoa instanceof Aluno) {
    echo "Aluno criado:<br>";
    echo "Nome: " . $pessoa->nome . "<br>";
    echo "CPF: " . $pessoa->cpf . "<br>";
    echo "RA: " . $pessoa->ra . "<br>";
} elseif ($pessoa instanceof Professor) {
    echo "Professor criado:<br>";
    echo "Nome: " . $pessoa->nome . "<br>";
    echo "CPF: " . $pessoa->cpf . "<br>";
    echo "SIAPE: " . $pessoa->siape . "<br>";
} else {
    echo "Nenhum registro criado. Por favor, preencha todos os campos corretamente.";
}
?>
