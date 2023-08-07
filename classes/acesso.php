<?php

class acesso
{
    private $id;
    private $nome;
    private $desc;
    private $menu;
    private $perfil;
    private $toCliente;

    // Método construtor
    public function __construct($id, $nome, $desc, $menu, $perfil, $toCliente)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->desc = $desc;
        $this->menu = $menu;
        $this->perfil = $perfil;
        $this->toCliente = $toCliente;
    }

    // Métodos para retornar os dados do usuário
    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getDesc()
    {
        return $this->desc;
    }
    public function getMenu()
    {
        return $this->menu;
    }
    public function getPerfil()
    {
        return $this->perfil;
    }
    public function getToCliente()
    {
        return $this->toCliente;
    }

    public static function getAcesses()
    {
        $sql = connectionFactory::connect()->prepare("SELECT * FROM `tb_acesso` ORDER BY `acs_nome` ASC");
        $sql->execute();

        return $sql;
    }

    public static function getAppliedAcesses($userId)
    {
        $sql = connectionFactory::connect()->prepare("SELECT * FROM `tb_acesso_apply` WHERE `acsa_id_login` = $userId");
        $sql->execute();

        return $sql;
    }

    //Verifica se já foi aplicado o acesso ao usuário em questão
    public static function verifyAppliedAccess($userId, $accessId)
    {
        $sql = connectionFactory::connect()->prepare("SELECT `acsa_id` FROM `tb_acesso_apply` WHERE `acsa_id_login` = $userId AND `acsa_id_acesso` = $accessId");
        $sql->execute();

        if ($sql->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function applyAcesses($userId, $accesses, $clearOnly)
    {
        $sql = connectionFactory::connect()->prepare("DELETE FROM `tb_acesso_apply` WHERE `acsa_id_login` = $userId");
        $sql->execute();

        if (!$clearOnly) {
            foreach ($accesses as $value) {
                $sql = connectionFactory::connect()->prepare("INSERT INTO `tb_acesso_apply`(`acsa_id`, `acsa_id_acesso`, `acsa_id_login`) VALUES (NULL, '$value', '$userId')");
                $sql->execute();
            }
        }
    }
}
