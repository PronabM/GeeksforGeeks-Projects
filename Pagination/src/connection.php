<?php

// Define needed credentials.
define("HOST","localhost");  
define("USER",'root');  
define("PASS",'pass1234');
define("DB",'test');  

// Establish Connection.
$conn = mysql_connect(HOST, USER, PASS) or die ('Error connecting to Database.');  
$connection = mysql_select_db(DB);  

?>