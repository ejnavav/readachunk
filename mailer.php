<?php

$emails = array("victornavav@gmail.com", "eduardonavav@gmail.com", "emil@kjer.info", 'yannis.kolovos@gmail.com');

// require 'Zend/Mail.php';
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

function send_mail($to, $body, $attachment){
	
	$mail = new Zend_Mail();
	$mail->setSubject("My Email with Attachment");

	foreach($emails as $email){
		$mail->addTo($email);
	}

	$mail->setBodyText("Here the first chunk! get exited");
	$attachment = $mail->createAttachment(file_get_contents('a.pdf'));
	$attachment->type = 'application/pdf';
	$attachment->filename = 'achunk.pdf';
	$mail->send();
}

?>
