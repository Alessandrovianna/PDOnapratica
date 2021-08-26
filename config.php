<?php

$dsn = "mysql:dbname=controle_usuarios;host=127.0.0.1";
$dbuser = "root";
$dbpass = "P63H65P";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
 
} catch(PDOException $e) {
    echo "Falhou: ".$e->getMessage();
}

?>