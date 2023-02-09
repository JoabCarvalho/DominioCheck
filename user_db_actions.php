<?php

// Arquivo de configuração do banco de dados
include_once 'db_config.php';

// Função para inserir usuario
if (isset($_POST['save'])) {
    // Valida os dados na entrada
    $nome_usuario = $MySQLiconn->real_escape_string($_POST['nomeUsuario']);
    $login = $MySQLiconn->real_escape_string($_POST['login']);
    $senha = $MySQLiconn->real_escape_string($_POST['senha']);
    $nivel = $MySQLiconn->real_escape_string($_POST['nivel']);
    $status = $MySQLiconn->real_escape_string($_POST['status']);
    
    // Executa a função solicitada
    $SQL = $MySQLiconn->prepare("INSERT INTO usuario(nome_usuario,login,senha,nivel,status) VALUES(?,?,?,?,?)");
    $SQL->bind_param("sssii", $nome_usuario, $login, $senha, $nivel, $status);
    $SQL->execute();

    // Exibe uma mensagem caso haja erro na execução do script
    if (!$SQL) {
        echo $MySQLiconn->error;
    }
    header("Location: usuario.php");
}

// Função para excluir domínio
if (isset($_GET['del'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->prepare("DELETE FROM usuario WHERE id_usuario=" . $_GET['del']);
    $SQL->bind_param("i", $_GET['del']);
    $SQL->execute();

    // Retorna a página anterior após executar a ação
    header("Location: usuario.php");
}

// Função para visualizar cadastro de usuario
if (isset($_GET['view'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->query("SELECT * FROM usuario WHERE id_usuario=" . $_GET['view']);

    // Retorna o resultado da query na array $getROW
    $getROW = $SQL->fetch_array();
}

// Função para buscar usuario para atualização
if (isset($_GET['edit'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->query("SELECT * FROM usuario WHERE id_usuario=" . $_GET['edit']);

    // Retorna o resultado da query na array $getROW
    $getROW = $SQL->fetch_array();
}

// Função para Atualizar usuario
if (isset($_POST['update'])) {
    // Executa a função solicitada
    $SQL = $MySQLiconn->prepare("UPDATE usuario SET nome_usuario=?, login=?, senha=?, nivel=?, status=? WHERE id_usuario=?");
    $SQL->bind_param("sssiii", $_POST['nomeUsuario'], $_POST['login'], $_POST['senha'], $_POST['nivel'], $_POST['status'], $_GET['edit']);
    $SQL->execute();

    // Retorna a página anterior após executar a ação
    header("Location: usuario.php");
}

//Termos de pesquisa
if (empty($_POST['parametro'])) {
    $res = $MySQLiconn->query("SELECT * FROM usuario ORDER BY usuario.id_usuario");
} else {
    $parametro = $_POST['parametro'];
    $res = $MySQLiconn->query("SELECT * FROM usuario WHERE (usuario.id_usuario LIKE '%" . $parametro . "%' OR usuario.nome_usuario LIKE '%" . $parametro . "%' OR usuario.login LIKE '%" . $parametro . "%')");
}