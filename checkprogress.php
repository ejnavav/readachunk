<?php
	require_once 'common.php';

	function check_progress($record_id){
		$db = db::load();
		$last_page_read = isset($db["jobs"][$record_id]["last_page_sent"])?$db["jobs"][$record_id]["last_page_sent"]:0 ;
		$file_id = $db["jobs"][$record_id]["file_id"];
		$book = Zend_Pdf::load("uploads/".$file_id);
		$total_pages = count($book->pages);
		//$book->close();
		$progress = 100*$last_page_read/$total_pages;
		return $progress;
	}
	
?>