<?php

    include '../classes/acesso.php';
    include '../classes/connectionFactory.php';
    include '../classes/logFeeder.php';

    $errorMsg = 'Você não tem permissão para acessar esse recurso.'; acesso::verifyAppliedAccess($_GET['userId'], 7) ? null : include ('error.php');
    $id = $_GET['id'];

    $query = 'DELETE FROM `tb_ticket` WHERE `tkt_id` = '.$id;
    $sql = connectionFactory::connect()->prepare($query);
    $sql->execute();
    $GET['url'] = 'relatorios.php';

    logFeeder::log($_GET['userId'], 'Exclusão de ticket '.$id);

    @header('Location: ../?url=relatorios');
    
?>
