<?php
/*
    Author: ReadAChunk.com
    Script: Fileuploader
    Version: 1.0
*/
require_once('common.php');




function upload_file($tempfile, $filename){
    // Where the file is going to be placed 
    //Get filename
	$filename = $filename;
	// $filename =  UPLOADFOLDERPATH . get_filename();
	$filepath = UPLOADFOLDERPATH . $filename;
    //Check if the file exists
    while(is_file($filepath)){
        // $filename = get_filename();
		$filepath = UPLOADFOLDERPATH . get_filename();
    }

    /* Add the original filename to our target path.  
    Result is "uploads/filename.extension" */
    if(move_uploaded_file($tempfile, $filepath)) {
        return array('filename' => $filename, 'filepath' => $filepath);
    } else{
        return FALSE;
    }
}

?>