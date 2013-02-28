<?php

$host = '127.0.0.1';
$database = 'WebTics';
$user = 'WebTicsUser';
$pass = 'WebTicsUser';

error_reporting(E_ALL ^ E_NOTICE); 

$con = mysql_connect($host, $user, $pass);

if (!$con)
{
	die ('could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($database);
if (!$db_selected) 
{
    die ("Can\'t use ".$database." : " . mysql_error());
}
header("Content-type: text/html; charset=utf-8");

?>
