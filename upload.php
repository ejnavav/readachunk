<?php
/*
Author: ReadAChunk.com
Script: Fileuploader
Version: 1.0
*/

require_once('common.php');
include("emailview.php");

function upload(){
    $id = uniqid();
	$file_id = "$id.pdf";
	$file_info = upload_file($_FILES['book']['tmp_name'], $file_id);
	
	if(!$file_info){ 
		echo '$file_info error: '; exit;
		// redirect("upps.php"); 
	}
    //TODO Add magic numer check
    //TODO Add more standard value from incompatible browsers
    $mimeTypePDF = 'application/pdf';
    $mimeTypeGeneric = 'application/x-download';
    $mimeType = $_FILES['book']['type'];

	// FIXME test only
	// $mimeType = $mimeTypePDF;
    
	if($mimeType == $mimeTypePDF || $mimeType == $mimeTypeGeneric) {
		$_POST['confirmed'] = "false";
		save_job($_POST, $file_id);
		echo "<h3>Yei! your book in now in the cloud!, You will start receiving chunks of it in your inbox very soon!</h3>";
	}
	else {
		echo 'mimetype error: ' . $mimeType; exit;
		// redirect("upps.php");
	}
}

function save_job($job, $file_id){
	$db = db::load();
	$emails = explode(',',$job['email']);
	$subject = "Invitation to receive book Chunks please read!";
	
	foreach ($emails as $email){
		$record_id=uniqid()
		$job['email'] = $email;
		$job['file_id'] = $file_id;
		$db['jobs'][$record_id]=$job;
		$body = get_confirm_email($record_id);
		send_mail($email, $subject, $body, $attachment);
	}
	db::save($db);
}

upload();

?>