<?php
	session_start();
	
	if(isset($_POST["SelectProj"]))
	{
		$_SESSION["Project"] = $_POST["SelectProj"];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<link href = "reset.css" rel = "stylesheet"/>
	<link href = "Scrum.css" rel = "stylesheet"/>
	<title>Home</title>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {packages: ['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		
		function drawChart() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Sprint', 'Tasks left', 'Ideal'],
         ['1',  100, 100],
         ['2',  90, 95],
         ['3',  80, 85],
         ['4',  70, 75],
         ['5',  60, 65],
         ['6',  50, 55],
         ['7',  40, 45],
         ['8',  30, 35],
         ['9',  20, 25],
         ['10', 10, 0]
		]);

		var options = {
		  title : 'Burndown Chart',
		  vAxis: {title: 'User stories'},
		  hAxis: {title: 'Sprint'},
		  seriesType: 'bars',
		  series: {1: {type: 'line'}}
		};

      // Instantiate and draw the chart.
      var chart = new google.visualization.ComboChart(document.getElementById('ComboChart'));
      chart.draw(data, options);
    }
	</script>
</head>
<body>
	<div id = "wrapper">
		<?php
			include("Menubar.php");
		?>		
		<div id = "main">
			<div id = "ComboChart">
			</div>
		</div>
</body>
</html>