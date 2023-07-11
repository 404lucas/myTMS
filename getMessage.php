<?php
header('Content-Type: application/json');

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

$ticketId = $_GET['ticket_id'];

$sql = $pdo->prepare("SELECT `msg_id`, `msg_id_ticket`, `msg_from`, `msg_to`, `msg_content`, `msg_data_criacao`, `log_nome` FROM `tb_message` INNER JOIN `tb_login` ON `tb_message`.`msg_from` = `tb_login`.`log_id`  WHERE msg_id_ticket = '$ticketId' ORDER BY msg_data_criacao DESC
");
$sql->execute();
$return = $sql->fetchAll();
if ($sql->rowCount() >= 1) {
    echo json_encode($return);
} else {
    echo json_encode('Falha ao selecionar mensagens.');
}
?>