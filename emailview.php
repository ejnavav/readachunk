<?php

function get_email_text($record_id){
    //TODO make the hostname not static
    $urlbase = "http://www.readachunk.com/jobcontrol.php?";
    $urlrecord = "record_id=$record_id";
    $urlid = $urlbase . $urlrecord;

    $urlstop = "<a href='$urlid&a=s'># Stop</a>";
    $urlpause = "<a href='$urlid&a=p'>|| Pause</a>";
    $urlresume = "<a href='$urlid&a=r'>> Start</a>";
    $urlnext = "<a href='$urlid&a=n'>>> Next Chunk</a>";


    $texthtmlstart = "<html><body>";
    $texthtmlend = "</body></html>";
    $textheader = "";
    $textbody = "Read it now!\n\n";
    $textplayer = "<br><br> Chunk player $urlpause $urlresume $urlstop $urlnext\n";
    $textfooter = "<br><hr> This service is provided by <a href='www.readachunk.com'>www.ReadAchunk.com</a>\n";

    $body = $texthtmlstart . $textheader . $textbody . $textplayer . $textfooter . $texthtmlend;
    return $body;
}

?>