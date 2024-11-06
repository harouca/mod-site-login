<?php
try {
    // Configurações do banco de dados
    $host = 'mysql';
    $db = 'db';
    $user = 'usuario';
    $pass = '123456';
    
    // Criação da conexão com PDO
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    
    // Configurações de erro do PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Dados a serem inseridos
    $id = null; // O ID pode ser nulo se for auto-incremento
    $usuario = 'harouca';
    $password_hash = password_hash('piscum', PASSWORD_DEFAULT);
    $data_cadastro = null; // Usará CURRENT_TIMESTAMP no SQL

    // Preparação da instrução SQL
    $sql = "INSERT INTO usuarios (id, usuario, password_hash, data_cadastro) VALUES (:id, :usuario, :password_hash, CURRENT_TIMESTAMP)";
    $stmt = $pdo->prepare($sql);

    // Vinculação dos parâmetros
    $stmt->bindParam(':id', $id, PDO::PARAM_NULL); // Para permitir NULL
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':password_hash', $password_hash);

    // Execução da instrução
    $stmt->execute();
    echo "Novo registro criado com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechamento da conexão
$pdo = null;
?>
