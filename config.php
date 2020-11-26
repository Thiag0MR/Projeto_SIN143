<?php
// Inicia a sessão e cria a conexão com o banco de dados
    session_start();

    global $pdo;

    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "temvagaai";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOExection $e) {
        echo $e->getMessage();
        exit;
    }

?>
