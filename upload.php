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

    //TODO Add magic numer check
    //TODO Add more standard value from incompatible browsers
    $mimeTypePDF = 'application/pdf';
    $mimeTypeGeneric = 'application/x-download';
    
    $mimeType = $_FILES['book']['type'];
    
    if($mimeType != $mimeTypePDF || $mimeType != $mimeTypeGeneric)
    {
	    //TODO Errorhandling
        echo "ERROR: uploading file. Sorry Not a PDF file.";
        return FALSE;
    }
    
	if(!$file_info){
	    //TODO Errorhandling
		echo "ERROR: uploading file";
		return FALSE;
	}
	// TODO check fields are correct

	save_job($_POST, $file_id);
	echo "<h1>Thank you everybody</h1>";
	//print_r(db::load("db.json"));
	
}

function save_job($job, $file_id){
	$db = db::load();
	$emails = explode(',',$job['email']);
	foreach ($emails as $email){
		$job['email'] = $email;
		$job['file_id'] = $file_id;
		$db['jobs'][uniqid()]=$job;
	}
	//$db['jobs'][$job['file_id']] = $job;
	db::save($db);
}

// test_upload();
// test_upload();
upload();

?>