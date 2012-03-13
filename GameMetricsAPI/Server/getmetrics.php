<?php		
	$result = mysql_query("SELECT * FROM eventdata") or die(mysql_error());
	
	echo "<table border='1'>
	<tr>
	<th>rowID</th>
	<th>metricMD5</th>
	<th>playMD5</th>
	<th>eventTime</th>
	<th>gameTime</th>
	<th>eventType</th>
	<th>eventSubtype</th>
	<th>x</th>
	<th>y</th>
	<th>z</th>
	<th>magnitude</th>
	</tr>";
	
	while($row = mysql_fetch_array($result))
	  {	  	
	  echo "<tr>";
	  echo "<td>" . $row['rowID'] . "</td>";
	  echo "<td>" . $row['metricMD5'] . "</td>";
	  echo "<td>" . $row['playMD5'] . "</td>";
	  echo "<td>" . $row['eventTime'] . "</td>";
	  echo "<td>" . $row['gameTime'] . "</td>";
	  echo "<td>" . $row['eventType'] . "</td>";
	  echo "<td>" . $row['eventSubtype'] . "</td>";
	  echo "<td>" . $row['x'] . "</td>";
	  echo "<td>" . $row['y'] . "</td>";
	  echo "<td>" . $row['z'] . "</td>";
	  echo "<td>" . $row['magnitude'] . "</td>";	  
	  echo "</tr>";	 
	  }
	echo "</table>";
	
	mysql_close($dataBase);
?> 