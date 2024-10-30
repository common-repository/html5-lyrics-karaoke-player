<?php

if(isset($_REQUEST['page']) && $_REQUEST['page']=="html5lyrics_saved_song") {

echo '<h2>HTML5 Lyrics Karaoke Player</h2><br>';

}

?>

<table class="wp-list-table widefat fixed" cellspacing="0" style="margin-top:20px;">
	<thead>
	<tr style="padding:5px;">		
        <th align="left" scope="col" width="10%"><a href="#">Song ID</a></th>
        <th abbr="left" scope="col" width="45%"><a href="#">MP3</a></th>
        <th align="left" scope="col" width="20%"><a href="#">Shortcode</a></th>
        <th align="left" scope="col" width="20%"><a href="#">Lyrics</a></th>
        <th align="left" scope="col" width="10%"><a href="#">Edit</a></th>	
        <th align="left" scope="col" width="10%"><a href="#">Delete</a></th>	
     </tr>
	</thead>

<?php /*?>	<tfoot>
	<tr>
	    <th align="left" scope="col" width="15%"><a href="#">Title</a></th>
        <th align="left" scope="col" width="10%"><a href="#">XML</a></th>
        <th align="left" scope="col" width="10%"><a href="#">Edit</a></th>	
        <th align="left" scope="col" width="10%"><a href="#">Delete</a></th>	 
     </tr>
	</tfoot><?php */?>

	<tbody id="the-list">
    
    <?php
		$sql		=	"SELECT * FROM `".$table."`";

    $results = $wpdb->get_results($sql, ARRAY_A);

    //print_r($results);

    foreach ($results as $key => $result)
    {	
	?>

    <tr>
        <td align="left"><a href="admin.php?page=html5lyrics_songs&id=<?php echo $result['id']; ?>"><?php echo "Song-".$result['id']; ?></a></td>
        <td align="left"><a href="<?php echo $result['mp3']; ?>" target="_blank"><?php echo $result['mp3']; ?></a></td>
        <td align="left" width="10%"><?php echo $shortcode = '[html5lyrics id='.$result['id'].']';	; ?></td>
        <td align="left" width="10%"><a href="<?php echo plugin_dir_url(__FILE__)."uploads/".$result['file'].".json"; ?>" target="_blank"><?php echo $result['file']; ?></a></td>
        <td align="left" width="10%"><a href="admin.php?page=html5lyrics_songs&action=update&id=<?php echo $result['id']; ?>">Update</a></td>
        <td align="left" width="10%"><a onclick="return confirm('Are you sure?');" href="admin.php?page=html5lyrics_songs&action=delete&id=<?php echo $result['id']; ?>">Delete</a></td>
	</tr>
	
    <?php } ?>
  	
  </tbody>
</table>   