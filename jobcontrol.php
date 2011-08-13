<?php
require_once("common.php");
	$record_id = $_REQUEST['record_id'];
	$action = $_REQUEST['a'];
	$db = db::load();
	echo $action;
	switch ($action)
	{
	case "s": //Stop
	  unset($db["jobs"][$record_id]);
	  print_r($db);
	  break;
	case "p": //Pause
	  $db["jobs"][$record_id]["paused"] = 1;
	  break;
	  
	case "r": //resume
	  $db["jobs"][$record_id]["paused"] = 0;
	  break;
	 
	 case "n": //retrieve next chunk
	  
	  break;
	default:
	  
	}

	db::save($db);
?>