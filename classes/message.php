<?php

class message
{
    private $id;
    private $idTicket;
    private $from;
    private $to;
    private $content;
    private $dataCriacao;

    // Método construtor
    public function __construct($id, $idTicket, $from, $to, $content, $dataCriacao)
    {
        $this->id = $id;
        $this->idTicket = $idTicket;
        $this->from = $from;
        $this->to = $to;
        $this->content = $content;
        $this->dataCriacao = $dataCriacao;
    }

    // Métodos para retornar os dados do ticket
    public function getId()
    {
        return $this->id;
    }

    public function getIdTicket()
    {
        return $this->idTicket;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }
    public function getContent()
    {
        return $this->content;
    }

    public function getDataCriacaot()
    {
        return $this->dataCriacao;
    }

    public function getDataCriacao()
    {
        $data = new DateTime($this->dataCriacao);
        $dataFormatada = $data->format("d/m/Y H:i");
        return $dataFormatada;
    }

    public function sendMessage($msg)
    {
        $id = $msg->id;
        $idTicket = $msg->idTicket;
        $from = $msg->from;
        $to = $msg->to;
        $content = $msg->content;
        $dataCriacao = date("Y-m-d H:i:s");

        $sql = connectionFactory::connect()->prepare("INSERT INTO `tb_message` (`msg_id`, `msg_id_ticket`, `msg_from`, `msg_to`, `msg_content`, `msg_data_criacao`) VALUES (NULL, '$idTicket', '$from', '$to', '$content', '$dataCriacao')");
        $sql->execute();
    }

    public static function requestMsgs($ticketId)
    {
        $sql = connectionFactory::connect()->prepare("SELECT * FROM `tb_message` WHERE `msg_id_ticket` = '$ticketId' ORDER BY `msg_data_criacao` ASC");
        $sql->execute();
        $sql = $sql->fetchAll();

        return $sql;
    }

    public function messageIdentifier($sent, $session)
    {
        if ($sent == $session) {
            return 'me';
        } else {
            return 'him';
        }
    }
}

?>