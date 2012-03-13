<?php
//Just a test function
class test
{
	public static function run() { print "Works\n"; }
}  

//Sometimes ID are not well organized anymore when elements into dB have been deleted.
//This function reorganize the element ID
//Not very necessary for now, because we want to keep unique fixe ID
function sortID($tableInput)
{
	$table = $tableInput;
	$rowID = mysql_query("SELECT * FROM " .$table. "") or die(mysql_error());
	
	$i=0; 
	while($sortID = mysql_fetch_array($rowID))
		{			
		if($sortID['rowID'] != $i)			
			mysql_query("UPDATE " .$table. " SET rowID = $i WHERE rowID =" .$sortID['rowID']."");		
		$i+=1;
		}
}

//Delete everything inside one specific table
function cleanTable($tableInput)
{
	$table = $tableInput;
	mysql_query("DELETE FROM " .$table. "") or die(mysql_error());	
}

//Extract the parameters passed in the URL thanks to parsing method from PHP
function parseURL()
{
	//URL to parse containing interesting parameters to extract
	//$url = 'localhost/hig/?metricID=MD5&playID=MD5&gameTime=1.2345&eventType=1&eventSubtype=2&x=1&y=2&z=3&magnitude=4.0';
	$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	echo "<p>URL to parse = <font color=red>" .$url. "</font></p>";
	
	//Parse URL only to get the parameters 
	//arrayURL contain the whole URL but each part of it is split into an array
	//It's possible to request each part by calling 'host', 'query' and so on....
	$arrayURL = parse_url($url);
	
	//Parameters are included into the query part
	//It returns all the parameters all side by side
	//We need to parse them again
	$parameters = $arrayURL["query"];
	
	//parse the previous data into an array containing only one data
	parse_str($parameters, $data);		
	
	//Print directly on the website all the date from eventdata table
	echo "<table>";  	
	echo "<tr>";
	print_r("<td>metricID = " .$data['metricID']. "</td>");	
	echo "</tr>";
	print_r("<td>playID = " .$data['playID']. "</td>");	
	echo "</tr>";		
	print_r("<td>gameTime = " .$data['gameTime']. "</td>");	
	echo "</tr>";		
	print_r("<td>eventType = " .$data['eventType']. "</td>");
	echo "</tr>";		
	print_r("<td>eventSubtype = " .$data['eventSubtype']. "</td>");	
	echo "</tr>";		
	print_r("<td>x = " .$data['x']. "</td>");
	echo "</tr>";		
	print_r("<td>y = " .$data['y']. "</td>");
	echo "</tr>";		
	print_r("<td>z = " .$data['z']. "</td>");	
	echo "</tr>";		
	print_r("<td>magnitude = " .$data['magnitude']. "</td>");		
	echo "</tr>";
	echo "</table>";
	echo "<br><br/>";	

	//Insert the URL data into the database
	
	//Should work, but still a problem with $data['metricID']. and .$data['playID'], ERROR PROBLEM says MD5 is not in the field list
	mysql_query("INSERT INTO eventdata (metricMD5, playMD5, eventType, gameTime, eventSubtype, x, y, z, magnitude)
			VALUES ('" .$data['metricID']. "','" .$data['playID']. "'," .$data['eventType']. "," .$data['gameTime']. "," .$data['eventSubtype']. "," .$data['x']. "," .$data['y']. "," .$data['z']. "," .$data['magnitude']. ")") or die(mysql_error());	
	
	//Otherwise, it works if these two parameters are removed
	/*mysql_query("INSERT INTO eventdata (eventType, gameTime, eventSubtype, x, y, z, magnitude)
			VALUES (" .$data['eventType']. "," .$data['gameTime']. "," .$data['eventSubtype']. "," .$data['x']. "," .$data['y']. "," .$data['z']. "," .$data['magnitude']. ")") or die(mysql_error());*/
}	 
?>

