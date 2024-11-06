<?php

// Habilita ou esconde as mensgem de erro
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// error_reporting(0);
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);

// Fim da parte que Habilita ou esconde as mensgem de erro

// Função de autoload para carregar as classes automaticamente
// spl_autoload_register(function ($class) {
//     $file = __DIR__ . '/classes/' . $class . '.php';
//     if (file_exists($file)) {
//         require $file;
//     }
// });

// Fim Autoload

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require __DIR__ . '/public/landing.php';
        break;
    case '/home':
        require __DIR__ . '/public/landing.php';
        break;
    case '/login':
        require __DIR__ . '/public/login.php';
        break;
    case '/sair':
        require __DIR__ . '/public/logout.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/public/404.php';
        break;
}
?>
