<!DOCTYPE html>
<html>
<head>
    <title> Recuperar senha | DFSecurity </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/Esqueceusuasenha.css">
    <link rel="icon" href="images/DFSecurity.png">
</head>
<body>
<div class="Esqueceusuasenha1">
    <h2> <a class="Esqueceusuasenha2" href="esqueci_senha.php" id="alternate" onmouseover="over ()" onmouseout="out ()"> Esqueceu sua senha </a> </h2>
    <hr>
    <p> Digite seu e-mail e você receberá um link para alterar sua senha. </p>
    <form action="" method="post">
        <input class="Email" type="text" name="email" placeholder="E-mail" required>
        <br> <br>
        <div class="button1"> <button type="submit" name="submit"> Recuperar senha </button> </div> 
    </form>
</div>
<script>

    function over () {
        document.getElementById("alternate").style.color = "white";
    }

    function out () {
        document.getElementById("alternate").style.color = "#2185d0";
    }

</script>
</body>
</html>
<?php

require 'database_connect.php';

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('E-mail enviado com sucesso!');</script>";
        } else {
            echo "<script>alert('E-mail não encontrado!');</script>";
        }
    }
}

?>

