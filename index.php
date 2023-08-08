<?php

//Default: incluir arquivo de configs básicas.
require 'config.php';

//Se não há sessão de andamento, retornar login, senão, control (página geral).
if(!loginServer::logged()){
    include ('login.php');
}else{
    $_SESSION['login'] = true;
    include('control.php');
}
