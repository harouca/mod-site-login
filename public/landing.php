<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include(__DIR__ . '/../classes/Checklogin.php');
check_login();

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include './includes/head.php' ?>
<body>
    <div class="container">
        <h2>Bem-vindo ao site!</h2>
        <p>Você está logado.</p>
        <a href="sair">Sair</a>
    </div>
    
    
<?php include './includes/footer.php' ?>
</body>
</html>
