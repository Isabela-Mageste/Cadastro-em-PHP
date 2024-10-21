<?php
//feito por sarah rabelo e isabela
abstract class Pessoa{ 
    
    public $nome;
    public $cpf;

    public function __construct($nome, $cpf){
        $this->nome = $nome;
        $this->cpf = $cpf;
    }
    public function postInclude($valor){
        $valor = $_POST[$valor];
    }   
    
}   
class Aluno extends Pessoa { 
    public $ra;

    public function __construct($ra) {
        parent::__construct($nome, $cpf);
        $this->ra = $ra;
    }
}

function criarAluno() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $ra = $_POST['ra'];

        $aluno = new Aluno($nome, $cpf, $ra);

        return $aluno; 
    }
    return null; 
}

$aluno = criarAluno();

if ($aluno) {
    echo "Nome: " . $aluno->nome . "<br>";
    echo "RA: " . $aluno->ra . "<br>";
}
class Professor extends Pessoa{ 
    public $siape;

    public function __construct($siape){
        $this->siape = $siape;
    }
}   

function criarProfessor() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $ra = $_POST['siape'];

        $professor = new Professor($nome, $siape);

        return $professor; 
    }
    return null; 
}

$professor = criarProfessor();

if ($professor) {
    echo "Nome: " . $professor->nome . "<br>";
    echo "siape: " . $professor->ra . "<br>";
}
?>
