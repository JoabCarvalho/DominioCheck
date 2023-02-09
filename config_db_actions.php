<?php

// Arquivo de configuração do banco de dados
include_once 'db_config.php';

// Função para inserir domínio
if (isset($_POST['save'])) {
    // Valida os dados na entrada
    $nome_empresa = $MySQLiconn->real_escape_string($_POST['nome_empresa']);
    $tempo_refresh = $MySQLiconn->real_escape_string($_POST['tempo_refresh']);
    $email_admin = $MySQLiconn->real_escape_string($_POST['email_admin']);

    // Executa a função solicitada
    $SQL = $MySQLiconn->prepare("INSERT INTO dominio(nome_empresa,tempo_refresh,email_admin) VALUES(?,?,?)");
    $SQL->bind_param("sis", $nome_empresa, $tempo_refresh, $email_admin);
    $SQL->execute();

    // Exibe uma mensagem caso haja erro na execução do script
    if (!$SQL) {
        echo $MySQLiconn->error;
    }
}

// Função para visualizar cadastro de domínio
if (isset($_GET['view'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->query("SELECT * FROM config WHERE id_config=" . $_GET['view']);

    // Retorna o resultado da query na array $getROW
    $getROW = $SQL->fetch_array();
}

// Função para buscar domínio para atualização
if (isset($_GET['edit'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->query("SELECT * FROM config WHERE id_config=" . $_GET['edit']);

    // Retorna o resultado da query na array $getROW
    $getROW = $SQL->fetch_array();
}

// Função para Atualizar domínio
if (isset($_POST['update'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->prepare("UPDATE config SET nome_empresa=?, tempo_refresh=?, email_admin=? WHERE id_config=?");
    $SQL->bind_param("sisi", $_POST['nome_empresa'], $_POST['tempo_refresh'], $_POST['email_admin'], $_GET['edit']);
    $SQL->execute();

    // Retorna a página anterior após executar a ação
    header("Location: config.php?view=1");
}

//Termos de pesquisa
if (empty($_POST['parametro'])) {
    $res = $MySQLiconn->query("SELECT * FROM dominio ORDER BY dominio.id_dominio");
} else {
    $parametro = $_POST['parametro'];
    $res = $MySQLiconn->query("SELECT * FROM dominio WHERE (dominio.id_dominio LIKE '%" . $parametro . "%' OR dominio.link LIKE '%" . $parametro . "%' OR dominio.cliente LIKE '%" . $parametro . "%')");
}