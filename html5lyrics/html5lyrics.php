<?php
include_once("config.php"); 

//include_once("db.php"); 
include_once("functions.php");


//if(function_exists("wp_enqueue_scripts")) echo "wp_enqueue_scripts";

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
{

$qq = "select * from `".$table."` where id = '".$_REQUEST['id']."' ";
//$docdata = mysql_fetch_assoc($qq);

$docdata = $wpdb->get_results($qq, ARRAY_A)[0];

$mp3_song = $docdata['mp3']; //$_SESSION['mp3_song']; //'audio/'.$_REQUEST['file'].'.mp3';
$mp3_lyrics = 'uploads/'.$docdata['file'].'.json';
//$mp3_images = 'tool/audio/i'.$_REQUEST['file'].'.json';

}
else
{

 $mp3_song = "http://www.svnlabs.com/mp3/svnlabs1.mp3"; //$_SESSION['mp3_song']; //'audio/'.$_REQUEST['file'].'.mp3';
 $mp3_lyrics = 'uploads/sample.json';
 //$mp3_images = 'tool/audio/i1342864411.json';

}



/*global $wpdb;
$table		=	$wpdb->prefix.'payper_playlist';	*/

if(in_array("exec", $_REQUEST)) die("Navigate Back!!");
if(in_array("<script", $_REQUEST)) die("Navigate Back!!");

$inside = 0;

if(isset($_REQUEST['width']) && $_REQUEST['width']!="")
{
  $width=$_REQUEST['width'];
}
else
{
  $width = '600';
}

if(isset($_REQUEST['height']) && $_REQUEST['height']!="")
{
  $height=$_REQUEST['height'];
}
else
{
  $height = '350';
}


if(isset($_REQUEST['stitle']) && $_REQUEST['stitle']!="")
{
  $stitle=$_REQUEST['stitle'];
}
else
{
  $stitle = '0';
}

if(isset($_REQUEST['size']) && $_REQUEST['size']!="")
{
  $size=$_REQUEST['size'];
}
else
{
  $size = 'full';
}


if(isset($_REQUEST['links']) && $_REQUEST['links']!="")
{
  $links=$_REQUEST['links'];
}
else
{
  $links = '0';
}


$c=array('DA1D1E', '497BF3', '13A536', 'F6C230', '343434');
$rnd = rand(0,4);


if(isset($_REQUEST['fcolor']) && $_REQUEST['fcolor']!="")
{
  $fcolor=$_REQUEST['fcolor'];
}
else
{
  $fcolor = '000000'; //$c[$rnd];
}


if(isset($_REQUEST['bcolor']) && $_REQUEST['bcolor']!="")
{
  $bcolor=$_REQUEST['bcolor'];
}
else
{
  $bcolor = 'ff0000'; //$c[$rnd];
}



if($width<150)
 $width = '150';

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
{
  $id=$_REQUEST['id'];
}
else
{
  $id = '0';
  
}


if(isset($_REQUEST['host']) && $_REQUEST['host']!="")
{
  $host = $_REQUEST['host'];
  //add_host($host);
}
else
{
  $host = $siteurl;
  
}


$prms = 'id='.$id.'&size='.$size.'&width='.$width.'&height='.$height.'&links='.$links.'&stitle='.$stitle.'&fcolor='.$fcolor.'&bcolor='.$bcolor.'&host='.$host;


$phps = basename($_SERVER['PHP_SELF']);

?><style type="text/css">

body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}

img {border:none;}

</style>


<?php /*?><div align="center" style="width:<?php echo ($width-30); ?>px; height:<?php echo ($height-30); ?>px; border:1px solid #<?php echo $fcolor; ?>; background: #<?php echo $bcolor; ?>; -webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;"><?php */?>

<br />

<?php

//$xml = simplexml_load_file($xml_file);

