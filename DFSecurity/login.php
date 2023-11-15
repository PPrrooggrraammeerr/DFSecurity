<!DOCTYPE html> 
<html>
<head>
    <title> Login / Registrar | DFSecurity </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/LoginRegistrar.css">
    <link rel="icon" type="text/css" href="images/DFSecurity.png">
    <script type="text/javascript" src="JavaScript/Alternatecolors.js"> </script>
    <script type="text/javascript" src="JavaScript/CalculationCPF.js"> </script>
</head>
<br>
<body>
    <form class="LoginRegistrar" method="POST">
        <div>
            <h2> <a class="Acessesuaconta" href="login.php" id="alternate" onmouseover="over ()" onmouseout="out ()"> Acesse sua conta </a> </h2>
            <br>
            <input class="loginCPF" id="myCPF" type="text" name="cpf" required placeholder="CPF" onblur="verifyCPF (this);" maxlength="14" onkeydown="formatMask (this, meuCPF);">
            <div>
                <br>
            </div>
            <span id="cpfResponse"> </span>
            <div>
                <br>
            </div>
            <input class="SenhaLogin" type="password" name="password" required placeholder="Senha">
        </div>
        <br>
        <div class="buttons-container">
            <div class="button1"> 
                <button type="submit" name="login"> Login </button>
            </div> 
            <div class="button2"> 
                <a href="cadastrar.php" class="account-button"> Não tenho conta </a> 
            </div>
        </div>
        <br> <br>
        <hr> <br>
        <div class="Esqueceusuasenha">
            <a href="esqueci_senha.php" id="alternate1" onmouseover="over1 ();" onmouseout="out1 ();"> Esqueceu sua senha? </a>
        </div>
    </form>
</body>
</html>
<?php

include 'usuario.class.php';

$user = new Usuario();

if (isset($_POST['login'])) {
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
    $password = isset($_POST['password']) ? md5(addslashes($_POST['password'])) : "";

    $verify = $user->verificarCredenciais($cpf, $password);

    if ($verify) {
        echo "<script> alert('Successful login!')</script>";
    } else {
        header('Location: login.php');
    }
}

?>
