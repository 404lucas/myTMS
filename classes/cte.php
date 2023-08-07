<?php

class cte
{

    private $id;
    private $chCTe;
    private $nCTe;
    private $cCT;
    private $sttCte;
    private $RNTRC;
    private $caf;
    private $nPesoRem;
    private $vBCRem;
    private $arquivoXML;


    // Método construtor
    public function __construct($id, $chCTe, $nCTe, $cCT, $sttCte, $RNTRC, $caf, $nPesoRem, $vBCRem, $arquivoXML)
    {
        $this->id = $id;
        $this->chCTe = $chCTe;
        $this->nCTe = $nCTe;
        $this->cCT = $cCT;
        $this->sttCte = $sttCte;
        $this->RNTRC = $RNTRC;
        $this->caf = $caf;
        $this->nPesoRem = $nPesoRem;
        $this->vBCRem = $vBCRem;
        $this->arquivoXML = $arquivoXML;
    }

    // Métodos para retornar os dados do usuário
    public function getId()
    {
        return $this->id;
    }
    public function getchCTe()
    {
        return $this->chCTe;
    }
    public function getNCTe()
    {
        return $this->nCTe;
    }
    public function getCCT()
    {
        return $this->cCT;
    }
    public function getSttCte()
    {
        return $this->sttCte;
    }
    public function getCaf()
    {
        return $this->caf;
    }
    public function getNPesoRem()
    {
        return $this->nPesoRem;
    }
    public function getVBCRem()
    {
        return $this->vBCRem;
    }

    public function getArquivoXML()
    {
        return $this->arquivoXML;
    }

    public static function getMainCTEData($chave){
        $sql = connectionFactory::connect()->prepare("SELECT `cte_id`, `cte_chCTe`, `cte_ide_nCT`, `cte_ide_cCT`, `cte_rem_infNF_vBC`, `cte_rem_infNF_nPeso`, `cte_arquivo_xml` FROM `tb_cte` WHERE `cte_chCTe` = '$chave' LIMIT 1");

        $sql->execute();
        $sql = $sql->fetch();

        return $sql;
    }    
}