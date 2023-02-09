<?php

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