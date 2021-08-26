<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

} else {
    header("Location: login.php");
}

require 'config.php'; 
?>
<link rel="stylesheet" href="style.css">
    <a class="add" href="adicionar.php">Adicionar Usuário</a><br/><br/>
    <table border="1" width="60%" style="text-align:center;">
        <tr class="table-title">
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        <?php
        $sql = "SELECT * FROM users";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $usuario) {
                echo '<tr class="tr-body">';
                echo '<td>'.$usuario['nome'].'</td>';
                echo '<td>'.$usuario['email'].'</td>';
                echo '<td><a class="button" href="editar.php?id='.$usuario['id'].'">Editar</a> - 
                        <a class="button2" href="excluir.php?id='.$usuario['id'].'">Excluir</a>
                    </td>';
                echo '</tr>';
                
            }
        }
        ?>
    </table><br>
    <a class="exit" href="sair.php">Sair</a><br/><br/>