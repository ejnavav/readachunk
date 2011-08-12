<?php
/*
    Author: ReadAChunk.com
    Script: Fileuploader
    Version: 1.0
*/
require_once('common.php');
include('fileuploader.php');

//Save the file

$file_id = upload_file($_FILES['book']['tmp_name']);

if(!$file_id){
    echo "ERROR: uploading file";
    return FALSE;
}

print_r($_POST);

?>