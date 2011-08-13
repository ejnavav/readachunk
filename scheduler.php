<?php
require_once("common.php");
include("emailview.php");

// $chunker = new pdf_chunker();
$db = db::load();
foreach ($db["jobs"] as $record_id=>$job){	
	if (needs_chunk($job)){
		// echo $file_id; exit;
		$file_id = $job["file_id"];
		$email = $job["email"];
		$pages = $job["pages"];
		$last_page_sent = isset($job["last_page_sent"]) ? $job["last_page_sent"] : 0;

		// $chunk = $chunker->get_chunk(UPLOADFOLDERPATH.$file_id, 1+$last_page_sent, $pages);

		$file_path = UPLOADFOLDERPATH.$file_id;
		$page_from = 1 + $last_page_sent;
		$page_to = $page_from + $pages;

		// echo "python pdf_chunker.py $file_path $page_from $pages";
		
		$chunk = shell_exec("python pdf_chunker.py $file_path $page_from $pages");
	
		
		$chunk = explode(' ', $chunk);
		
		// print_r($chunk);
		
		// echo $chunk[0] . "\n";
		
		if($chunk[0] == "ERROR"){
			echo "Upps there was a problem uploading your file, please try again.";
			return false;
		}
		
		$temp_file_path = trim($chunk[0]);
		
		$subject = "You have a new chunk to read!";
		$body = get_email_text($record_id);
		
		$emails = array($email);
		
		$attachment = $temp_file_path;
		
		send_mail($emails, $subject, $body, $attachment);
		
		update_job($db, $record_id, $job,$page_to,time());
	}
}

function needs_chunk($job){
	$now = time();
	$frequency = $job["frequency"];
	$last_time_sent = isset($job["last_time_sent"])? $job["last_time_sent"] : 0;

	if ($last_time_sent + $frequency <= $now){
		return true;
	}
	return false;
}

function update_job($db, $record_id, $job,$last_page_sent,$last_time_sent){
	$id = $record_id;
	$job_in_db = $db['jobs'][$id];
	$job_in_db["last_page_sent"] = $last_page_sent;
	$job_in_db["last_time_sent"] = $last_time_sent;
	$db['jobs'][$id] = $job_in_db;
	db::save($db);
}
?>