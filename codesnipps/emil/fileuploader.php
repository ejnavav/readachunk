<?php
/*
    Author: ReadAChunk.com
    Script: Filehandling
    Version: 1.0
*/
include('filehandling.php');

// Where the file is going to be placed 
$target_path = getuploadpath();

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */

$target_path = $target_path.basename( $_FILES['uploadedfile']['name']);
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    //TODO create a landingpage here.
    echo "The file ".basename( $_FILES['uploadedfile']['name'])." has been uploaded";
} else{
    //TODO do some error handling here
    echo "There was an error uploading the file, please try again!";
}
?>