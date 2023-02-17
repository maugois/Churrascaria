<?php 
require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'exemplo@gmail.com';
$mail->Password = 'senha';
$mail->Port = 587;

$mail->setFrom('remetente@email.com.br');
$mail->addReplyTo('no-reply@email.com.br');
$mail->addAddress('email@email.com.br');
$mail->addAddress('email@email.com.br', 'Contato');
$mail->addCC('email@email.com.br', 'Cópia');
$mail->addBCC('email@email.com.br', 'Cópia Oculta');

$mail->isHTML(true);
$mail->Subject = 'Assunto do email';
$mail->Body    = 'Este é o conteúdo da mensagem em <b>HTML!</b>';
$mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');

$mail->SMTPDebug = 3;
$mail->Debugoutput = 'html';
$mail->setLanguage('pt');

if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada.';
}
?>
