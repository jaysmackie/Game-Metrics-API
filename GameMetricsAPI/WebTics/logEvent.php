metricID=<?php

require("db.php");

if ($_REQUEST["metricID"] && $_REQUEST["playID"] && $_REQUEST["eventType"] && $_REQUEST["eventSubtype"] != "")
{
	$metricID = $_REQUEST["metricID"];
    $playID = $_REQUEST["playID"];
    $eventType =  $_REQUEST["eventType"];
    $eventSubtype =  $_REQUEST["eventSubtype"];

	$gameTime = isset($_REQUEST['gameTime']) ? $_REQUEST['gameTime'] : 0;
	$_x = isset($_REQUEST['_x']) ? $_REQUEST['_x'] : -1;
	$_y = isset($_REQUEST['_y']) ? $_REQUEST['_y'] : -1;
	$_z = isset($_REQUEST['_z']) ? $_REQUEST['_z'] : -1;
	$_magnitude = isset($_REQUEST['_magnitude']) ? $_REQUEST['_magnitude'] : -1;
			
	$query = "INSERT INTO eventdata 
				VALUES
				(NULL, '$metricID', '$playID', NULL, '$gameTime', '$eventType', '$eventSubtype', '$_x', '$_y', '$_z', '$_magnitude')";

	$result = mysql_query($query);			

	if (mysql_affected_rows() > 0)
	{
		$query = "select count(*) c FROM eventdata WHERE metricMD5 = '$metricID'";
		$result = mysql_query($query);
		
		if (mysql_affected_rows() > 0)
		{
			$row = mysql_fetch_object($result);
			$count = $row->c;
			if ($count >= 0)
			{
				echo '{ "status": "ok", Events for ' . $metricID. ' = ' .$row->c. '}';
				$error = 1;
			}
		}
		else
		{
			echo '{ "status" : "ok" }';
		}
	}
	else
	{
		echo '{ "status": "dbError", "reason" : "insert failed"}';
	}
}
else
{
	if (!$_REQUEST["metricID"])
		echo '{ "status": "metricID", "reason" : "bad param"}';
	else if (!$_REQUEST["playID"])
		echo '{ "status": "playID", "reason" : "bad param"}';
	else if (!$_REQUEST["eventType"] || $_REQUEST["message"] == "")
		echo '{ "status": "eventType", "reason" : "bad param"}';
	else if (!$_REQUEST["eventSubtype"] || $_REQUEST["message"] == "")
		echo '{ "status": "eventSubtype", "reason" : "bad param"}';
}
?>