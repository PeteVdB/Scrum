<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<link href = "reset.css" rel = "stylesheet"/>
	<link href = "Scrum.css" rel = "stylesheet"/>
	<title>Product Backlog</title>
</head>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "scrum";

	$link = mysqli_connect($servername, $username, $password, $DBname);	
	// Check connection
	if (!$link)
	{
		echo "Connection failed<br/>";
	}
	
	$query = "SELECT ID FROM project WHERE ProjectName = '".$_SESSION["Project"]."'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	
	$query = "SELECT ID, USDescription FROM userstory
	WHERE Project = '".$row["ID"]."' AND Status <> 'Done'";
	$result = mysqli_query($link, $query);
	
	mysqli_close($link);
?>
	<div id = "wrapper">
		<?php
			include("Menubar.php");
		?>
		<div id = "main">
			<div id = "Backlog">
				<?php
					while($row = mysqli_fetch_assoc($result))
					{
						$USid = $row["ID"];
						//userstory's to do
						echo "<div class = 'story'>";
							echo "<p>".$row["USDescription"]."</p>"; 
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>