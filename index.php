<?php

/*
Plugin Name: HTML5 Lyrics Karaoke Player
Plugin URI: http://html5.svnlabs.com/karaoke-html5-mp3-player-with-lyrics/
Description: HTML5 Lyrics Karaoke Player Plugin enable wordpress users to sing and play song text lyrics. 
Date: 2012, Nov, 14
Author: Sandeep Verma
Author URI: http://www.svnlabs.com/
Version: 2.4

*/

/*
Author: Sandeep Verma
Website: http://www.svnlabs.com
Copyright 2012 SVN Labs Softwares, Jaipur, India All Rights Reserved.

*/


//Database table versions
global $html5lyrics_player_db_table_version;
$html5lyrics_player_db_table_version = "1.0";

//Create database tables
function html5lyrics_db_create () {
    html5lyrics_create_table_player();
}


/*wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'jquery-ui-core' );
wp_enqueue_script( 'jquery-ui-tabs' );*/


function html5lyrics_create_table_player(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name_song = $wpdb->prefix . "html5lyrics_songs";

	
    global $html5lyrics_player_db_table_version;
    $installed_ver = get_option( "html5lyrics_player_db_table_version" );
     
	//Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name_song'") != $table_name_song ||  $installed_ver != $html5lyrics_player_db_table_version ) {
        $sql = "CREATE TABLE " . $table_name_song . " (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `url` varchar(255) NOT NULL,
                `mp3` text NOT NULL,
                `file` varchar(20) NOT NULL,
                `adddate` datetime NOT NULL,
                 PRIMARY KEY (`id`)
				); ";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
		//dbDelta($sql);
		$wpdb->query($sql);
		
		
		$sql1 = "INSERT INTO `". $table_name_song ."` (`id`, `url`, `mp3`, `file`, `adddate`) VALUES (1, 'localhost', 'http://html5mp3player.googlecode.com/svn/trunk/mp3/svnlabs1.mp3', 'sample', '2012-07-22 12:52:32'); ";
		
		$wpdb->query($sql1);
		
		
		}
		
		
    //Add database table versions to options
    add_option("html5lyrics_player_db_table_version", $html5lyrics_player_db_table_version);
}

register_activation_hook( __FILE__, 'html5lyrics_db_create' );


add_action( 'admin_menu', 'html5lyrics_plugin_menu' );


function html5lyrics_plugin_menu() {
	add_menu_page( 'HTML5 Lyrics Player', 'HTML5 Lyrics Player', 'html5lyrics_songs', 'html5lyrics-options', 'wp_html5lyrics_options',plugin_dir_url( __FILE__ )."/html5mp3.png" );
	/*add_submenu_page('html5lyrics-options','','','manage_options','html5lyrics-options','wp_html5lyrics_options');*/
	add_submenu_page('html5lyrics-options', 'Manage Songs', 'Manage Songs', 'manage_options', 'html5lyrics_songs', 'wp_html5lyrics_songs' );
	add_submenu_page('html5lyrics-options', 'Saved Songs', 'Saved Songs', 'manage_options', 'html5lyrics_saved_song', 'wp_html5lyrics_saved_song' );
	//add_submenu_page('html5lyrics-options', 'PayPal', 'PayPal', 'manage_options', 'html5lyrics_paypal', 'wp_add_html5lyrics_paypal' );	
	add_submenu_page('html5lyrics-options','Help','Help','manage_options','html5lyrics_help','wp_html5lyrics_help');
	
}


add_action( 'admin_init', 'register_html5lyricssettings' );

function register_html5lyricssettings() {
	/*register_setting( 'baw-settings-group', 'buy_text' );
	register_setting( 'baw-settings-group', 'color' );
	register_setting( 'baw-settings-group', 'showlist' );
	register_setting( 'baw-settings-group', 'showbuy' );
	register_setting( 'baw-settings-group', 'html5lyrics_description' );
	register_setting( 'baw-settings-group', 'currency' );
	register_setting( 'baw-settings-group', 'tracks' );
	register_setting( 'baw-settings-group', 'tcolor' );*/
}



