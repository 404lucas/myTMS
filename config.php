<?php

// Modifica a zona de tempo a ser utilizada.
date_default_timezone_set('America/Sao_Paulo');

@session_start();

@define('INCLUDE_PATH_PAINEL', '');

spl_autoload_register(function ($class_name) {
    include './classes/' . $class_name . '.php';
});

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>