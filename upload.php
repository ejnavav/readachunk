<?php
/*
Author: ReadAChunk.com
Script: Fileuploader
Version: 1.0
*/

require_once('common.php');


function upload(){
    $id = uniqid();
	$file_id = "$id.pdf";
	$file_info = upload_file($_FILES['book']['tmp_name'], $file_id);
	
	if(!$file_info){ redirect("upps.php"); }

    //TODO Add magic numer check
    //TODO Add more standard value from incompatible browsers
    $mimeTypePDF = 'application/pdf';
    $mimeTypeGeneric = 'application/x-download';
    $mimeType = $_FILES['book']['type'];
    
	if($mimeType == $mimeTypePDF || $mimeType == $mimeTypeGeneric) {
		save_job($_POST, $file_id);
		echo "<h3>Yei! your book in now in the cloud!, You will start receiving chunks of it in your inbox very soon!</h3>";
	}
	else {
		redirect("upps.php");
	}
}

function save_job($job, $file_id){
	$db = db::load();
	$emails = explode(',',$job['email']);
	foreach ($emails as $email){
		$job['email'] = $email;
		$job['file_id'] = $file_id;
		$db['jobs'][uniqid()]=$job;
	}
	db::save($db);
}

upload();

?>