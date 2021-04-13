<?php
/*
include "classes/PHPMailer.php";

function sendEmail($From,$FromName,$Subject,$mailtext,$To,$CC="",$BCC="",$Attachments=""){
	
	$mail             = new PHPMailer\PHPMailer\PHPMailer();
	
	$mail->From       = $From;
	$mail->FromName   = utf8_decode($FromName);
	$mail->Subject    = utf8_decode($Subject);

	$mail->Body       = utf8_decode($mailtext);
	$mail->AltBody    = strip_tags(utf8_decode($mailtext));

	$mail->AddAddress($To);
	$mail->AddReplyTo($From);

	$mail->Send();

	unset($mail);
}


sendEmail("aa@aa.aa","Gurkerl","Obst","test","bb@bb.aa",$CC="",$BCC="",$Attachments="");
*/

$empfaenger = 'niemand@example.com';
$betreff = 'Der Betreff';
$nachricht = 'Hallo';
$header = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($empfaenger, $betreff, $nachricht, $header);

?>
