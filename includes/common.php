<?php

// Hide emails stored on the website to protect (partially) against spiders.
// from http://www.maurits.vdschee.nl/php_hide_email/
function hide_email($email)
{ 
  $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
	$key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);
	for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];
 	$script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
  $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
	$script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';
	$script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 
	$script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';
	return '<span id="'.$id.'">[javascript protected email address]</span>'.$script;
}

//define database constants
define("DB_USER","root");
define("DB_PASS","526jxqi");
define("DB_HOST","localhost");
define("DB_NAME","clubs");

//create a DB connection
$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to mysql server.');
mysql_select_db(DB_NAME);

?>
