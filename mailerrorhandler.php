<?php
require_once('Zend/Mail.php');
class mailerrorhandler{
static function send_error_mail($subject, $body, $emails=array("emil@kjer.info"), $attachment=false){
    restore_error_handler();
    
	$mail = new Zend_Mail();
	
	$mail->setSubject($subject);
	
	
	foreach($emails as $email){
		$mail->addTo($email);
	}
		
	$mail->setBodyHtml($body);
    
    $mail->send();
    return true;
}
}
?>
