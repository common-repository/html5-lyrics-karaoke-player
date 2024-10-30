<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Share This</title>
</head>

<body>
<?php

if(isset($_REQUEST['mp3']) && $_REQUEST['mp3']!="")
{
 $mp3 = $_REQUEST['mp3'];
 $title = str_replace(".mp3", "", basename($_REQUEST['mp3']));
}
else
{
 $mp3 = "http://html5.svnlabs.com/";
 $title = "HTML5+MP3+Lyrics+Karaoke+Player";
} 

?>

<table align="center" width="90%" border="0" cellspacing="1" cellpadding="1">
  <tr>
  <td colspan="2">
  
  <h2>SHARE THIS PLUGIN</h2>
<p>Share what you're using to with friends and followers.</p>
  
  </td>
  </tr>

  <tr>
    <td><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($mp3); ?>"><img src="images/ff.jpg" width="150" border="0" /></a></td>
    <td><a target="_blank" href="https://twitter.com/intent/tweet?status=<?php echo $title; ?>++<?php echo urlencode($mp3); ?>&url=<?php echo urlencode($mp3); ?>"><img src="images/tt.jpg" width="150" border="0" /></a></td>
  </tr>
</table>


</body>
</html>
