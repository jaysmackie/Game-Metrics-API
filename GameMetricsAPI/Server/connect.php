<?php 
$dataBase = mysql_connect('localhost','logging', ''); 
if (!$dataBase) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
//echo 'Connection OK';  
?> 