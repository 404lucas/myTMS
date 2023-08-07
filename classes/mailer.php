<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mailer
{
    public static function sendRegisterEmail($nome, $cnpj, $telefone, $email, $obs)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->Host = 'mail.nextexpress.com.br';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'acesso@nextexpress.com.br';
            $mail->Password = '3bBKa2l-fSk&';

            $mail->setFrom('acesso@nextexpress.com.br', 'Formulários');
            $mail->addAddress('lucas@dlog.com.br');
            $mail->Subject = 'Solicitação de cadastro - ' . $nome;
            $mail->Body =
            '<div style="background-color:#fff; color: #606060"; display: flex; flex-direction:column;><img src="cid:nexx" height: "100px";><h1>Nova solicitação de cadastro no sistema Next:</h1></div>
            <h3>Nome do usuário: ' . $nome . '</h6>
            <h3>CNPJ: ' . $cnpj . '</p></h6>
            <h3>Telefone: ' . $telefone . '</h6>
            <h3>Email: ' . $email . '</h6>
            <h3>Observação: ' . $obs . '</h6>
            ';

            $mail->IsHTML(true);
            $mail->send();
            echo frontend::alertCustom('envelope', 'success', 'Seu cadastro foi solicitado! Nossa equipe retornará em breve.');
        } catch (Exception $e) {
            echo frontend::alertCustom('envelope', 'fail', $e->getMessage() . ' Erro ao enviar email');;
        }
    }
}