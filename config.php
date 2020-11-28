<?php
// Inicia a sessão e cria a conexão com o banco de dados
    session_start();

    global $pdo;

    $servername = "localhost:3306";
    $username = "root";
    $password = "123456";
    $dbname = "temVagaAi";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExection $e) {
        echo $e->getMessage();
        exit;
    }

?>
