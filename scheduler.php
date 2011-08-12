<?php
$chunker = new pdf_chunker();
$jobs = DB::load();
foreach ($jobs as $job){
	if needs_chunk($job){
		// echo $file_id; exit;
		$file_id = $job["file_id"];
		$email = $job["email"];
		$pages = $job["pages"];
		$last_page_sent = $job["last_page_sent"];
		
		$chunk = $chunker->get_chunk($file_id, $last_page_sent+1, $pages);

		if(!$chunk){
			echo "Upps there was a problem uploading your file, please try again.";
		return false;
		}

		$emails = array($email);
		$subject = "You have a new chunk to read!";
		$body = "Read it now!";
		$attachment = TEMP_PATH . $chunk;
		send_mail($emails, $subject, $body, $attachment);
		echo("Yei it works");
		update_job($jobs,$job,$last_page_sent+pages+1,time());
	}
}
	
function needs_chunk($job){
	$now = time();
	$frequency = $job["frequency"];
	$last_time_sent = $job["last_time_sent"];
	
	if ($last_time_sent + $frequency <=$now){
		return true;
	}
	return false;
}
	
function update_job($jobs,$job,$last_page,$last_time_sent){
	$jobs[$job["file_id"]]["last_page_sent"]=$last_page_sent;
	$jobs[$job["file_id"]]["last_time_sent"]=$last_time_sent;
	DB::save($jobs);
}
?>