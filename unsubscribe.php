<?php
/*
    Author: ReadAChunk
    File: Unsubscribe a book.
    Version: 1.0
*/
$id = $_GET['id'];
$db = db::load();

$contains = isset($db['jobs'][$id+'.pdf']);
if($contains){
    $res = unset($db[$id+'.pdf']);
    //TODO make better error/message handling.
    echo "Your book is removed...";
}    else{
        echo "You did not have your book...";
}

?>