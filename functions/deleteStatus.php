<?php
    include '../classes/acesso.php';
    include '../classes/connectionFactory.php';
    include '../classes/logFeeder.php';

    acesso::verifyAppliedAccess($_GET['userId'], 5) ? null : die('Você não tem permissão para acessar esse recurso.');
    $id = $_GET['id'];

    $sql = connectionFactory::connect()->prepare("DELETE FROM `tb_status_apply` WHERE `stta_id` = '$id'");
    $sql->execute();
    $GET['url'] = 'relatorios.php';

    logFeeder::log($_GET['userId'], 'Exclusão de status '.$id);

    @header('Location: ../?url=relatorios');
?>