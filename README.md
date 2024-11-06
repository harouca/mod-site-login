<h1 align="center">Modelo para site - Módulo de LOGIN</h1>
Template para site de login e senha, sendo direcionado a uma landpage caso usuário tenha sucesso de login.

## Introdução

Bem-vindo ao projeto **Template de Login com Landpage**! Este repositório contém um modelo simples e eficaz para implementar uma tela de login em seu site, acompanhado de uma landpage atraente.

### Recursos
- Linguagem: PHP 8.0
- Banco de dados (Database): Mysql
- PHPMyadmin para gerenciamento do Banco de Dados.
- Docker - Rodando em docker.

### Funcionalidades

- **Tela de Login**: Permite que os usuários insiram suas credenciais (usuário e senha) de forma intuitiva.
- **Segurança**: Após cinco tentativas de login mal-sucedidas, a conta do usuário será bloqueada por 15 minutos (900 segundos), garantindo uma camada extra de proteção contra acessos não autorizados.
- **Redirecionamento**: Uma vez que o login é bem-sucedido, o usuário é automaticamente direcionado para uma landpage, proporcionando uma transição suave e agradável.

### Objetivo

Este template foi desenvolvido para facilitar a implementação de funcionalidades básicas de autenticação em projetos web, oferecendo um ponto de partida sólido para desenvolvedores que desejam integrar um sistema de login seguro e eficiente em suas aplicações.

Sinta-se à vontade para explorar o código, fazer modificações e adaptá-lo às suas necessidades. Esperamos que este projeto seja útil e inspire suas próximas criações!

### Repositório Oficial do projeto
- https://github.com/harouca/mod-site-login

### Desenvolvimento
- Autor (Author): Humberto Vilar Arouca - <a href = https://github.com/harouca>Git Autor</a>

### Detalhes para uso
- No CSS, a pasta css/bootstrap-5.3.3/ é ignorada para que não suba para o github. Quando for usar o código baixar o bootstrap para a pasta local ou mude a opção no arquivo /includes/header.php para que use CDN.
"<link rel="stylesheet" href="../css/bootstrap-5.3.3/css/bootstrap-grid.min.css">" para o valor abaixo (sem aspas inicial e final).
"<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">"