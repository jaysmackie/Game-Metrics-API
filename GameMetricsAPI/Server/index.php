<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
   <head>
       <title>Advanced Project Work</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			 <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
   </head>
	 <!--<script type="text/javascript" src="script.js"></script>-->
   <body>
   
	<?php	
	include 'connect.php';
	mysql_select_db("gameMetrics", $dataBase);	
	
	include	'functions.php';
	
	//$table = 'eventdata';
	//cleanTable($table);	
	//sortID($table);
	
	//parseURL();
	
	include 'getmetrics.php';
	?>
	
   </body>
</html>
