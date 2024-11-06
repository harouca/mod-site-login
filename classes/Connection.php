<?php
// DEfinição do fuso horário do BD
date_default_timezone_set('America/Porto_Velho');

// Configurações do banco de dados
define('DB_HOST', 'mysql');
define('DB_NAME', 'db');
define('DB_USER', 'usuario');
define('DB_PASS', '123456');

// Conexão com o banco de dados

try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }

?>