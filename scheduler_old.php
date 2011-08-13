<?php
require_once("common.php");
include("emailview.php");

// $chunker = new pdf_chunker();
$db = db::load();

foreach ($db["jobs"] as $record_id => $job){	
    // print_r($db["jobs"]);
	$job['confirmed'] = "true"; //FIXME//FIXME//FIXME//FIXME//FIXME//FIXME
    // if ($job['confirmed'] == "true" && needs_chunk($job)){
        // echo "jobconfirmed: ". $job['confirmed'];
        echo 'isset($job["last_page_sent"]): ' . isset($job["last_page_sent"]) ."\n";
		$page_from = isset($job["last_page_sent"]) ? $job["last_page_sent"] : 0;
		echo "page_from: $page_from\n";
		$file_path = UPLOADFOLDERPATH.$job["file_id"];
		
		$chunk = shell_exec("python pdf_chunker.py $file_path $page_from $job[pages]");
		echo "chunk: "; print_r($chunk); echo "\n";
		$chunk = explode(' ', $chunk);
		
		if(isset($chunk[1])){ return false; } // stop sending if no more pages
		
		$page_to = 0 + $page_from + $job["pages"];
		print_r("page_to: $page_to\n");
		
		if($chunk[0] == "ERROR"){ echo "Upps there was a problem uploading your file, please try again."; return false; }
		
		$temp_file_path = trim($chunk[0]);
		
        // $subject = "You have a new chunk to read!"; // $body = get_email_text($record_id); // $attachment = $temp_file_path;// send_mail(array($job["email"]), $subject, $body, $attachment);
        echo "record_id: $record_id\n"; echo "job: ";print_r($job); echo "\n";
        update_job($db, $record_id,$page_to,time());
    // }
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

function update_job($db, $record_id,$last_page_sent,$last_time_sent){
    echo "record_id: $record_id\n";
    echo "job: "; print_r($db['jobs'][$record_id]);
	$job_in_db = $db['jobs'][$record_id];
	$job_in_db["last_page_sent"] = $last_page_sent;
	$job_in_db["last_time_sent"] = $last_time_sent;
	
    // echo "record_id: $record_id\n";
    //     echo "job: "; print_r($db['jobs']["$id"]);
	$db['jobs'][$record_id] = $job_in_db;
    // print_r($db);
    db::save($db);
    // print_r(db::load());
}
?>