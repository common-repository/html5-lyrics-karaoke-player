<?php
include_once("db.php"); 
include_once("functions.php");

if(isset($_SESSION['file']) && $_SESSION['file']!="")
{

$mp3_song = $_SESSION['mp3_song']; //'audio/'.$_SESSION['file'].'.mp3';
$mp3_lyrics = 'audio/i'.$_SESSION['file'].'.json';

}
else
{

 die("MP3 Missing...");

}


$ID = isset($_REQUEST['ID'])?$_REQUEST['ID']:"";
$time = isset($_REQUEST['time'])?$_REQUEST['time']:"";
$text = isset($_REQUEST['text'])?$_REQUEST['text']:"";


$passage = json_decode(file_get_contents($mp3_lyrics)); 

$passage = objectToArray($passage);

//echo "<pre>";
//print_r($passage);

if(isset($ID) && $ID!="")
{

 $passage[$ID] = array($ID, $time, $passage[$ID][2], $passage[$ID][3]);
 file_put_contents($mp3_lyrics, json_encode($passage) );

}


//echo "<pre>";
//print_r($passage);




?>