function wp_html5lyrics_help() {


include 'html5lyrics/help.php';

}



function wp_html5lyrics_options() {

 global $wpdb;
	$table		=	$wpdb->prefix.'html5lyrics_songs';

include 'html5lyrics/formplus.php';

}



function wp_html5lyrics_songs(){

global $wpdb;
$table		=	$wpdb->prefix.'html5lyrics_songs';	
		
include('html5lyrics/index.php');
		
}


function wp_html5lyrics_saved_song(){

global $wpdb;
$table		=	$wpdb->prefix.'html5lyrics_songs';	
		
include('html5lyrics/playlist.php');
		
}




function wp_add_html5lyrics_songs(){

global $wpdb;
$table		=	$wpdb->prefix.'html5lyrics_songs';	
		
include('html5lyrics/index.php');
		
}


/*function wp_add_html5lyrics_paypal(){

global $wpdb;
	$table		=	$wpdb->prefix.'html5lyrics_songs';	
		
include('html5lyrics/paypal.php');
		
}*/



function wp_html5lyrics_player( $atts, $content = null ) {

   global $wpdb;
   $table		=	$wpdb->prefix.'html5lyrics_songs';	
	  
   $pluginurl	=	plugin_dir_url( __FILE__ );

   extract( shortcode_atts( array(
		'id' => '1',
		'width' => '600',
		'height' => '150',
		'fcolor' => '343434',
		'bcolor' => 'ff0000',
		'tcolor1' => 'ffffff',
		'tcolor2' => 'a19b9b',
		'dlicon' => '',
		'dlpos' => '10',
		'links' => '0',
		'stitle' => '0',
		'size' => 'full',
	), $atts ) );

	
	
	/* Actual Player code */
	
	$host = $pluginurl.'html5lyrics/';
	
	
	include('html5lyrics/player.php');
		
	
	/* Actual Player code */

    return '<span>' . $content . '</span>';
}

add_shortcode('html5lyrics','wp_html5lyrics_player');

//add_filter('the_content','wp_html5lyrics_player');

/*function html5lyrics_styles_method() {

    wp_register_style( 'custom-style', plugins_url('/html5lyrics/css/ui.tabs.css', __FILE__) );
    wp_enqueue_style( 'custom-style' );
	
}    
 
add_action('wp_enqueue_styles', 'html5lyrics_styles_method');



function html5lyrics_scripts_method()
{
	
	wp_register_script( 'custom-script', plugins_url( '/html5lyrics/js/ui.tabs.pack.js', __FILE__ ) );
	
	wp_enqueue_script( 'custom-script' );
		
}

add_action( 'wp_enqueue_scripts', 'html5lyrics_scripts_method' );*/


function html5lyrics_scripts_method() {
	
	wp_register_style( 'custom-style', plugins_url('/html5lyrics/css/ui.tabs.css', __FILE__) );
    wp_enqueue_style( 'custom-style' );
	
	//wp_register_style( 'custom-style1', plugins_url('/html5lyrics/css/default.css', __FILE__) );
    //wp_enqueue_style( 'custom-style1' );
	
	wp_register_script( 'custom-script', plugins_url( '/html5lyrics/js/ui.tabs.js', __FILE__ ) );
    wp_enqueue_script( 'custom-script' );
	
	wp_register_script( 'custom-script1', plugins_url( '/html5lyrics/js/jscolor.js', __FILE__ ) );
    wp_enqueue_script( 'custom-script1' );
	
	wp_register_script( 'custom-script2', plugins_url( '/html5lyrics/js/core.js', __FILE__ ) );
    wp_enqueue_script( 'custom-script2' );
	
	
	
}    
 
add_action('wp_enqueue_scripts', 'html5lyrics_scripts_method');
