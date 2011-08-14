<?php
//TODO Remove me when done
// ini_set('error_reporting', E_ALL | E_STRICT);
// ini_set('display_errors', 1);

define ("UPLOADFOLDERPATH", "uploads/");
define ("TEMP_PATH", "temp/");

define("HOST",$_SERVER['SERVER_NAME']);

require_once('fileuploader.php');
require_once('pdf_chunker.php');
require_once('mailer.php');
require_once('db.php');
require_once('helpers.php');

?>