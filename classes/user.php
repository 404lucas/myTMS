<?php

class user
{
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $id_departamento;

    // Método construtor
    public function __construct($id, $id_departamento, $nome, $email)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->id_departamento = $id_departamento;
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
        return $this->email;
    }

    public function getDepartment()
    {
        $department = $this->catchDepartment($this->id_departamento);
        return $department;
    }

    private function catchDepartment($id)
    {
        $sql = connectionFactory::connect()->prepare("SELECT dep_nome from tb_departamento WHERE dep_id = '$id'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            // Existe um departamento com esse ID
            $sql = $sql->fetch();
            $departamento = $sql['dep_nome'];

            return $departamento;
        } else {
            // Não foi encontrado nenhum departamento com esse ID
            return "Departamento não encontrado.";
        }
    }

}

?>