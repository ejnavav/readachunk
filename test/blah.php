<?php

try {
	throw new Exception("Error Processing Request");
	
} catch (Exception $e) {
	$message = "ERROR in readachunk.com\n\n".$e->__toString();
	send_mail(array(ADMIN_EMAIL), "ERROR in readachunk.com", $message);
}

?>