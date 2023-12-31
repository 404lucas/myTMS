<?php

class loginServer
{
    public static function logged()
    {
        return isset($_SESSION['login']) ? true : false;
    }

    public static function logout()
    {
        $_SESSION = array();
        header('Location: index.php');
    }

    public static function authenticate($email, $senha)
    {
        //Selecionando da tabela de usuários
        $sql = connectionFactory::connect()->prepare("SELECT * FROM `tb_login` WHERE log_email = '$email' AND log_senha = '$senha'");
        $sql->execute();

        //Verificando se há apenas um resultado
        if ($sql->rowCount() == 1) {
            $info = $sql->fetch();
            //Logado
            $_SESSION['login'] = true;
            $_SESSION['id'] = $info['log_id'];
            $_SESSION['nome'] = $info['log_nome'];
            $_SESSION['senha'] = $info['log_senha'];
            $_SESSION['email'] = $info['log_email'];
            header('Location: index.php');
        } else{
            //Falhou
            echo frontend::alert('times', 'danger', 'Usuário ou senha incorretos.');
        }
    }

    public static function sessionVerify()
    {
        if (session_status() === PHP_SESSION_NONE)
            die('Você não tem permissão para acessar este recurso');
    }

    public static function sendRegisterData($nome, $cnpj, $telefone, $email, $obs)
    {
        $sql = connectionFactory::connect()->prepare("INSERT INTO `tb_solicitacoes_registro`(`sr_id`,`sr_nome`, `sr_cnpj`, `sr_telefone`, `sr_email`, `sr_observacao`) VALUES (NULL, '$nome', '$cnpj', '$telefone', '$email', '$obs')");
        $sql->execute();
    }
}