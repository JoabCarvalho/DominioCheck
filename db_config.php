<?php

// Seta o conteudo da página para utf8 - Resolve problemas com acentuação
header('Content-Type: text/html; charset=utf-8');
// Seta as configurações locais para Portugues brasileiro
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
// Seta o horário para local
date_default_timezone_set('America/Sao_Paulo');

// Define constantes para configuração de acesso ao banco de dados
define('_HOST_NAME', 'localhost'); // Endereço do servidor MySql
define('_DATABASE_NAME', 'dsc'); // Nome do banco de dados
define('_DATABASE_USER_NAME', 'root'); // Nome do usuário
define('_DATABASE_PASSWORD', ''); // Senha do usuário

// Cria um novo objeto de conexão ao banco de dados
$MySQLiconn = new MySQLi(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD, _DATABASE_NAME);
// Seta utf8 para a configuração do MySql, evitando erros de acentuação ao gravar registros no banco
$MySQLiconn->set_charset("utf8");

// Exibe uma mensagem caso haja erro na conexão com o banco de dados
if ($MySQLiconn->connect_errno) {
    die("ERROR : -> " . $MySQLiconn->connect_error);
}