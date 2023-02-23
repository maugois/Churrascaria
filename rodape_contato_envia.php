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
    $mail->isSMTP();                                        // Defina mail para usar SMTP
    $mail->Host = 'smtp.office365.com';                         // Especificar servidores SMTP principais e de backup
    $mail->SMTPAuth = true;                                 // Ativar autenticação SMTP
    $mail->SMTPSecure = 'TLS';                              // Ativar criptografia TLS, também aceita `ssl`
    $mail->Port = 587;                                      // Número da porta TCP

    $mail->Username = 'churascaria.chuleta@outlook.com';          // SMTP email
    $mail->Password = 'churrasco1234';                              // SMTP senha

    // Define o remetente
    $mail->setFrom('churascaria.chuleta@outlook.com', 'Churrascaria Chuleta');

    //Destinatario
    $mail->addAddress('churascaria.chuleta@outlook.com', 'Churrascaria Chuleta');     // Pra quem você quer enviar o email, nome é opcional

    // Conteúdo da mensagem
    $mail->Subject = 'Assunto';
    $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
    $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
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
?>
