<?php

class user
{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cnpjCliente;
    private $fantasiaCliente;

    // Método construtor
    public function __construct($id, $nome, $email, $senha, $cnpjCliente, $fantasiaCliente)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->cnpjCliente = $cnpjCliente;
        $this->fantasiaCliente = $fantasiaCliente;
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
    
    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getFantasiaCliente()
    {
        return $this->fantasiaCliente;
    }

    public function getCnpjCliente()
    {
        return $this->cnpjCliente;
    }

    public static function requestALLusers()
    {
        $sql = connectionFactory::connect()->prepare("SELECT `log_id`, `log_id_cliente`, `log_nome`, `log_senha`, `log_email`, `cli_dado_fantasia`, `cli_dado_cnpj` FROM `tb_login` LEFT JOIN `tb_cliente` ON `tb_login`.`log_id` = `tb_cliente`.`cli_id` WHERE `log_id` != 1 AND `log_nome` != 'Admin' ORDER BY `log_nome` DESC");
        $sql->execute();

        return $sql;
    }
    public static function requestSingleUser($userId)
    {
        $sql = connectionFactory::connect()->prepare("SELECT `log_id`, `log_id_cliente`, `log_nome`, `log_senha`, `log_email`, `cli_dado_cnpj`, `cli_dado_fantasia` FROM `tb_login` LEFT JOIN `tb_cliente` ON `tb_login`.`log_id` = `tb_cliente`.`cli_id` WHERE `log_id` = '$userId' LIMIT 1");
        $sql->execute();
        $sql = $sql->fetch();

        return $sql;
    }

    public static function verifyExistingCPNJ($cnpj)
    {
        $sql = connectionFactory::connect()->prepare("SELECT `cli_dado_cnpj` FROM `tb_cliente` WHERE `cli_dado_cnpj` = '$cnpj'");
        $sql->execute();

        if ($sql->rowCount() < 1) {
            return false;
        } else {
            return true;
        }
    }
    public static function updateUser($user)
    {
        $id = $user->id;
        $nome = $user->nome;
        $email = $user->email;
        $senha = $user->senha;
        $cnpjCliente = $user->cnpjCliente;

        if ($cnpjCliente != '') {
            $sql = connectionFactory::connect()->prepare("SELECT `cli_id` FROM `tb_cliente` WHERE `cli_dado_cnpj` = '$cnpjCliente' LIMIT 1");
            $sql->execute();
            $idCliente = $sql->fetch();

            $query = "UPDATE `tb_login` SET `log_id_cliente` = $idCliente , `log_nome` = '$nome',`log_senha` = '$senha',`log_email` =' $email' WHERE `log_id` = $id";

            $sql = connectionFactory::connect()->prepare($query);
            $sql->execute();
        } else {
            $query = "UPDATE `tb_login` SET `log_nome` = '$nome' ,`log_senha` = '$senha',`log_email` =' $email' WHERE `log_id` = $id";
            $sql = connectionFactory::connect()->prepare($query);
            $sql->execute();
        }
    }

    public static function insertUser($user)
    {
        $id = $user->id;
        $nome = $user->nome;
        $email = $user->email;
        $senha = $user->senha;
        $cnpjCliente = $user->cnpjCliente;

        $exists = connectionFactory::connect()->prepare("SELECT `log_id` FROM `tb_login` WHERE `log_email` = '$email'");
        $exists->execute();

        if ($exists->rowCount() === 0) {
            if ($cnpjCliente != '') {
                $sql = connectionFactory::connect()->prepare("SELECT `cli_id` FROM `tb_cliente` WHERE `cli_dado_cnpj` = '$cnpjCliente' LIMIT 1");
                $sql->execute();
                $idCliente = $sql->fetch();

                $query = "INSERT INTO `tb_login`(`log_id`, `log_id_cliente`, `log_nome`, `log_senha`, `log_email`) VALUES (NULL,'$idCliente','$nome','$senha','$email')";

                $sql = connectionFactory::connect()->prepare($query);
                $sql->execute();
            } else {
                $query = "INSERT INTO `tb_login`(`log_id`, `log_id_cliente`, `log_nome`, `log_senha`, `log_email`) VALUES (NULL,NULL,'$nome','$senha','$email')";
                $sql = connectionFactory::connect()->prepare($query);
                $sql->execute();
            }
        } else {
            echo frontend::alert('times', 'danger', 'Esse email já está cadastrado.');
        }
    }
}