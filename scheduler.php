<?php
require_once("common.php");
$chunker = new pdf_chunker();
$db = db::load();
foreach ($db["jobs"] as $record_id=>$job){	
	if (needs_chunk($job)){
		// echo $file_id; exit;
		$file_id = $job["file_id"];
		$email = $job["email"];
		$pages = $job["pages"];
		$last_page_sent = isset($job["last_page_sent"])?$job["last_page_sent"]:0;
		
		$chunk = $chunker->get_chunk(UPLOADFOLDERPATH.$file_id, 1+$last_page_sent, $pages);

		if(!$chunk){
			echo "Upps there was a problem uploading your file, please try again.";
		return false;
		}
        //TODO make the hostname not static
        $urlbase = "http://www.readachunk.com/jobcontrol.php?";
        $urlrecord = "record_id=$record_id";
        $urlid = $urlbase . $urlrecord;
        
        $urlstop = "<a href='$urlid&a=s'>Stop</a>";
        $urlpause = "<a href='$urlid&a=p>Pause</a>";
        $urlresume = "<a href='$urlid&a=r>Start</a>";
        $urlnext = "<a href='$urlid&a=n>Next Chunk</a>";
        
		$emails = array($email);
		$subject = "You have a new chunk to read!";

        $textheader = "";
		$textbody = "Read it now!\n\n";
		$textplayer = "<br><br> Chunk player: $urlpause -- $urlresume -- $urlstop -- $urlnext\n";
		$textfooter = "<br> This service is provided by <a href='www.readachunk.com'>ReadAChunk.com</a>\n";

		$body = $textheader . $textbody . $textplayer . $textfooter;
		$attachment = TEMP_PATH . $chunk;
		send_mail($emails, $subject, $body, $attachment);

		// update_job($db['jobs'],$job,$last_page_sent+$pages,time());
		update_job($db, $record_id, $job,$last_page_sent+$pages,time());
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