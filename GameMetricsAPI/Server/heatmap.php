<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
   <head>
       <title>Advanced Project Work - Heatmap</title>	
	   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
			<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
			<script type="text/javascript" src="heatmap.js"></script>	
			<script type="text/javascript" src="parameters.js"></script>			
			
	</head>
	<body>
		<div id="main">
			<h1>Realtime heatmap based on game data</h1><br/>
			
			<!-- WARNING ! DO NOT DELETE -->
			<!-- Used to stock data and print heatmap -->
			<div id="heatmapArea">	
			</div>
			
			<div id="configArea">
				<h2>Parameters</h2>
				Here you can select the different parameters to select<br /><br />
				<!--<strong>Note: The object must contain the maximum count</strong>-->
				
				
				<div id="dataset" ></div>
				<!--<div id="dataset" class="btn">Apply DataSet</div>-->
				<!-- Random data generation -->
				<!--<div id="gen" class="btn">Generate some random data</div>-->
				
				<?php
				include 'connect.php';
				mysql_select_db("hig", $dataBase);				
				?>
				
				<form id="parameters">
				<select name="users" onchange="showUser(this.value)">
				<option value="">-- select a parameter --</option>
				<option value="1">Trajectory</option>
				<option value="2">Death</option>
				<option value="3">Weapons</option>
				<option value="4">Team</option>
				</select>
				</form>
				<br />
				<!--<div id="txtHint"><b>Person info will be listed here.</b></div>	-->		
			</div>						
		</div>
		
		
		
		<script type="text/javascript">	
		window.onload = function(){
			var xx = h337.create({"element":document.getElementById("heatmapArea"), "radius":25, "visible":true});
			
			xx.get("canvas").onclick = function(ev){
				var pos = h337.util.mousePosition(ev);
				xx.store.addDataPoint(pos[0],pos[1]);
			};
			
			document.getElementById("dataset").onclick = function(){
				var el = document.getElementById("data").value;
				var obj = eval('('+el+')');
				
				// call the heatmap's store's setDataSet method in order to set static data
				xx.store.setDataSet(obj);
			};
			/*Random data generation*/
			/*document.getElementById("gen").onclick = function(){
				xx.store.generateRandomDataSet(100);
			};*/			
			
			var test = { max: 90, data: [
			<?php
				include 'connect.php';
				mysql_select_db("gameball", $dataBase);
				
				$table = 'eventdata';
				$metrics = mysql_query("SELECT * FROM " .$table. "") or die(mysql_error());
			
					while($row = mysql_fetch_array($metrics))
					{	
						echo "{x: " .$row['x']. ", y: " .$row['y']. ", count: " .$row['magnitude']. "},";
					}
			?>
						]};
			xx.store.setDataSet(test);
		};		
		</script>		

		<script type="text/javascript">
			var pkBaseURL = (("https:" == document.location.protocol) ? "https://www.patrick-wied.at/helper/piwik/" : "http://www.patrick-wied.at/helper/piwik/");
			document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
			</script><script type="text/javascript">
			try {
			var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
			piwikTracker.trackPageView();
			piwikTracker.enableLinkTracking();
			} catch( err ) {}
		</script><noscript><p><img src="http://www.patrick-wied.at/helper/piwik/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
	<!-- End Piwik Tag -->

	</body>
</html>
