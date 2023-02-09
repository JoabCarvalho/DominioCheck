<?php

// incluindo a classe
require_once 'session.php';
// iniciando a sessao
$ses = new Session;
// iniciando a sessao
$ses->start();
// destruindo a sessao
$ses->destroy();
// destruindo objeto
unset($ses);
// redirecionando para o form de login
@header('Location: login.php');