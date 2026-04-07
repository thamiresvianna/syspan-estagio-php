<?php
    require_once 'conexao.php';

    $testeRapido = $pdo->query("SELECT 1")->fetch();

    echo "Conectado ao banco de dados!";
?>