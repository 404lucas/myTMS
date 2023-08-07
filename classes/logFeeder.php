<?php

class logFeeder
{
    public static function log($userId, $action)
    {
        $date = date("Y-m-d h:i:s");
        $sql = connectionFactory::connect()->prepare("INSERT INTO `tb_log`(`lg_id`, `lg_id_autor`, `lg_acao`,`lg_data`) VALUES (NULL,'$userId','$action' ,'$date')");
        $sql->execute();
    }

    public static function logGetter($where, $type)
    {

        if ($where != '' && $type == 'user') {
            $sql = connectionFactory::connect()->prepare("SELECT `log_id` FROM `tb_login` WHERE `log_nome` LIKE '%$where%' ORDER BY `lg_data` DESC");
            $sql->execute();
            $condition = $where && $type == 'action' ? "WHERE lg_autor LIKE '%" . $where . "%'" : '';
        }
        $condition = $where && $type == 'action' ? "WHERE lg_acao LIKE '%" . $where . "%' OR lg_acao LIKE '%" . $where . "%'" : '';
        $sql = connectionFactory::connect()->prepare("SELECT `lg_id`, `lg_id_autor`, `lg_acao`,`lg_data`, `log_nome` FROM `tb_log` INNER JOIN `tb_login` ON `tb_log`.`lg_id_autor` = `tb_login`.`log_id` $condition ORDER BY `lg_data` DESC LIMIT 100");
        $sql->execute();

        return $sql;
    }
}
