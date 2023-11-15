<?php

class Cadastrar {
    private $id;
    private $nome;
    private $sobrenome;
    private $data_nascimento;
    private $email;
    private $senha;
    private $pdo;

    public function __construct() {
        $host = '127.0.0.1';
        $user = 'root';
        $password = '';
        $database = 'dfsecurity';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $password, $options);
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getDatanascimento() {
        return $this->data_nascimento;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setDatanascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function inserirUsuarios($nome, $sobrenome, $cpf, $data_nascimento, $email, $senha) {
        $sql = 'INSERT INTO usuarios (nome, sobrenome, cpf, data_nascimento, email, senha) VALUES (:n, :sn, :c, :dt_n, :e, :s)';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':n', $nome);
        $stmt->bindValue(':sn', $sobrenome);
        $stmt->bindValue(':c', $cpf);
        $stmt->bindValue(':dt_n', $data_nascimento);
        $stmt->bindValue(':e', $email);
        $stmt->bindValue(':s', $senha);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
    
}

?>
