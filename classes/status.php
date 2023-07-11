<?php

class status
{

    private $sttaId;
    private $sttaIdStatus;
    private $sttaIdNfe;
    private $sttId;
    private $nome;
    private $descricao;
    private $cor;
    private $ocorrencia;
    private $hiddenPopular;
    private $descricaoPopular;
    private $finalizador;
    private $mobile;
    private $step;
    private $dataAlteracao;
    private $dataCriacao;

    // Método construtor
    public function __construct($sttaId, $sttaIdStatus, $sttaIdNfe, $sttId, $nome, $descricao, $cor, $ocorrencia, $hiddenPopular, $descricaoPopular, $finalizador, $mobile, $step, $dataAlteracao, $dataCriacao)
    {
        $this->sttaId = $sttaId;
        $this->sttaIdStatus = $sttaIdStatus;
        $this->sttaIdNfe = $sttaIdNfe;
        $this->sttId = $sttId;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->cor = $cor;
        $this->ocorrencia = $ocorrencia;
        $this->hiddenPopular = $hiddenPopular;
        $this->descricaoPopular = $descricaoPopular;
        $this->finalizador = $finalizador;
        $this->mobile = $mobile;
        $this->step = $step;
        $this->dataAlteracao = $dataAlteracao;
        $this->dataCriacao = $dataCriacao;
    }

    // Métodos para retornar os dados do usuário
    public function getSttaId()
    {
        return $this->sttaId;
    }
    public function getSttaIdStatus()
    {
        return $this->sttaIdStatus;
    }
    public function getSttaIdNfe()
    {
        return $this->sttaIdNfe;
    }
    public function getSttId()
    {
        return $this->sttId;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getCor()
    {
        return $this->cor;
    }

    public function getOcorrencia()
    {
        return $this->ocorrencia;
    }
    public function getHiddenPopular()
    {
        return $this->hiddenPopular;
    }
    public function getDescricaoPopular()
    {
        return $this->descricaoPopular;
    }
    public function getFinalizador()
    {
        return $this->finalizador;
    }
    public function getMobile()
    {
        return $this->mobile;
    }
    public function getStep()
    {
        return $this->step;
    }
    public function getDataAlteracao()
    {
        $data = new DateTime($this->dataAlteracao);
        $dataFormatada = $data->format("d/m/Y H:i");
        return $dataFormatada;
    }

    public function getDataCriacao()
    {
        $data = new DateTime($this->dataCriacao);
        $dataFormatada = $data->format("d/m/Y H:i");
        return $dataFormatada;
    }

    public static function requestStatus($idNfe)
    {
        $sql = connectionFactory::connect()->prepare(
            "SELECT `stta_id`, `stta_id_nfe`, `stta_id_status`, 
        `stt_id`, `stt_nome`, `stt_descricao`, `stt_cor`, `stt_ocorrencia`, `stt_hidden_popular`, `stt_descricao_popular`, `stt_finalizador`, `stt_mobile`, `stt_step`, `stta_data_alteracao`, `stt_data_criacao`
        FROM `tb_status_apply`

        LEFT JOIN `tb_status` ON `tb_status_apply`.`stta_id_status` = `tb_status`.`stt_id`
        WHERE `stta_id_nfe` = '$idNfe'
        ORDER BY `stta_id` DESC"
        );
        $sql->execute();

        $sql = $sql->fetchAll();
        return $sql;
    }

    public static function requestSingleStatusForNFE($idNfe)
    {
        $sql = connectionFactory::connect()->prepare(
            "SELECT `stta_id`, `stta_id_nfe`, `stta_id_status`, 
            `stt_id`, `stt_nome`, `stt_descricao`, `stt_cor`,`stt_descricao_popular`, `stta_data_alteracao`
            FROM `tb_status_apply`
            LEFT JOIN `tb_status` ON `tb_status_apply`.`stta_id_status` = `tb_status`.`stt_id`
            WHERE `stta_id_nfe` = '$idNfe'
            ORDER BY `stta_id` DESC
            LIMIT 1
            "
        );
        $sql->execute();

        $sql = $sql->fetch();
        return $sql;
    }

    public static function requestStatusTypes()
    {
        $types = connectionFactory::connect()->prepare("SELECT `stt_id`, `stt_cor`, `stt_nome` FROM `tb_status`");
        $types->execute();
        $types = $types->fetchAll();
        return $types;
    }

    public static function verifyFinished($idNfe)
    {
        $types = connectionFactory::connect()->prepare(
        "SELECT `stta_id`, `stt_finalizador`, `stt_id`
        FROM `tb_status_apply`
        INNER JOIN `tb_status`  ON `tb_status_apply`.`stta_id_status` = `tb_status`.`stt_id`
        WHERE `stta_id_nfe` = '$idNfe' AND `stt_finalizador` = 1"
        );
        $types->execute();

        return $types->rowCount() > 0;
    }

    public static function verifyHidden($idNfe)
    {
        $types = connectionFactory::connect()->prepare(
            "SELECT `stta_id`
        FROM `tb_status_apply`
        INNER JOIN `tb_status` AS `statustipo` ON `tb_status_apply`.`stta_id` = `statustipo`.`stt_id`
        WHERE `stta_id_nfe` = '$idNfe' AND `statustipo`.`stt_hidden_popular` = 1"
        );
        $types->execute();

        return $types->rowCount() > 0;
    }

    public static function verifyStep($idNfe, $step)
    {
        $lastResult = connectionFactory::connect()->prepare(
            "SELECT `stta_id`, `stta_id_nfe`, `stta_id_status`, `stt_step`
        FROM `tb_status_apply`
        INNER JOIN `tb_status` ON `tb_status_apply`.`stta_id_status` = `tb_status`.`stt_id`
        WHERE `stta_id_nfe` = '$idNfe'
        ORDER BY `stta_id` DESC LIMIT 1"
        );

        $lastResult->execute();
        $row = $lastResult->fetch();

        if ($row && $row['stt_step'] == $step) {
            echo 'current-item';
        } else {
            echo '';
        }
    }

}

?>