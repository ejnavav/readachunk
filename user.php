<?php

include("inc_header.php");
require_once("common.php");
$db = db::load();


// echo "<pre>";
// print_r($db);

if (!isset($_REQUEST['u'])) {exit;}


$user=$_REQUEST['u'];


echo "<h1> $user s files:</h1>";
 
foreach ($db[jobs] as $val) {
	if ($val[email]=$_REQUEST['u'] && $val[confirmed] != "false") {
echo "<li><a href=\"uploads/$val[book_title]\">$val[file_id]</a></li>"; 

}}

