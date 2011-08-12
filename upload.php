<?php
/*
Author: ReadAChunk.com
Script: Fileuploader
Version: 1.0
*/

//Save the file
require_once('common.php');

// function test_upload(){
// 	$file_info = upload_file($_FILES['book']['tmp_name']);
// 
// 	if(!$file_info){
// 		echo "ERROR: uploading file";
// 		return FALSE;
// 	}
// 
// 	$chunker = new pdf_chunker();
// 	// echo $file_id; exit;
// 	$chunk = $chunker->get_chunk($file_info['filepath'], 1, 2);
// 
// 	if(!$chunk){
// 		echo "Upps there was a problem uploading your file, please try again.";
// 		return false;
// 	}
// 
// 	$emails = array($_POST['email']);
// 	$subject = "read a chunk";
// 	$body = "All togeather for the 1st time";
// 	$attachment = TEMP_PATH . $chunk;
// 	send_mail($emails, $subject, $body, $attachment);
// 	echo("Yei it works");
// }


function upload(){
	$file_info = upload_file($_FILES['book']['tmp_name']);

    //TODO Add magic numer check
    //TODO Add standard value from incompatible browsers
    $mimeType = 'application/pdf';
    if($_FILES['book']['type'] != $mimeType)
    {
	    //TODO Errorhandling
        echo "ERROR: uploading file";
        return FALSE;
    }
    
	if(!$file_info){
	    //TODO Errorhandling
		echo "ERROR: uploading file";
		return FALSE;
	}
	// TODO check fields are correct
	$_POST['file_id'] = $file_info['filename'];
	save_job($_POST);
	print_r(db::load("db.json"));
	
}

function save_job($job){
	$db = db::load();
	$db['jobs'][$job['file_id']] = $job;
	db::save($db);
}

// test_upload();
// test_upload();
upload();

?>