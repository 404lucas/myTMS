<?php

class ticket
{
    public $id;
    public $idNfe;
    public $idAutor;
    public $idVolume;
    public $nomeAutor;
    public $conteudo;
    public $destinatarioTicket;
    public $visualizador;
    public $arquivo;
    public $finalizado;
    public $idFinalizador;
    public $nomeFinalizador;
    public $data;

    // Método construtor
    public function __construct($id, $idNfe, $idAutor, $idVolume, $nomeAutor, $conteudo, $destinatarioTicket, $visualizador, $arquivo, $finalizado, $idFinalizador, $nomeFinalizador, $dataCriacao)
    {
        $this->id = $id;
        $this->idNfe = $idNfe;
        $this->idAutor = $idAutor;
        $this->idVolume = $idVolume;
        $this->nomeAutor = $nomeAutor;
        $this->conteudo = $conteudo;
        $this->destinatarioTicket = $destinatarioTicket;
        $this->visualizador = $visualizador;
        $this->arquivo = $arquivo;
        $this->finalizado = $finalizado;
        $this->idFinalizador = $idFinalizador;
        $this->nomeFinalizador = $nomeFinalizador;
        $this->data = $dataCriacao;
    }

    // Métodos para retornar os dados do ticket
    public function getId()
    {
        return $this->id;
    }

    public function getIdNfe()
    {
        return $this->idNfe;
    }

    public function getAutor()
    {
        return $this->idAutor;
    }
    public function getIdVolume()
    {
        return $this->idVolume;
    }

    public function getNomeAutor()
    {
        return $this->nomeAutor;
    }

    public function getConteudo()
    {
        return $this->conteudo;
    }

    public function getFinalizado()
    {
        return $this->finalizado;
    }


    public function getIdFinalizador()
    {
        return $this->idFinalizador;
    }

    public function getNomeFinalizador()
    {
        return $this->nomeFinalizador;
    }

    public function getDestinatarioTicket()
    {
        return $this->destinatarioTicket;
    }


    public function getVisualizador()
    {
        if ($this->visualizador == 'dlogedestinatario') {
            return 'Dlog e Destinatário';
        } elseif ($this->visualizador == 'dlogremetenteedestinatario') {
            return 'Dlog, remetente e destinatário';
        }
    }

    public function getArquivo()
    {
        return $this->arquivo;
    }

    public function getDataCriacao()
    {
        $data = new DateTime($this->data);
        $dataFormatada = $data->format("d/m/Y H:i");
        return $dataFormatada;
    }


    public function sendTicket($ticket)
    {
        $idNfe = $ticket->idNfe;
        $idAutor = $ticket->idAutor;
        $conteudo = $ticket->conteudo;
        $idVolume = $ticket->idVolume;
        $destinatarioTicket = $ticket->destinatarioTicket;
        $visualizador = $ticket->visualizador;
        $arquivo = $ticket->arquivo;
        $data = date("Y-m-d H:i:s"); 

        $idVolume == "*" ? $idVolume = 'NULL' : NULL;

        $query = "INSERT INTO `tb_ticket` (`tkt_id`, `tkt_id_nfe`, `tkt_id_autor`, `tkt_id_volume`, `tkt_conteudo`, `tkt_destinatario`, `tkt_visualizador`, `tkt_arquivo`,`tkt_data_criacao`) VALUES (NULL, '$idNfe', '$idAutor', $idVolume, '$conteudo', '$destinatarioTicket', '$visualizador', '$arquivo', '$data')";
        $sql = connectionFactory::connect()->prepare($query);
        $sql->execute();
        
    }

    public function sendTicketDestinatario($ticket)
    {
        $idNfe = $ticket->idNfe;
        $idAutor = $ticket->idAutor;
        $conteudo = $ticket->conteudo;
        $idVolume= $ticket->idVolume;
        $destinatarioTicket = $ticket->destinatarioTicket;
        $visualizador = $ticket->visualizador;
        $arquivo = $ticket->arquivo;
        $data = date("Y-m-d H:i:s");

        $idVolume == "*" ? $idVolume = 'NULL' : NULL;

        $sql = connectionFactory::connect()->prepare("INSERT INTO `tb_ticket` (`tkt_id`, `tkt_id_nfe`, `tkt_id_autor`, `tkt_id_volume`, `tkt_conteudo`, `tkt_destinatario`, `tkt_visualizador`, `tkt_arquivo`,`tkt_data_criacao`) VALUES (NULL, '$idNfe', NULL, $idVolume, '$conteudo', '$destinatarioTicket', '$visualizador', '$arquivo', '$data')");
        $sql->execute();

    }

    public static function requestTicketsLeftJoined($id, $condition)
    {
        $sql = connectionFactory::connect()->prepare(
            "SELECT t1.tkt_id, t1.tkt_id_nfe, t1.tkt_id_autor, t1.tkt_id_volume, t1.tkt_conteudo, t1.tkt_destinatario, t1.tkt_visualizador, t1.tkt_arquivo, t1.tkt_finalizado, t1.tkt_id_finalizador, t1.tkt_data_criacao, finalizador.log_nome AS finalizador_nome, autor.log_nome AS autor_nome
            FROM tb_ticket AS t1

            LEFT JOIN tb_login AS autor ON t1.tkt_id_autor = autor.log_id
            LEFT JOIN tb_login AS finalizador ON t1.tkt_id_finalizador = finalizador.log_id

            WHERE t1.tkt_id_nfe = $id $condition
            ORDER BY t1.tkt_data_criacao DESC
        "
        );
        $sql->execute();
        $sql = $sql->fetchAll();

        return $sql;
    }

    public static function requestSingleTicketLeftJoined($ticketId)
    {
        $sql = connectionFactory::connect()->prepare(
            "SELECT t1.tkt_id, t1.tkt_id_nfe, t1.tkt_id_autor, autor.log_nome AS autor_nome, t1.tkt_conteudo, t1.tkt_destinatario, t1.tkt_visualizador, t1.tkt_arquivo, t1.tkt_finalizado, t1.tkt_id_finalizador, finalizador.log_nome AS finalizador_nome, autor.log_nome AS autor_nome t1.tkt_data_criacao
            FROM tb_ticket AS t1
            
            LEFT JOIN tb_login AS autor ON t1.tkt_id_autor = autor.log_id
            LEFT JOIN tb_login AS finalizador ON t1.tkt_id_finalizador = finalizador.log_id
            
            WHERE t1.tkt_id = $ticketId
            ORDER BY t1.tkt_data_criacao DESC"
        );
        $sql->execute();
        $sql = $sql->fetch();

        return $sql;
    }

    public function finishTicket($ticketId, $idFinalizador)
    {
        $sql = connectionFactory::connect()->prepare("UPDATE `tb_ticket` SET `tkt_finalizado` = 1, `tkt_id_finalizador` = '$idFinalizador' WHERE `tkt_id` = '$ticketId'");
        $sql->execute();
    }
}

        /*
        NOVOS CAMPOS:
        idAutor, 
        nomeAutor,
        finalizado 
        id finalizador, 
        nomeFinalizador, 
        */

?>