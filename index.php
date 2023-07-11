<?php

//Default: incluir arquivo de configs básicas.
include 'config.php';

//Se não há sessão de andamento, retornar login, senão, control (página geral).
if(loginServer::logged() == false){
    include ('login.php');
}else{
    include('control.php');
}


?>