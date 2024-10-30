<?php 
include_once("db.php"); 
include_once("functions.php");
  
/*$myText="online pharmacy web solution"; 
  
$strToken=strtok($myText," "); 
  
while($strToken){ 
  
 echo $strToken."<br>";   
  
 $strToken=strtok(" "); 
  
} */


//echo "<pre>";

$fs = fopen(dirname(__FILE__)."/uploads/".$file.".txt", "r");
$i = 0;
while (!feof($fs)) {
	$line_of_text .= fgets($fs);
}
$members = explode("\n", $line_of_text);
fclose($fs);
//print_r($members);

$i=0;
$lyrics = array();

$c = count($members);

//$dur = 100 / $c;
  
$dur = 1;  
  
foreach($members as $m)
{

if(count_words($m)<=5) $dd=-2; else $dd=2;

$j = $i+$dur+$dd;

$lyrics["ID".$i] = array($m, $i, $dur, $j);

$i=$i+$dur;

} 


  
$echo = json_encode($lyrics);  

file_put_contents(dirname(__FILE__)."/uploads/".$file.".json", $echo);  
  
?> 