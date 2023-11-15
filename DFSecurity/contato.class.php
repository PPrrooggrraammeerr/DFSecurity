<?php

class Contato {

    private $id;
    private $nome;
    private $email;
    private $mensagem;
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

    public function getEmail() {
        return $this->email;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function enviarContato($nome, $email, $mensagem) {

        $sql = 'SELECT id FROM usuarios WHERE nome = :nome AND email = :email';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nome' => $nome, ':email' => $email]);

        if ($stmt->rowCount() > 0) {

            $usuario_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

            $sql = 'INSERT INTO contato (usuario_id, mensagem) VALUES (:usuario_id, :mensagem)';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':usuario_id' => $usuario_id, ':mensagem' => $mensagem]);
            
            return true;
        } else {
            return false;
        }
    }
}

?>
