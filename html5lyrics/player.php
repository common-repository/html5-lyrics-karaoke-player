<?php


$content = "\n<!-- html5lyrics BEGIN -->\n"
                .'<script type="text/javascript">'
                ."\n//<!--\n"
                ."var id = '".$id."';\n"
				."var width = '".$width."';\n"
				."var height = '".$height."';\n"
				."var fcolor = '".$fcolor."';\n"
				."var bcolor = '".$bcolor."';\n"
				."var stitle = '".$stitle."';\n"
				."var size = '".$size."';\n"
				."var links = '".$links."';\n";				

$content .= "\n//-->\n</script>\n";			 

$content .= "\n".'<script type="text/javascript" src="'.$pluginurl.'html5lyrics/html5lyrics.js.php">';
$content .= "</script>\n";

$content .= "\n<!-- html5lyrics END -->";
			 



?>