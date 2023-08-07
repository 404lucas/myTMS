<?php

class statusApply
{
    private $sttaIdStatus;
    private $sttaIdNfe;
    private $autor;
    private $sttaDataAlteracao;

    public function __construct($sttaIdStatus, $sttaIdNfe, $autor, $sttaDataAlteracao)
    {
        $this->sttaIdStatus = $sttaIdStatus;
        $this->sttaIdNfe = $sttaIdNfe;
        $this->autor = $autor;
        $this->sttaDataAlteracao = $sttaDataAlteracao;
    }

    public function sendStatus($currentStatusApply)
    {
        $idStatus = $currentStatusApply->sttaIdStatus;
        $idNfe = $currentStatusApply->sttaIdNfe;
        $autor = $currentStatusApply->autor;

        if ($currentStatusApply->sttaDataAlteracao == NULL || $currentStatusApply->sttaDataAlteracao = "1969-12-31 21:00:00") {
            $dataHora = date('Y-m-d H:i:s');
        }else{
            $dataHora = $currentStatusApply->sttaDataAlteracao;
        }
        $dataFormated = date('Y-m-d H:i:s', strtotime($dataHora));

        $sql = connectionFactory::connect()->prepare("INSERT INTO `tb_status_apply`(`stta_id`, `stta_id_nfe`, `stta_id_status`, `stta_autor`, `stta_data_alteracao`) VALUES (NULL,'$idNfe','$idStatus', '$autor', '$dataFormated')");
        $sql->execute();
    }

}

?>