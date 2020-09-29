<?php

//Obs: O envio de email só acontece quando o site está hospedado no servidor!!!

require('PHPMailer-master/src/Exception.php'); // Troca aqui pela pasta que baixou do repositório.
require('PHPMailer-master/src/PHPMailer.php');
require('PHPMailer-master/src/SMTP.php');

$mail = new PHPMailer\PHPMailer\PHPMailer();

// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente     = $_POST['nome'];
$sobrenomeRemetente     = $_POST['sobrenome'];
$emailremetente    = trim($_POST['email']);
$telefone      	   = $_POST['telefone'];
$assunto          = $_POST['assunto'];
$mensagem          = $_POST['mensagemCliente'];

//$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.exemplo.com.br';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

$mail->setFrom($emailremetente, 'Mail Exemplo');
$mail->addAddress('email_1@gmail.com', 'Nome Sobrenome'); // Add a recipient
$mail->addAddress('email_2@gmail.com.br', 'Nome Sobrenome');

$mail->isHTML(true); // Set email format to HTML

/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<strong>Formulário de Contato</strong>
<p><b>Nome:</b> '.$nomeremetente.' '.$sobrenomeRemetente.' 
<p><b>E-Mail:</b> '.$emailremetente.'
<p><b>Telefone:</b> '.$telefone.'
<p><b>Mensagem:</b> '.$mensagem.'</p>
<hr>';

$mail->Subject = $assunto;
$mail->Body    = $mensagemHTML;

if(!$mail->send()) {
    echo 'Problema ao enviar mensagem.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<script>location.href='sucesso.html'</script>"; // Página que será redirecionada
   
}  


?>