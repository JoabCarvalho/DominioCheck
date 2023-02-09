<?php
// incluindo a classe
require_once 'session.php';
// iniciando a sessao
$ses = new Session;
// iniciando a sessao
$ses->start();
// checando a sessao
if (!$ses->check()) {
    //imprimindo mensagem de status
    //echo $ses->status();
    //exit;
    //redirecionando para página principal
    @header('Location: login.php');
} else {
    // imprimindo tempo restante
    //echo "<br> Time left: " . $ses->getLeftTime();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Domínio Check</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Domínio Check</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Cadastros <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="usuario.php">Cadastro de Usuários</a></li>
                                    <li><a href="dominio.php">Cadastro de Domínios</a></li>
                                </ul>
                            </li>
                            <li><a href="monitor.php">Monitorar domínios</a></li>
                            <li><a href="log.php">Visualizar Log</a></li>
                            <li><a href="config.php?view=1">Configurações</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo "Bem vindo " . $ses->getNode('nome_usuario'); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Perfil</a></li>
                                    <li><a href="logout.php">Sair</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>