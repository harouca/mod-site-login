<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

// Inclui o arquivo de conexão ao BD e inicia a sessão
require_once __DIR__ . '/../classes/Connection.php';
@session_start();

define('MAX_TENTATIVAS', 5);
define('TEMPO_BLOQUEIO', 900); // Tempo de bloqueio em segundos (15 minutos)

if (isset($_SESSION['user_id'])) {
    header("Location: home"); // Redireciona para a página 'home' se o usuário já está logado
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta o usuário no banco de dados
    $stmt = $pdo->prepare("SELECT id, password_hash, tentativas_login, status, data_bloqueio FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verifica se o usuário está bloqueado
        if ($user['status'] === 'bloqueado') {
            $tempoRestante = time() - strtotime($user['data_bloqueio']);
            if ($tempoRestante < TEMPO_BLOQUEIO) {
                $error = "Conta bloqueada. Tente novamente em " . (TEMPO_BLOQUEIO - $tempoRestante) . " segundos.";
            } else {
                // Desbloqueia a conta após o tempo de bloqueio e reseta tentativas
                $stmt = $pdo->prepare("UPDATE usuarios SET status = 'ativo', tentativas_login = 0, data_bloqueio = NULL WHERE id = :id");
                $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
                $stmt->execute();
                $user['status'] = 'ativo';
                $user['tentativas_login'] = 0;
            }
        }

        // Verifica a senha se o usuário não está bloqueado
        if ($user['status'] !== 'bloqueado') {
            if (password_verify($password, $user['password_hash'])) {
                // Login bem-sucedido: reseta tentativas de login e redireciona
                $_SESSION['user_id'] = $user['id'];
                $stmt = $pdo->prepare("UPDATE usuarios SET tentativas_login = 0 WHERE id = :id");
                $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
                $stmt->execute();
                header("Location: home");
                exit;
            } else {
                // Incrementa tentativas de login e verifica se deve bloquear a conta
                $tentativas = $user['tentativas_login'] + 1;
                if ($tentativas >= MAX_TENTATIVAS) {
                    $stmt = $pdo->prepare("UPDATE usuarios SET status = 'bloqueado', data_bloqueio = NOW(), tentativas_login = :tentativas WHERE id = :id");
                    $stmt->bindParam(':tentativas', $tentativas, PDO::PARAM_INT);
                    $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $error = "Conta bloqueada devido a muitas tentativas de login. Tente novamente mais tarde.";
                } else {
                    $stmt = $pdo->prepare("UPDATE usuarios SET tentativas_login = :tentativas WHERE id = :id");
                    $stmt->bindParam(':tentativas', $tentativas, PDO::PARAM_INT);
                    $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $error = "Usuário ou senha incorretos! Tentativa $tentativas de " . MAX_TENTATIVAS . ".";
                }
            }
        }
    } else {
        $error = "Usuário ou senha incorretos!";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button class="button" type="submit">Entrar</button>
    </form>
    </div>
</body>
</html>