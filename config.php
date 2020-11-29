<?php
// Inicia a sessão e cria a conexão com o banco de dados
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // var_dump(php_ini_loaded_file(), php_ini_scanned_files());
    // phpinfo();

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
