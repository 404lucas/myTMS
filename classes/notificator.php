<?php

class notificator{

    public static function getLastNotification(){
        $sql = connectionFactory::connect()->prepare("SELECT * FROM `tb_comunicado` ORDER BY `com_id` DESC LIMIT 1");
        $sql->execute();
        $sql = $sql->fetch();

        return $sql;
    }

    public static function sendAnnouncement($userName, $title, $content){
        $date = date('Y-m-d H:i:s');
        $sql = connectionFactory::connect()->prepare("INSERT INTO `tb_comunicado`(`com_id`, `com_title`, `com_content`, `com_autor`, `com_data`) VALUES (NULL,'$title','$content','$userName','$date')");
        $sql->execute();        
    }

}
