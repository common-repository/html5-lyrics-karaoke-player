<?php
include_once("db.php");

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
 $id = $_REQUEST['id'];
else
 $id = 0;

$qq = "select * from `".$table."` where id = '".$id."' ";

//$docdata = mysql_fetch_assoc($qq);

$docdata = $wpdb->get_results($qq, ARRAY_A)[0];


/* Save Playlist */

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Process")
{

include("process.php");


$qq = "select * from `".$table."` where id = '".$id."' ";

//$docdata = mysql_fetch_assoc($qq);

$docdata = $wpdb->get_results($qq, ARRAY_A)[0];

}

//print_r($docdata);

/* Save Playlist */


?>
	 
		
	 
 
		
		<strong>HTML5 Lyrics Karaoke Player&nbsp;<a href="<?php echo get_bloginfo('url') ;?>/wp-admin/admin.php?page=html5lyrics_songs&id=0" style="background-color:#D84937; height:35px; color:#ffffff; font-weight:bold; padding:5px;">Add New</a></strong> 
        
        
        <br />
        
        <br />
        <br />


<div id="kara-form" align="left">	


<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="47%" valign="top">
    
    <form id="kara" method="post" action="<?php echo get_bloginfo('url') ;?>/wp-admin/admin.php?page=html5lyrics_songs&id=<?php echo $id; ?>">
 	
<label for="name">MP3 Link: </label>
<input type="text" name="mp3_song" size="40" id="mp3_song" placeholder="MP3 Link" value="<?php if($docdata['mp3']!="")  echo $docdata['mp3'];  ?>" title="Enter MP3 Link" class="required"><br>
<br>


<label for="email" style="vertical-align:top">Lyrics: </label>
<textarea name="mp3_lyrics" id="mp3_lyrics" style="width:300px" rows="20" cols="100" placeholder="MP3 Lyrics" title="Enter MP3 Lyrics" class="required"><?php if($docdata['file']!="")  echo file_get_contents(dirname(__FILE__)."/uploads/".$docdata['file'].".txt");  ?></textarea><br>
<br>


<?php /*?><label for="phone">Phone</label>
<input type="tel" name="phone" placeholder="ex. (555) 555-5555"><?php */?>

<?php /*?><label for="website">Website</label>
<input type="url" name="url" placeholder="http://"><?php */?>

<?php /*?><label for="message">Question/Comment</label>
<textarea name="message"></textarea><?php */?>

<input id="token" type="hidden" name="token" value="<?php if($docdata['file']) { echo $docdata['file']; } else { echo time(); } ?>">

<input type="submit" name="submit" class="button" id="submit" value="Process" style="color:#D84937; width:100px; height:50px; font-weight:bolder; " /> 

 
</form>
    
    </td>
    <td width="53%" align="right" valign="top"> 
 <br />
   
<a href="https://www.svnlabs.com/html5plus/shop/html5-mp3-player-with-lyrics/" target="_blank"><span style="color:#FF0000; padding-right:100px"><strong>Paid HTML5 Lyrics Karaoke Player</strong></span>   
    <iframe width="560" height="315" src="http://www.youtube.com/embed/vTGe8Y4O1yU" frameborder="0" allowfullscreen></iframe>


    
    </td>
  </tr>
</table>



</div>
