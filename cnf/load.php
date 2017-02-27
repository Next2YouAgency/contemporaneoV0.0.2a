<?php
/* * *****************************************
  DEFINIÇÃO DA BASE DE INFORMAÇÕES DO SISTEMA
 * ***************************************** */
define("SITENAME", "Escola Contemporâneo");
define("SITEDESC", "Escola particular para reforço escolar");
define("SITETAGS", "");
define("SUPPORT","suport@n2y.com.br");
define("SUPORTNAME", "Equipe de Suporte ao Usuário");
define("NOREPLY", "no-reply@n2y.com.br");
define("NOREPLYNAME", "Não Responda");
define("VERSION_SYSTEM","V0.0.2a");
/* * *****************************************
  DEFINIÇÃO DO SERVIDOR DE EMAILS
 * ***************************************** */
define("MAILUSER", "contato@ssoffice.com.br");
define("MAILPASS", "ssoffice2016");
define("MAILPORT", "465");
define("MAILHOST", "br780.hostgator.com.br");

/* * ***************************
  ENVIA O EMAIL
 * *************************** */

function sendMail($assunto, $mensagem, $mensagemSemHTML, $remetente, $nomeRemetente, $destino, $nomeDestino, $reply = NULL, $replyNome = NULL) {

        require 'mail/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = MAILHOST;           // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = MAILUSER;                 // SMTP username
        $mail->Password = MAILPASS;                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = MAILPORT;                                    // TCP port to connect to

        $mail->setFrom(MAILUSER, SITENAME);
        $mail->addAddress($destino, $nomeDestino);     // Add a recipient
        $mail->addReplyTo($reply, $replyNome);

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $assunto;
        $mail->Body = $mensagem;
        $mail->AltBody = $mensagemSemHTML;

        if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
                return true;
        }
}