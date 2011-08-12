<?php

require 'Zend/Mail.php';

function send_mail($emails, $subject, $body, $attachment){
	$mail = new Zend_Mail();
	$mail->setSubject($subject);
	
	foreach($emails as $email){
		$mail->addTo($email);
	}
		
	$mail->setBodyText($body);
	$attachment = $mail->createAttachment(file_get_contents('a.pdf'));
	$attachment->type = 'application/pdf';
	$attachment->filename = 'achunk.pdf';
	return $mail->send();
}

function test_send_mail(){
	// $emails = array("victornavav@gmail.com", "eduardonavav@gmail.com", "emil@kjer.info", 'yannis.kolovos@gmail.com');
	$emails = array("victornavav@gmail.com");
	$subject = "read a chunk";
	$body = "The the dam thing now!";
	$attachment = file_get_contents('a.pdf');
	send_mail($emails, $subject, $body, $attachment);
	return true;
}

echo test_send_mail();
?>
