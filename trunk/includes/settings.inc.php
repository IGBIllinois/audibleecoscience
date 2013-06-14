<?php
////////////////////////////////////
//						
//	Leakey Podcasts				
//	settings.inc.php			
//						
//	Settings for the scripts.		
//						
//	David Slater				
//	May 2009				
//						
////////////////////////////////////


define("__TITLE__","Podcast Website - University of Illinois at Urbana-Champaign");
define("__VERSION__",0.90);
define("__MYSQL_HOST__","127.0.0.1");
define("__MYSQL_USER__","leakey_user");
define("__MYSQL_PASSWORD__","9CPqhprMaH7RLpsP");
define("__MYSQL_DATABASE__","leakey_podcasts");


$authenticationSettings = array(
			'host' => 'AD-DC-P1.ad.uiuc.edu',
			'baseDN' => 'dc=ad,dc=uiuc,dc=edu',
			'peopleOU' => 'ou=Campus Accounts',
			'bind_user' => 'cn=igb_ad,ou=igb,dc=ad,dc=uiuc,dc=edu',
			'bind_pass' => 'ha2a8aveqazE7rUW',	
			'ssl' => '0',
			'port' => '636',
			'group' => ''
			);

$relPodcastDirectory = "/leakey/podcasts/";
$absPodcastDirectory = "/var/www/leakey/podcasts/";
$version = "0.9";
$webaddress = "http://dslater-lnx.igb.uiuc.edu/leakey/";

//Possible errors when you upload a file
$uploadErrors = array(
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
    3 => 'The uploaded file was only partially uploaded.',
    4 => 'No file was uploaded.',
    6 => 'Missing a temporary folder.',
    7 => 'Failed to write file to disk.',
    8 => 'File upload stopped by extension.',
);


?>