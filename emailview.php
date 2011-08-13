<?php
require_once ('checkprogress.php');
function get_email_text($record_id){
    //TODO make the hostname not static
    $urlbase = "http://www.readachunk.com/jobcontrol.php?";
    $urlrecord = "record_id=$record_id";
    $urlid = $urlbase . $urlrecord;

    $urlstop = "<a href='$urlid&a=s'># Stop</a>";
    $urlpause = "<a href='$urlid&a=p'>|| Pause</a>";
    $urlresume = "<a href='$urlid&a=r'>> Start</a>";
    $urlnext = "<a href='$urlid&a=n'>>> Next Chunk</a>";
	$progress = check_progress($record_id);
	if ($progress<=25){
		$progress_message = "Ok It's a good start your current progress is $progress%";
	}elseif ($progress<45){
		$progress_message = "Come on man half way mark is almost there keep it going u've read $progress% of your book";
	}elseif ($progress>=45 && $progress <=55){
		$progress_message = "Good Boy! U're half way there. Current progress $progress%";
	}elseif ($progress>55 && $progress<=90){
		$progress_message = "Keep it going mate! U've left the half mark ages ago. currently $progress%";
	}elseif ($progress>90 && $progress < 100){
		$progress_message = "That's finish line is just around the corner only". 100-$progress . "% to go" ;
	}else {
		$progress_message = "Well done boy u've eaten that book";
	}
	
	
    $texthtmlstart = "<html><body>";
    $texthtmlend = "</body></html>";
    $textheader = "";
    $textbody = "Read it now!\n\n $progress_message";
	
    $textplayer = "<br><br> Chunk player $urlpause $urlresume $urlstop $urlnext\n";
    $textfooter = "<br><hr> This service is provided by <a href='www.readachunk.com'>www.ReadAchunk.com</a>\n";

    $body = $texthtmlstart . $textheader . $textbody . $textplayer . $textfooter . $texthtmlend;

    return $body;
}

?>