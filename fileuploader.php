<?php
/*
    Author: ReadAChunk.com
    Script: Fileuploader
    Version: 1.0
*/
require_once('common.php');


function get_filename(){
    $idstring = uniqid();
    return "$idstring.pdf";
}


function upload_file($tempfile){
    // Where the file is going to be placed 
    $dirname = UPLOADFOLDERPATH;
    chdir($dirname);

    //Get filename
    $filename = get_filename();

    //Check if the file exists
    while(is_file($filename)){
        $filename = get_filename();
    }

    /* Add the original filename to our target path.  
    Result is "uploads/filename.extension" */
    if(move_uploaded_file($tempfile, $filename)) {
        return $filename;
    } else{
        return FALSE;
    }
}
?>