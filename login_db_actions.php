<?php

// Arquivo de configuração do banco de dados
include_once 'db_config.php';

// incluindo a classe session
require_once 'session.php';

if (isset($_POST['entrar'])) {

    $login = $_POST['login'];
    $senha = /*md5*/($_POST['senha']);

    // Executa a função solicitada
    $res = $MySQLiconn->query("SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' AND status = 1");

    if (mysqli_num_rows($res) <= 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos, preencha os dados corretamente!');window.location.href='login.php';</script>";
        die();
    } else {
        $row = $res->fetch_array();
        $id_usuario = $row['id_usuario'];
        $nome_usuario = $row['nome_usuario'];
        $login = $row['login'];
        $nivel = $row['nivel'];
        $status = $row['status'];

        // nova sessao
        $ses = new Session;
        // iniciando a sessao
        $ses->start();
        // tempo de sessao com 3600 seg. (1 hora)
        $ses->init(3600);
        // inserindo uma informação adicional na sessao
        $ses->addNode('id_usuario', $id_usuario);
        $ses->addNode('nome_usuario', $nome_usuario);
        $ses->addNode('login', $login);
        $ses->addNode('nivel', $nivel);
        $ses->addNode('status', $status);
        //redirecionando para página principal
        @header('Location: index.php');
    }
}