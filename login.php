<?php
session_start();
require 'config.php'; 

if(isset($_POST['email']) && empty($_POST['email']) == false){
     $email = addslashes($_POST['email']);
     $senha = md5(addslashes($_POST['senha']));

     $sql = $pdo->query("SELECT * FROM users WHERE email = '$email' AND senha = '$senha'");
    
    if($sql->rowCount() > 0){

        $dado = $sql->fetch();

        $_SESSION['id'] = $dado['id'];

        header("Location: index.php");
    }
}
?>
<link rel="stylesheet" href="style.css">
<form method="POST">
    <h2>Login</h2>
    E-mail:<br/>
    <input type="email" name="email" autocomplete="off" /><br/><br/>
    Senha:<br/>
    <input type="password" name="senha" /><br/><br/>
    <input class="entrar" type="submit" value="Entrar" />
</form>