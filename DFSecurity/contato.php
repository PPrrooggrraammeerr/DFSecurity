<!DOCTYPE html> 
<html>
<head>
    <title> Contato | DFSecurity </title>
    <link rel="stylesheet" type="text/css" href="styles/Contato.css">
    <link rel="icon" type="text/css" href="images/DFSecurity.png">
</head>
<body>
<form class="Contato1" method="post">
        <div>
            <h2><a class="Contato2" href="contato.html" id="alternate" onmouseover="over()" onmouseout="out()">Contato</a></h2>
            <hr>
            <br>
            <input class="Nome" type="text" name="nome" placeholder="Nome" required>
            <br><br>
            <input class="Email" type="text" name="email" placeholder="E-mail" required>
            <br><br>
            <textarea cols="50" rows="10" name="mensagem" maxlength="" placeholder="Mensagem" required></textarea>
            <br><br>
            <div class="button1">
                <button type="submit">Enviar</button>
            </div>
        </div>
    </form>
<script>

    function over () {
        document.getElementById ("alternate").style.color = "white";
    }

    function out () {
        document.getElementById ("alternate").style.color = "#2185d0";
    }

</script>
</body>
</html>
<?php

include 'contato.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    $contato = new Contato();
    $resultado = $contato->enviarContato($nome, $email, $mensagem);

    if ($resultado) {
        echo "<script> alert('Mensagem enviada com sucesso!'); window.location.href='index.html'; </script>";
    } else {
        echo "<script> alert('Usuário não encontrado!'); window.location.href='contato.php'; </script>";
    }
}

?>