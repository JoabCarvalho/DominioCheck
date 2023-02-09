<?php

// Arquivo de configuração do banco de dados
include_once 'db_config.php';

// Função para inserir domínio
if (isset($_POST['save'])) {
    // Valida os dados na entrada
    $link = $MySQLiconn->real_escape_string($_POST['link']);
    $cliente = $MySQLiconn->real_escape_string($_POST['cliente']);

    // Executa a função solicitada
    $SQL = $MySQLiconn->prepare("INSERT INTO dominio(link,cliente) VALUES(?,?)");
    $SQL->bind_param("ss", $link, $cliente);
    $SQL->execute();

    // Exibe uma mensagem caso haja erro na execução do script
    if (!$SQL) {
        echo $MySQLiconn->error;
    }
}

// Função para excluir domínio
if (isset($_GET['del'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->prepare("DELETE FROM dominio WHERE id_dominio=" . $_GET['del']);
    $SQL->bind_param("i", $_GET['del']);
    $SQL->execute();

    // Retorna a página anterior após executar a ação
    header("Location: dominio.php");
}

// Função para visualizar cadastro de domínio
if (isset($_GET['view'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->query("SELECT * FROM dominio WHERE id_dominio=" . $_GET['view']);

    // Retorna o resultado da query na array $getROW
    $getROW = $SQL->fetch_array();
}

// Função para buscar domínio para atualização
if (isset($_GET['edit'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->query("SELECT * FROM dominio WHERE id_dominio=" . $_GET['edit']);

    // Retorna o resultado da query na array $getROW
    $getROW = $SQL->fetch_array();
}

// Função para Atualizar domínio
if (isset($_POST['update'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->prepare("UPDATE dominio SET link=?, cliente=? WHERE id_dominio=?");
    $SQL->bind_param("ssi", $_POST['link'], $_POST['cliente'], $_GET['edit']);
    $SQL->execute();

    // Retorna a página anterior após executar a ação
    header("Location: dominio.php");
}

//Termos de pesquisa
if (empty($_POST['parametro'])) {
    $res = $MySQLiconn->query("SELECT * FROM usuario ORDER BY usuario.id_usuario");
} else {
    $parametro = $_POST['parametro'];
    $res = $MySQLiconn->query("SELECT * FROM usuario WHERE (usuario.id_usuario LIKE '%" . $parametro . "%' OR usuario.nome_usuario LIKE '%" . $parametro . "%' OR usuario.login LIKE '%" . $parametro . "%')");
}
