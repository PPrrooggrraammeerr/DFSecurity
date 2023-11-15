<!DOCTYPE html> 
<html>
<head>
    <title> Cadastrar-se | DFSecurity </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/Cadastrar.css">
    <link rel="icon" type="text/css" href="images/DFSecurity.png">
    <script type="text/javascript" src="JavaScript/CalculationCPF.js"> </script>
</head>
<br>
<body>
<div class="LoginRegistrar" method=POST>
    <h2> <a class="CadastrarRegistrar" href="cadastrar.php" id="alternate" onmouseover="over ();" onmouseout="out ();"> Cadastrar ou Registrar-se </a> </h2>
    <br>
    <form method="POST">
        <input class="Nome" type="text" name="nome" required placeholder="Nome">
        <input class="Sobrenome" type="text" name="sobrenome" required placeholder="Sobrenome">
        <br> <br>
        <div>
            <input class="CPFCadastrar" id="myCPF" type="text" name="cpf" required placeholder="CPF" onblur="verifyCPF (this);" maxlength="14" onkeydown="formatMask (this, meuCPF);">
            <input class="DataNascimento" type="date" name="data_nascimento" required placeholder="Data de nascimento">
            <br> <br>
            <span id="cpfResponse"> </span>
        </div>
        <br>
        <input class="Email" type="text" name="email" required placeholder="E-mail">
        <br> <br>
        <input class="SenhaLogin" type="password" name="senha" required placeholder="Senha">
        <br> <br>
        <div class="buttons-container">
            <div class="button1"> 
                <button type="submit" class="submit-button"> Registrar-se </button>
            </div>
            <div class="button2"> 
                <a href="login.php" class="account-button"> Já tenho uma conta </a>
            </div>
        </div>
    </form>
    <br> <br>
    <hr align="left"> <br>
    <div class="options">
        <left> <a href="index.html"> <h9 id="alternate1" onmouseover="over1 ();" onmouseout="out1 ();"> Home </h9> </a> |      
        <a href="contato.php"> <h9 id="alternate2" onmouseover="over2 ();" onmouseout="out2 ();"> Contato </h9> </a> | 
        <a href="TermosDeUso.html"> <h9 id="alternate3" onmouseover="over3 ();" onmouseout="out3 ();"> Termos de uso </h9> </a> </left>
    </div>
</div>
<script>

    function over () {
        document.getElementById ("alternate").style.color = "white";
    }

    function out () {
        document.getElementById ("alternate").style.color = "#2185d0";
    }

    function over1 () {
        document.getElementById ("alternate1").style.color = "white";
    }

    function out1 () {
        document.getElementById ("alternate1").style.color = "darkgrey";
    }

    function over2 () {
        document.getElementById ("alternate2").style.color = "white";
    }

    function out2 () {
        document.getElementById ("alternate2").style.color = "darkgrey";
    }

    function over3 () {
        document.getElementById ("alternate3").style.color = "white";
    }

    function out3 () {
        document.getElementById ("alternate3").style.color = "darkgrey";
    }

</script>
</div>
</body>
</html>
<?php

require 'cadastrar.class.php';

$users = new Cadastrar();

if (isset($_POST['email'])) {
    $name = isset($_POST['nome']) ? $_POST['nome'] : "";
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : "";
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
    $data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['senha']) ? md5(addslashes($_POST['senha'])) : "";

    $included = $users->inserirUsuarios($name, $sobrenome, $cpf, $data_nascimento, $email, $password);

    if ($included) {
        echo "<script> alert('Usuário cadastrado com sucesso!');</script>";
    } else {
        header('Location: cadastrar.php');
    }
    
}

?>
