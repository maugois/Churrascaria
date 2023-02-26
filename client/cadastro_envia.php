<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try
{
    //Configurações do servidor
    $mail->isSMTP();                                            // Defina mail para usar SMTP
    $mail->Host = 'smtp.office365.com';                         // Especificar servidores SMTP principais e de backup
    $mail->SMTPAuth = true;                                     // Ativar autenticação SMTP
    $mail->SMTPSecure = 'TLS';                                  // Ativar criptografia TLS, também aceita `ssl`
    $mail->Port = 587;                                          // Número da porta TCP

    $mail->Username = 'churascaria.chuleta@outlook.com';        // SMTP email
    $mail->Password = 'churrasco1234';                          // SMTP senha

    // Define o remetente
    $mail->setFrom('churascaria.chuleta@outlook.com', 'Churrascaria Chuleta');        // Quem vai enviar o email

    //Destinatario
    $mail->addAddress($_POST['email']);     // Pra quem você quer enviar o email

    // Conteúdo da mensagem
    $mail->Subject = '<h1>CADASTRO REALIZADO</h1>';
    $mail->Body    = '<b>Olá '.$_POST['nome_contato'].'!</b><br><hr>
                      <h2>Seja bem vindo!!</h2><br>
                      <p>
                        Informamos que o seu cadastro foi efetuado com sucesso.<br><br>
                        Use seu CPF para realizar o login e acessar a area do cliente.<br>
                      </p>';

    $mail->AltBody = '<b>Olá '.$_POST['nome_contato'].'!</b><br><hr>
                      <h2>Seja bem vindo!!</h2><br>
                      <p>
                        Informamos que o seu cadastro foi efetuado com sucesso.<br><br>
                        Use seu CPF para realizar o login e acessar a area do cliente.<br>
                      </p>';

    $mail->CharSet = 'UTF-8';
    $mail->Debugoutput = 'html';
    $mail->setLanguage('pt');

    // Enviar
    $mail->send();
    echo 'A mensagem foi enviada!';
}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header('location:index.php#home')
?>
