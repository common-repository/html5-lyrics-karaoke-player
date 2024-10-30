<?php
include_once("db.php"); 
include_once("functions.php");

if(isset($_SESSION['file']) && $_SESSION['file']!="")
{

$mp3_song = $_SESSION['mp3_song']; //'audio/'.$_SESSION['file'].'.mp3';
$mp3_lyrics = dirname(__FILE__)."/uploads/".$_SESSION['file'].'.json';

}
else
{

 die("MP3 Missing...");

}

//echo $mp3_song."fdfdf";

$ID = isset($_REQUEST['ID'])?$_REQUEST['ID']:"";
$time = isset($_REQUEST['time'])?$_REQUEST['time']:"";
$text = isset($_REQUEST['text'])?$_REQUEST['text']:"";


$passage = json_decode(file_get_contents($mp3_lyrics)); 

$passage = objectToArray($passage);

//echo "<pre>";
//print_r($passage);

if(isset($ID) && $ID!="")
{

 $passage[$ID] = array($passage[$ID][0], $time, $passage[$ID][2], $passage[$ID][3]);
 file_put_contents($mp3_lyrics, json_encode($passage) );

}


//echo "<pre>";
//print_r($passage);




?>

<?php /*?><span data-dur="0.154" data-begin="0.775">In</span><?php */?>

<div style="padding:10px; font-size:12px" id="passage-text" class="passage">
   
  <p>
  
  <?php foreach($passage as $k=>$p){ ?>
  <span style="cursor:pointer;" onmouseover="jQuery(this).css('background-color', 'yellow');" onmouseout="jQuery(this).css('background-color', 'white');" id="<?php echo $k; ?>" data-dur="<?php echo $p[2]; ?>" data-begin="<?php echo $p[1]; ?>" data-stop="<?php echo $p[3]; ?>"><?php echo $p[0]; ?></span><br />
  <?php } ?>
  
  </p>
  
  
  <a href="<?php echo get_bloginfo('url')."/wp-admin/admin.php?page=html5lyrics_songs&id=".$id."&lyrics=done#fragment-12"; ?>" style="background-color:#D84937; height:35px; color:#ffffff; font-weight:bold; padding:5px;"><span>Customize Player</span></a>
  
</div>





<br />
<br />

<hr />