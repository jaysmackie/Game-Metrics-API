<?php 
$dataBase = mysql_connect('localhost','', ''); 
if (!$dataBase) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
//echo 'Connection OK';  
?> 