if($id)
{ 

?>


<?php


/*wp_register_style( 'custom-style01', plugins_url('/html5lyrics/css/style-player.css', __FILE__) );
wp_enqueue_style( 'custom-style01' );

wp_register_style( 'custom-style02', plugins_url('/html5lyrics/tip/tipsy.css', __FILE__) );
wp_enqueue_style( 'custom-style02' );


wp_register_script( 'custom-script01', plugins_url( '/html5lyrics/js/core-max-player.js', __FILE__ ) );
wp_enqueue_script( 'custom-script01' );

wp_register_script( 'custom-script02', plugins_url( '/html5lyrics/audiojs/audio.js', __FILE__ ) );
wp_enqueue_script( 'custom-script02' );

wp_register_script( 'custom-script03', plugins_url( '/html5lyrics/tip/jquery.tipsy.js', __FILE__ ) );
wp_enqueue_script( 'custom-script03' );*/



?>




<link rel="stylesheet" type="text/css" media="screen" href="css/style-player.css" />

<script src="js/html5lyrics.js"></script>

<script src="audiojs/audio.js"></script>

<script src="tip/jquery.tipsy.js"></script>

<link rel="stylesheet" type="text/css" href="tip/tipsy.css">

<script src="js/core-max-player.js"></script>

    


      <div id="wrapper">
    
    
    
    
    <div id="current_playlist" class="open" style="z-index:1000; position:fixed;">
                <div id="current_playlist_header">
                    <div title="Close" id="current_playlist_close" onClick="$('#current_playlist').slideToggle();"></div>
                    <div class="current_playlist_header_item">Playlist</div>
                </div>
                    <ol style="padding-left:10px; overflow:auto; width:99%; height:360px;">
                    
                    <li><a href="#" data-src="<?php echo $mp3_song; ?>">Area Show March 9, 2012</a></li>
                     
                                            
                    
                    </ol>
            </div>
       
      
      
      
      <div id="lyrics" style="display:none">
	          
        <?php 
		
		$passage = json_decode(file_get_contents($mp3_lyrics)); 
		
		foreach($passage as $k=>$p){ 
		
		?>
        
	    <span id="ID<?php echo $p[1]; ?>"  data-start="<?php echo $p[1]; ?>" data-stop="400"><?php echo $p[0]; ?></span> 
	    
        <?php } ?>
        
        
       <?php /*?> <?php 
		
		$passage = json_decode(file_get_contents($mp3_images)); 
		
		foreach($passage as $k=>$p){ 
		
		?>
        
        <span id="IMG<?php echo $p[1]; ?>"  data-start="<?php echo $p[1]; ?>" data-stop="400"><img src="tool/uploads/<?php echo $p[0]; ?>.jpg" border="0"></span> 
	    
        <?php } ?><?php */?>
        
        
        
	</div>
      
      
      
      
      
    </div>
     
    
<!--      <div id="Play-back"><a style="cursor:pointer;" id="prev_track" title="previous track"><img src="images/back-img.png" width="26" height="26" alt="back" /></a></div>
      <div id="Play-next"><a style="cursor:pointer;" id="next_track" title="next track"><img src="images/next-btn.png" width="26" height="26" alt="next" /></a></div>-->
 
    
    
    
      
    <div align="center" class="myFloatBar1">
    
    <div id="images"></div>   
   
    
    </div>
    
    <div class="myFloatBarTop">
    
    <div id="lyrics1" style="font-size: 30px; font-style: italic; color: #ccc; font-family: 'Garamond Premier';"></div>
    
    <?php /*?> <div id="lyrics2" style="float:right; padding-right:20px;">
    <p></p>
    </div><?php */?>
    
    </div>

<div align="center" class="myFloatBar"><audio preload></audio></div>

    
    <script language="javascript">
	
	jQuery(function(){
      //$('.foo').tipsy({gravity: 's', fade: true});
	  jQuery('.prev').tipsy({gravity: 's', fade: true});
	  jQuery('.next').tipsy({gravity: 's', fade: true});
	  
	  jQuery('.shuffle').tipsy({gravity: 's', fade: true});
	  jQuery('.plus').tipsy({gravity: 's', fade: true});
	  jQuery('.f').tipsy({gravity: 's', fade: true});
	  jQuery('.play').tipsy({gravity: 's', fade: true});
	  jQuery('.pause').tipsy({gravity: 's', fade: true});
	  
	  jQuery('.loading').tipsy({gravity: 's', fade: true});
	  jQuery('.error').tipsy({gravity: 's', fade: true});
	  
	  jQuery('.scrubber').tipsy({gravity: 's', fade: true});
	  jQuery('.time').tipsy({gravity: 's', fade: true}); 
	  
	  jQuery('.progress').tipsy({gravity: 's', fade: true}); 
	  jQuery('.loaded').tipsy({gravity: 's', fade: true}); 
	  
	  
    });
	
	</script>

<?php

}

?>

<?php /*?><div align="center">
<a href="<?php echo $siteurl; ?>prev.php?<?php echo $prms; ?>" style="text-align:left"><strong>&laquo;&nbsp;Prev</strong></a>&nbsp;&nbsp;
<a href="<?php echo $siteurl; ?>next.php?<?php echo $prms; ?>" style="text-align:right"><strong>Next&nbsp;&raquo;</strong></a>
</div><?php */?>

<?php /*?><div style="float:right; padding:7px;"><a href="http://www.svnlabs.com/" target="_blank"><img src="http://blog.svnlabs.com/animated_favicon1.gif" width="20" border="0" alt=""></a>&nbsp;<a href="https://twitter.com/intent/tweet?status=HTML5 Video Player with Playlist http%3A%2F%2Fhtml5.svnlabs.com&amp;url=http%3A%2F%2Fhtml5.svnlabs.com" target="_blank" title="Twitter"><img src="http://html5.svnlabs.com/twitter.png" border="0" width="20"></a>&nbsp;<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhtml5.svnlabs.com" target="_blank" title="Facebook"><img src="http://html5.svnlabs.com/facebook.png" border="0" width="20"></a>&nbsp;<a href="http://html5.svnlabs.com" target="_blank" title="HTML5 Video Player with Playlist"><img src="http://html5.svnlabs.com/link-icon.png" border="0" width="20"></a></div><?php */?>

<?php /*?></div><?php */?>

