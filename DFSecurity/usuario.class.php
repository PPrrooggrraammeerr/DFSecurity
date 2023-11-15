<?php

class Usuario {
    private $id;
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

    public function getCpf() {
        return $this->cpf;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function verificarCredenciais($cpf, $senha) {
        $sql = 'SELECT * FROM usuarios WHERE cpf = :cpf AND senha = :senha';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>
