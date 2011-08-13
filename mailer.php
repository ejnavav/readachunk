<?php

require_once('Zend/Mail.php');

function send_mail($emails, $subject, $body, $attachment=false){
	// echo "pwd: " . getcwd() . "\n\n";
	// echo $attachment;
	
	$mail = new Zend_Mail();
	$mail->setSubject($subject);
	
	foreach($emails as $email){
		$mail->addTo($email);
	}
		
	$mail->setBodyHtml($body);
	
	if($attachment){
		$attachment = $mail->createAttachment(file_get_contents($attachment));
		$attachment->type = 'application/pdf';
		$attachment->filename = 'achunk.pdf';	
	}
	return $mail->send();
}

function test_send_mail(){
	// $emails = array("victornavav@gmail.com", "eduardonavav@gmail.com", "emil@kjer.info", 'yannis.kolovos@gmail.com');
	$emails = array("victornavav@gmail.com");
	$subject = "read a chunk";
	$body = "The the dam thing now!";
	$attachment = 'temp/a.pdf';
	send_mail($emails, $subject, $body, $attachment);
	return true;
}

function test_send_mail_no_attachment(){
	$emails = array("victornavav@gmail.com");
	$subject = "no attach";
	$body = "this email has no attachments";
	send_mail($emails, $subject, $body);
	return "ok";
}

// echo test_send_mail_no_attachment();
// echo test_send_mail();
?>
