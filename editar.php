<?php
session_start();
require 'config.php';

$id = 0;
if(isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    $sql = "UPDATE users SET nome = '$nome', email = '$email' WHERE id = '$id'";
    $sql = $pdo->query($sql);

    header("Location: index.php");
}

    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0) {
        $dado = $sql->fetch();
    } else {
        header("Location: index.php");
    }
        
?>

<link rel="stylesheet" href="style.css">
<form method="POST">
    Nome:<br/>
    <input type="text" name="nome" value="<?php echo $dado['nome']; ?>" autocomplete="off" /><br/><br/>
    E-mail:<br/>
    <input type="email" name="email" value="<?php echo $dado['email']; ?>" autocomplete="off" /><br/><br/>
    <input class="cadastrar" type="submit" value="Editar" />
</form>