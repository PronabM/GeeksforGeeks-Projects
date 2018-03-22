<?php

date_default_timezone_set('Asia/Kolkata');
define("HOST","<HOSTNAME>");

//USER DEFINITION
define("DBUSER","<USERNAME>");

//password
define("PASS","<PASSWORD>");

//database name
define("DB","test");

//connect
$conn = mysql_connect(HOST, DBUSER, PASS) or die('Could not connect<br />Please contact the site\'s administrator.');

//select db
$db = mysql_select_db(DB) or die('Could not connect to database<br />Please contact the site\'s administrator.');

?>