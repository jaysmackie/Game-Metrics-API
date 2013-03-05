<?php

require("db.php");

if ($_REQUEST["metricID"] && $_REQUEST["playID"] && $_REQUEST["eventType"] && $_REQUEST["eventSubtype"] != "")
{
	$_metricID = $_REQUEST["metricID"];
    $_playID = $_REQUEST["playID"];
    $_eventType =  $_REQUEST["eventType"];
    $_eventSubtype =  $_REQUEST["eventSubtype"];

	$_gameTime = isset($_REQUEST['gameTime']) ? $_REQUEST['gameTime'] : 0;
	$_x = isset($_REQUEST['x']) ? $_REQUEST['x'] : -999999;
	$_y = isset($_REQUEST['y']) ? $_REQUEST['y'] : -999999;
	$_z = isset($_REQUEST['z']) ? $_REQUEST['z'] : -999999;
	$_magnitude = isset($_REQUEST['magnitude']) ? $_REQUEST['magnitude'] : -999999;
	$_dataString = isset($_REQUEST['dataString']) ? $_REQUEST['dataString'] : "";
			
	$query = "INSERT INTO eventdata 
				VALUES
				(NULL, '$_metricID', '$_playID', NULL, '$_gameTime', '$_eventType', '$_eventSubtype', '$_x', '$_y', '$_z', '$_magnitude', '$_dataString')";

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
				echo '{ "status": "ok", "Events for ' . $metricID. '": ' .$row->c. '}';
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