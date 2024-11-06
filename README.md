# Modelo para site - Módulo LOGIN
### Template para site. Uso de código para modelo.
O código consiste em uma tela de login para inserir usuário e senha do site. Conta com o recurso que após 5 tentativas de login mal sucedido a conta do usuário ficará bloqueada por 15 minutos (900 segundos).
Após a tentativa de sucesso, o usuário é direcionado a uma landpage.

### Repositório Oficial do Visit
- https://github.com/harouca/mod-site-login

### Desenvolvimento
- Autor (Author): Humberto Vilar Arouca - <a href = https://github.com/harouca>Git Autor</a>

### Recursos
- Linguagem: PHP 8.0
- Banco de dados (Database): Mysql
- PHPMyadmin para gerenciamento do Banco de Dados.
- Docker - Rodando em docker.

### Detalhes para uso
- No CSS, a pasta css/bootstrap-5.3.3/ é ignorada para que não suba para o github. Quando for usar o código baixar o bootstrap para a pasta local ou mude a opção no arquivo /includes/header.php
"<link rel="stylesheet" href="../css/bootstrap-5.3.3/css/bootstrap-grid.min.css">" para o valor abaixo (sem aspas inicial e final).
"<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">"

