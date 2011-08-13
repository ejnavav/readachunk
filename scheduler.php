<?php
require_once("common.php");
$chunker = new pdf_chunker();
$db = db::load();
foreach ($db["jobs"] as $file_id=>$job){	
	if (needs_chunk($job)){
		// echo $file_id; exit;
		$file_id = $job["file_id"];
		$email = $job["email"];
		$pages = $job["pages"];
		$email = $job["email"];
		
		$last_page_sent = isset($job["last_page_sent"]) ? $job["last_page_sent"] : 0;

		// $chunk = $chunker->get_chunk(UPLOADFOLDERPATH.$file_id, 1+$last_page_sent, $pages);
		$file_path = UPLOADFOLDERPATH.$file_id;
		$page_from = 1 + $last_page_sent;
		// echo "python pdf_chunker.py $file_path $page $pages"; exit;
		// $chunk = shell_exec("python pdf_chunker.py $file_path $page $pages");

		$chunk = $chunker->get_chunk($file_path, 1+$last_page_sent, $pages);

		//FIXME will be off at the end of the book
		$page_to = $page_from + $pages;

		if(!$chunk){
			echo "Upps there was a problem uploading your file, please try again.";
			return false;
		}
		
		$book_title = "Redbull for the win";

		$emails = array($email);
		$subject = "You have a new chunk to read!";
		$body = "Have a look pages $page_from to $page_to from your book: $job[book_title].\n\nEnjoy!.";
		$attachment = TEMP_PATH . $chunk;
		send_mail($emails, $subject, $body, $attachment);
		echo("Yei it works");
		// update_job($db['jobs'],$job,$last_page_sent+$pages,time());
		update_job($db, $job, $page + $pages, time());
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

function update_job($db, $job,$last_page_sent,$last_time_sent){
	$id = $job["file_id"];
	$job_in_db = $db['jobs'][$id];
	$job_in_db["last_page_sent"] = $last_page_sent;
	$job_in_db["last_time_sent"] = $last_time_sent;
	$db['jobs'][$id] = $job_in_db;
	db::save($db);
}

?>