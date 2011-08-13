<?php

include("inc_header.php");

require_once("common.php");
	$record_id = $_REQUEST['record_id'];
	$action = $_REQUEST['a'];
	$db = db::load();

	switch ($action)
	{
	case "s": //Stop
	  unset($db["jobs"][$record_id]);
	  echo "<h1>Awesome You wont receive this crap again</h1>";
	  break;
	case "p": //Pause
	  $db["jobs"][$record_id]["paused"] = "true";
	  echo "<h1>OK you can take a break</h1>";
	  break;
	  
	case "r": //resume
	  $db["jobs"][$record_id]["paused"] = "false";
	  echo "<h1>Wellcome back you'll start receiving chunky emails again soon!</h1>";
	  break;
	 
	 case "n": //retrieve next chunk
	  
	  echo "<h1>So you like the book heh? A new chunk will be sent to your email very soon!</h1>";
	  break;
	  
	 case "a": //Accept
	 $db["jobs"][$record_id]["confirmed"] = "true";
	 echo "<h1>Done! you'll start to be hit by chunks very shortly</h1>";
	 break;
	 
	default:
	  
	}

	db::save($db);
?>