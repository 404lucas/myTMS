<?php
header('Content-Type: application/json');
/*
$msgContent = $_POST['msg_content'];
$ticketId = $_POST['ticket_id'];
$sessionNome = $_POST['session_nome'];
$dataCriacao = date("Y-m-d H:i:s");

$sql = connectionFactory::connect()->prepare("INSERT INTO `tb_message` (`msg_id`, `msg_id_ticket`, `msg_from`, `msg_to`, `msg_content`, `msg_data_criacao`) VALUES (NULL, '$ticketId', '$sessionNome', 'Destinatário', '$msgContent', '$dataCriacao')");

$sql->execute();*/

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'dlog');

try {
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo '<h2>Conexão Falhou.</h2>';
}

$ticketId = $_POST['ticket_id'];
$sessionNome = $_POST['session_nome'];
$destinatario = 'Destinatário';
$msgContent = $_POST['msg_content'];
$dataCriacao = date("Y-m-d H:i:s");

$sql = $pdo->prepare("INSERT INTO `tb_message` (`msg_id`, `msg_id_ticket`, `msg_from`, `msg_to`, `msg_content`, `msg_data_criacao`) VALUES (NULL, '$ticketId', '$sessionNome', '$destinatario', '$msgContent', '$dataCriacao')");
$sql->execute();

if ($sql->rowCount() >=1){
    echo json_encode('Mensagem enviada com sucesso!');
}else{
    echo json_encode('Falha ao enviar mensagem.');
}
?>