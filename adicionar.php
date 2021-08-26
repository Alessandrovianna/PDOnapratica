<?php
session_start();
require 'config.php'; 

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "INSERT INTO users SET nome = '$nome', email = '$email', senha = '$senha' ";
    $sql = $pdo->query($sql);

    header("Location: index.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="POST">
    Nome:<br/>
    <input type="text" name="nome" autocomplete="off" /><br/><br/>
    E-mail:<br/>
    <input type="email" name="email" autocomplete="off" /><br/><br/>
    Senha:<br/>
    <input type="password" name="senha" /><br/><br/>
    <input class="cadastrar" type="submit" value="Cadastrar" />
</form>