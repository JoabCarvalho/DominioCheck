<?php

// Arquivo de configuração do banco de dados
include_once 'db_config.php';

function converte_data_ini($_date = null) {
    $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
    if ($_date != null && preg_match($format, $_date, $partes)) {
        return $partes[3] . '-' . $partes[2] . '-' . $partes[1] . " 00:00:00";
    }
    return false;
}

function converte_data_fim($_date = null) {
    $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
    if ($_date != null && preg_match($format, $_date, $partes)) {
        return $partes[3] . '-' . $partes[2] . '-' . $partes[1] . " 23:59:59";
    }
    return false;
}

//Termos de pesquisa
if (empty($_POST['dt_inicial']) && empty($_POST['dt_final']) && empty($_POST['parametro'])) {
    $res = $MySQLiconn->query("SELECT * FROM log ORDER BY log.data_hora DESC LIMIT 50");
} elseif (empty($_POST['dt_inicial']) && empty($_POST['dt_final'])) {
	$parametro = $_POST['parametro'];
    $res = $MySQLiconn->query("SELECT * FROM log WHERE (log.nome_dominio LIKE '%" . $parametro . "%' OR log.cliente LIKE '%" . $parametro . "%' OR log.cod_erro LIKE '%" . $parametro . "%' OR log.descricao LIKE '%" . $parametro . "%')");
} elseif (empty($_POST['parametro'])) {
	$dt_ini = converte_data_ini($_POST['dt_inicial']);
	$dt_fim = converte_data_fim($_POST['dt_final']);
    $res = $MySQLiconn->query("SELECT * FROM log WHERE data_hora>= '" . $dt_ini . "' AND  data_hora<='" . $dt_fim . "'");
} else {
	$dt_ini = converte_data_ini($_POST['dt_inicial']);
	$dt_fim = converte_data_fim($_POST['dt_final']);
	$parametro = $_POST['parametro'];
    $res = $MySQLiconn->query("SELECT * FROM log WHERE (log.nome_dominio LIKE '%" . $parametro . "%' OR log.cliente LIKE '%" . $parametro . "%' OR log.cod_erro LIKE '%" . $parametro . "%' OR log.descricao LIKE '%" . $parametro . "%') AND log.data_hora>= '" . $dt_ini . "' AND  log.data_hora<='" . $dt_fim . "'");
}