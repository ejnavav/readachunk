<?php
/*
Author: ReadAChunk.com
Script: Fileuploader
Version: 1.0
*/

//Save the file
require_once('common.php');

$file_id = upload_file($_FILES['book']['tmp_name']);

if(!$file_id){
	echo "ERROR: uploading file";
	return FALSE;
}

$pages = $_POST["pages"];
$frequency = $_post["frequency"];
$emails = array($_POST['email']);

// $chunker = new pdf_chunker();
//echo $file_id; exit;
// $chunk = $chunker->get_chunk($file_id, 1, 2);

// if(!$chunk){
	// echo "Upps there was a problem uploading your file, please try again.";
	// return false;
// }

// $emails = array($_POST['email']);
// $subject = "read a chunk";
// $body = "All togeather for the 1st time";
// $attachment = TEMP_PATH . $chunk;
// send_mail($emails, $subject, $body, $attachment);
// echo("Yei it works");

?>