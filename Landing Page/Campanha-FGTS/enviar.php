<?php
// Incluindo arquivo com a classe Mail
require_once('Mail.php');

// Destinatário da mensagem
$to = "agencia3dev@gmail.com";


// Assunto da mensagem
$subject = "Contato pelo site";

//recebe o que foi inserido no form
$nome= utf8_decode(@$_POST[nome]);
$email= utf8_decode(@$_POST[email]);
$telefone= utf8_decode(@$_POST[telefone]);

$sevicos= utf8_decode(@$_POST[identidade]);
$sevicos= utf8_decode(@$_POST[criacaosites]);
$sevicos= utf8_decode(@$_POST[criacaoconteudo]);
$sevicos= utf8_decode(@$_POST[googleadwords]);

$mensagem= utf8_decode(@$_POST[mensagem]);

$branco = "
";

/* Corpo da mensagem
Em caso de formulário alterar para a variável $_POST['CAMPO'] */
$body = "$_POST[mensagem]";


// Servidor do Gmail. Este servidor é padrão.
$host = "ssl://smtp.gmail.com";

/* Email do Gmail que fará o envio autenticado. Digite neste campo o seu e-mail que será responsável pelo envio dos e-mails */
$username = "agencia3dev@gmail.com";

// Sua senha do GMAIL
$password = "papaloli";

$headers = array ('From' => $email,
 'To' => $to,
 'Subject' => $subject);

$smtp = Mail::factory('smtp',
 array ('host' => $host,
 'port' => 465, // SMTPS(para mais detalhes ver /etc/services
 'auth' => true,
 'debug' => false, // Debug ligado
 'username' => $username,
 'password' => $password)
 );

// Efetuando o envio autenticado
$mail = $smtp->send($to, $headers, $body.$branco.$branco.$nome.$branco.$email.$branco.$telefone);

// Verificando se houve erro
if (PEAR::isError($mail)) {
 echo("Error" . $mail->getMessage());
} else {
header ("Location: http://www.3dev.com.br/valeu.html");
}
?>