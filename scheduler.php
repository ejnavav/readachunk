<?php

require_once("common.php");
include("emailview.php");

function schedule(){
    $db = db::load();
    $jobs = $db['jobs'];
	
	// FIXME try catch here
    foreach($jobs as $id => $job){
        if(do_your_thing($id, $job)){
            $jobs[$id]['last_page_sent'] += $job['pages'];
            $jobs[$id]['last_time_sent'] = time();
        }
    }
    $db['jobs'] =  $jobs;
    db::save($db);
	echo "DONE";
}

function do_your_thing($id, $job){
    if( $job['confirmed'] != "true" ){ return false; }
    
    if( !time_to_send($job['last_time_sent'], $job['frequency'])) { return false; }

    $file_path = UPLOADFOLDERPATH.$job["file_id"];
    
    $chunk = get_chunk($file_path, $job['last_page_sent'], $job['pages']);
    
    if(!$chunk){ return false; }
    
    if($chunk['done']){ return false; }
    
    email($id, $job['email'], $chunk['path']);

    return true;
}

function email($id, $email, $attachment){
    $subject = "You have a new chunk to read";
    $body = get_email_text($id);
    send_mail(array($email), $subject, $body, $attachment);
}

function get_chunk($file_path, $page_from, $pages){
    $chunk = shell_exec("python pdf_chunker.py $file_path $page_from $pages");
    if($chunk == "ERROR"){ return false; }
    $chunk = explode(' ', $chunk);
    return array("path" => trim($chunk[0]), "done" => isset($chunk[1]));
}

// TODO pass time, to simulate pass of time when testing
function time_to_send($last_time_sent, $freq){
    $unit = 3600 * 24;
    if( $last_time_sent + ($freq * $unit) < time() ) {
        return true;
    }
    else{
        return false;
    }
}

schedule();