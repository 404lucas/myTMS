<?php

class volume
{
    private $id;
    private $idNfe;
    private $item;
    private $codigo;
    private $altura;
    private $largura;
    private $peso;    
    private $comprimento;

    public function __construct($id, $idNfe, $item, $codigo, $altura, $largura, $peso, $comprimento)
    {
        $this->id = $id;
        $this->idNfe = $idNfe;
        $this->item = $item;
        $this->codigo = $codigo;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->largura = $largura;
        $this->comprimento = $comprimento;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getIdNfe()
    {
        return $this->idNfe;
    }
    public function getItem()
    {
        return $this->item;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getAltura()
    {
        return $this->altura;
    }
    public function getLargura()
    {
        return $this->largura;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function getComprimento()
    {
        return $this->comprimento;
    }

    public static function getIdsByNfe($idNfe){
        $sql = connectionFactory::connect()->prepare("SELECT `vol_id` FROM `tb_volume` WHERE `vol_id_nfe` = '$idNfe'");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public static function getAllData($idNfe){
        $sql = connectionFactory::connect()->prepare("SELECT `vol_id`, `vol_id_nfe`, `vol_item`, `vol_codigo`, `vol_peso`, `vol_largura`, `vol_altura`, `vol_comprimento` FROM `tb_volume` WHERE `vol_id_nfe` = '$idNfe'");
        $sql->execute();
        $sql = $sql->fetchAll();

        return $sql;
    }
}
