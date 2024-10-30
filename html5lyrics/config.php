<?php
//if (!session_id()) session_start();
@session_start();
error_reporting(0);
include_once("../../../../wp-config.php");

$table = $table_prefix.'html5lyrics_songs';

$siteurl = plugin_dir_url(__FILE__);

if( basename($_SERVER['REQUEST_URI']) == "html5lyrics.js.php" ) {

$uri = explode("html5lyrics.js.php", $_SERVER['REQUEST_URI']);

$siteurl = "http://".$_SERVER['HTTP_HOST'].$uri[0];

$_SESSION['siteurl'] = $siteurl;

}
else
{

 $siteurl = $_SESSION['siteurl'];

}



/*$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link) {
    die('Not Connected : ' . mysql_error());
}

// connect to database
$db_selected = mysql_select_db(DB_NAME, $link);

mysql_query("SET character_set_client=utf8", $link);
mysql_query("SET character_set_connection=utf8", $link);
mysql_query("SET character_set_results=utf8", $link);

if (!$db_selected) {
    die ('Can\'t Connected : ' . mysql_error());
}*/



function format_number($number, $symbol = false )
{
   
    return  $symbol==true ? "£".number_format($number, 2, '.', '') : number_format($number, 2, '.', '');
}



function isValidEmail($email){
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email);
}


function is_valid_email($email)
{
	if(preg_match("/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/", $email) > 0)
		return true;
	else
		return false;
}


//if(isValidEmail("sriniv_1293527277_biz@inbox.info")) echo "SSSSSSSSSSS"; else echo "VVVVVVVVVVV";

?>