<?php

require 'Zend/Mail.php';

// $emails = array("victornavav@gmail.com");
// 
// $mail = new Zend_Mail();
// $mail->setSubject("My Email with Attachment");
// 
// foreach($emails as $email){
// 	$mail->addTo($email);
// }
// 
// $mail->setBodyText("Here the first chunk! get exited");
// $attachment = $mail->createAttachment(file_get_contents('a.pdf'));
// $attachment->type = 'application/pdf';
// $attachment->filename = 'achunk.pdf';
// $mail->send();

function send_mail($emails, $subject, $body, $attachment){
	$mail = new Zend_Mail();
	$mail->setSubject($subject);
	
	foreach($emails as $email){
		$mail->addTo($email);
	}
	
	$mail->setBodyText("Here the first chunk! get exited");
	$attachment = $mail->createAttachment(file_get_contents('a.pdf'));
	$attachment->type = 'application/pdf';
	$attachment->filename = 'achunk.pdf';
	$mail->send();
}
// $emails = array("victornavav@gmail.com", "eduardonavav@gmail.com", "emil@kjer.info", 'yannis.kolovos@gmail.com');
$emails = array("victornavav@gmail.com");
$subject = "read a chunk";
$body = "Here the first chunk! get exited";
$attachment = file_get_contents('a.pdf');

echo send_mail($emails, $subject, $body, $attachment);
echo "sent";

?>
