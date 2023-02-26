<?php
include 'connection/connect.php';
$lista = $conn->query("select hash_code from tbpedidoreservas order by id_pedido_reservas desc limit 1");
$row = $lista->fetch_assoc();
$hashCode = $row["hash_code"];

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
    $mail->Subject = '<h1>PEDIDO DE RESERVA</h1>';
    $mail->Body    = '<b>Olá '.$_POST['nome_contato'].'!</b><br><hr>
                      <h2>ATENÇÂO:</h2><br>
                      <p>
                        Informamos que o pedido de reserva foi efetuado com sucesso.<br><br>
                        Use esse token para visualizar seu pedido:<b>'.$hashCode.'</b><br>
                        Para que acompanhar o andamento do seu pedido, Acesse esse link:<a href="">http://status.php</a>!!!<br><br>
                        Ou se cadastre no nosso site para receber novidades e também poder acompanhar seus pedidos na área do cliente. 
                      </p>';

    $mail->AltBody = '<b>Olá '.$_POST['nome_contato'].'!</b><br><hr>
                      <h2>ATENÇÂO:</h2><br>
                      <p>
                        Informamos que o pedido de reserva foi efetuado com sucesso.<br><br>
                        Use esse token para visualizar seu pedido:<b>'.$hashCode.'</b><br>
                        Para que acompanhar o andamento do seu pedido, Acesse esse link:<a href="">http://status.php</a>!!!<br><br>
                        Ou se cadastre no nosso site para receber novidades e também poder acompanhar seus pedidos na área do cliente. 
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
