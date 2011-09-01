<?php

require_once('Zend/Mail.php');

/*  #########################################
    #  CUSTOM ERROR HANDLING --  START      #
    ######################################### */
function handleError($errno, $errstr, $errfile, $errline, array $errcontext) {
    /*  To be able to catch warnings are we here creating a custom error handler */
    
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }

    /* Catch anything including warnings and throw a new exception. */
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    
    /* Don't execute PHP internal error handler */
    return true;
}
set_error_handler('handleError');
/*  #########################################
    #  CUSTOM ERROR HANDLING --  END        #
    ######################################### */



function send_mail($emails, $subject, $body, $attachment=false){

    try{	
    	$mail = new Zend_Mail();
    	$mail->setSubject($subject);

	    if (strlen($emails[0]) < 5){
	        $error_str = ' No Email specified!';
	        throw new  ErrorException($error_str, 0 , $errno,  $errfile, $errline);	    
	    }
	    
	    foreach($emails as $email){
		    $mail->addTo($email);
	    }
	
	    $mail->setBodyHtml($body);

    	if($attachment){
    		$attachment = $mail->createAttachment(file_get_contents($attachment));
    		$attachment->type = 'application/pdf';
    		$attachment->filename = 'achunk.pdf';	
    	}	    

        $mail->send();
        return true;
        
    } catch (Exception $e) {
            $error_subject = 'Error from Mailer!';
            $error_body = "Caught exception:" .  $e->getMessage() . "\n" .
                 "Trace: " . $e->getTraceAsString() . "\n\n" .
                 "Info: emails ".  implode(', ', $emails) . " \nSubject: " . $subject . " \nBody: " . $body . "\nAttachment: " . $attachment;
            require_once('mailerrorhandler.php');            
            $eh = mailerrorhandler::send_error_mail($error_subject, $error_body);
            // Clumpsy but we need to restore the errorhandler
            set_error_handler('handleError');
            return false;
    }
    
    return false;
}






/*  #########################################
    #         TESTING  -- START             #
    ######################################### */
function test_send_mail(){
    $emails = array("emil@kjer.info");
    $subject = "read a chunk";
    $body = "A normal mail that is working!";
    $attachment = 'test-files/a.pdf';
    return send_mail($emails, $subject, $body, $attachment);
}

function test_send_mail_multiple_recipients(){
        $emails = array("emil.kjer@gmail.com", "emil@headnet.dk", "emil@kjer.info", 'dacz@sol.dk');
        $subject = "read a chunk";
        $body = "A normal mail with multiple recipients.";
        $attachment = 'test-files/a.pdf';
        return send_mail($emails, $subject, $body, $attachment);
        
}

function test_send_mail_no_address(){
        $emails = array();
        $subject = "read a chunk";
        $body = "The the dam thing now!";
        $attachment = 'test-files/a.pdf';
        return send_mail($emails, $subject, $body, $attachment);
}

function test_send_mail_no_attachment(){
    $emails = array("emil@kjer.info");
	$subject = "BULK: no attach";
	$body = "this email has no attachments";
    return send_mail($emails, $subject, $body);
}

function test_send_mail_wrong_attachment(){
    $emails = array("emil@kjer.info");
    $subject = "read a chunk";
    $body = "A normal mail that is working!";
    $attachment = 'test-files/nonexisting.pdf';
    return send_mail($emails, $subject, $body, $attachment);
}

// TEST RUN FUNCTIONS
// echo test_send_mail();
// echo test_send_mail_multiple_recipients();
// echo test_send_mail_no_address();
// echo test_send_mail_no_attachment();

/*  #########################################
    #         TESTING  -- END               #
    ######################################### */


?>
