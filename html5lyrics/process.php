<?php  
include_once("db.php"); 
include_once("functions.php"); 
?>

<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__); ?>css/style.css">

<script language="javascript">

var siteurl = '<?php echo plugin_dir_url(__FILE__); ?>';

</script>

    
    <?php if(isset($_REQUEST['mp3_song']) && $_REQUEST['mp3_song']!="") { 
	
	//$file = time();
	
	$file = $_REQUEST['token'];
	
	$_SESSION['file'] = $file;
	$_SESSION['mp3_song'] = $_REQUEST['mp3_song'];
	
	$mp3_song = isset($_REQUEST['mp3_song'])?$_REQUEST['mp3_song']:'http://www.svnlabs.com/mp3/svnlabs1.mp3';
    $mp3_lyrics = isset($_REQUEST['mp3_lyrics'])?$_REQUEST['mp3_lyrics']:'';
	
	$mp3_text = file_put_contents(dirname(__FILE__)."/uploads/".$file.".txt", $mp3_lyrics);
	
	if( $id == 0 )
	{
	
	include("token.php");
	
	$sql = "insert into `".$table."` set `url` = '".($_SERVER['HTTP_HOST'])."', `mp3` = '".($_REQUEST['mp3_song'])."', `file` = '".($file)."', `adddate` = now() ";

    $wpdb->query($sql);
	
	}
	else
	{
		
	$sql = "update `".$table."` set `url` = '".($_SERVER['HTTP_HOST'])."', `mp3` = '".($_REQUEST['mp3_song'])."', `file` = '".($file)."', `adddate` = now() where id = '".$id."' ";

    $wpdb->query($sql);
	
	
	}
	
	?>
         
        <input type="hidden" id="currentTime" name="currentTime" value="">
        <input type="hidden" id="duration" name="duration" value="">

        <article>
        
        
        <span style="color:#FF0000"><strong>Note: </strong><?php /*?>Please process this form in Google Chrome for best results<br /><?php */?>
        You need to click on song lyrics text lines while you listen song for manual synch of song and lyrics<br /></span>
  

            

            <p class="loading">
                <?php /*?><em><img src="<?php echo plugin_dir_url(__FILE__); ?>loader.gif" alt="Initializing audio"> Loading audio…</em><?php */?>
            </p>

            <p class="passage-audio" hidden>
            
            <?php /*?>ontimeupdate="document.getElementById('tracktime').innerHTML = Math.floor(this.currentTime) + ' / ' + Math.floor(this.duration);"<?php */?>
            
                <?php /*?><audio id="passage-audio" style="width:600px" class="passage" controls ontimeupdate="ontimeupdate(Math.floor(this.currentTime), Math.floor(this.duration))">
                    <!-- @todo WebM? -->
                    <source src="<?php echo $mp3_song; ?>" type="audio/mp3">
                    
                    <em class="error"><strong>Error:</strong> Your browser doesn't appear to support HTML5 Audio.</em>
                </audio><?php */?>
                
                <?php include_once("jplayer.php"); ?>
                
                
                
                
            </p>
            <p class="passage-audio-unavailable" hidden>
                <em class="error"><strong>Error:</strong> You will not be able to do the read-along audio because your browser is not able to play MP3, Ogg, or WAV audio formats.</em>
            </p>

            <p class="playback-rate" hidden title="Note that increaseing the reading rate will decrease accuracy of word highlights">
                <label for="playback-rate">Reading rate:</label>
                <input id="playback-rate" type="range" min="0.5" max="2.0" value="1.0" step="0.1" disabled onchange='this.nextElementSibling.textContent = String(Math.round(this.valueAsNumber * 10) / 10) + "\u00D7";'>
                <output>1&times;</output>
                              
                
            </p>
            <p class="playback-rate-unavailable" hidden>
                <em>(It seems your browser does not support <code>HTMLMediaElement.playbackRate</code>, so you will not be able to change the speech rate.)</em>
            </p>
            <p class="autofocus-current-word" hidden>
                <input type="checkbox" id="autofocus-current-word">
                <label for="autofocus-current-word">Auto-focus/auto-scroll</label>
                
                <?php /*?> &nbsp;&nbsp; <a href="../index.php?file=<?php echo $file; ?>" target="_blank">Preview Karaoke</a><?php */?>
                
            </p>

            <noscript>
                <p class="error"><em><strong>Notice:</strong> You must have JavaScript enabled/available to try this HTML5 Audio read along.</em></p>
            </noscript>

            
            
             
             
             <table width="90%" style="padding:10px" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="60%" valign="top" align="left">
    
    <?php include("script.php"); ?>
            
            <br>

<?php /*?>             &nbsp;&nbsp; <a href="../index.php?file=<?php echo $file; ?>" target="_blank">Preview Final Karaoke</a><?php */?>
    
    </td>
    <?php /*?><td width="40%" valign="top" align="right">
    
    <?php //include("images.php"); ?>
    
    </td><?php */?>
  </tr>
</table>


             
        </article>

 

        <script src="<?php echo plugin_dir_url(__FILE__); ?>js/read-along.js"></script>
        <script src="<?php echo plugin_dir_url(__FILE__); ?>js/main.js"></script>
        
        <?php } ?>
    
    
    