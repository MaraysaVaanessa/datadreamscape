<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'caminho_para_o_seu_arquivo/PHPMailer/src/Exception.php';
require 'caminho_para_o_seu_arquivo/PHPMailer/src/PHPMailer.php';

// Use filter_input para validar e sanitizar os dados de entrada
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

$para = "maraysavaanessamoreira@gmail.com";
$assunto = "Gostou do meu portfólio? Vamos conversar!";

$mail = new PHPMailer(true);

try {
    $mail->isMail(); // Use a função mail() do PHP
    $mail->setFrom('maraysavaanessamoreira@gmail.com');
    $mail->addAddress($para);
    $mail->isHTML(false);
    $mail->Subject = $assunto;
    $mail->Body = "Nome: $nome\nEmail: $email\nCelular: $celular\nMensagem: $mensagem";

    if($mail->send()){
        echo "Email enviado com sucesso.";
    } else {
        echo "Erro ao enviar o e-mail.";
    }
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
?>
