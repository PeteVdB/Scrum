<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<link href = "reset.css" rel = "stylesheet"/>
	<link href = "Create.css" rel = "stylesheet" type = "text/css"/>
	<title>Create Project</title>
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
	
	$query = "SELECT CustomerName FROM klanten";
	$result = mysqli_query($link, $query);
	mysqli_close($link);
?>
	<div id = "wrapper">	
		<div id = "main">
			<form method= "post" action = "AddProject.php" id = "CreateProjectForm">
				<div class = "test">
					Naam Project:
					<input type = "text" name = "ProjectNaam" required>
				</div>
				<div class = "test">
					Naam Klant: 
					<?php
						echo "<select name = 'customer' form = 'CreateProjectForm'>";
						while($row = mysqli_fetch_assoc($result))
						{
							$name = $row["CustomerName"];
							echo "<option value =".$name.">".$name."</option>";
						}
						echo "</select>";
					?>
				</div><br/><br/>			
				<!--klant selecteren of toevoegen-->
				Omschrijving: <br/>
				<textarea name = "omschrijving" cols = "80" rows = "10" form = "CreateProjectForm">Description</textarea><br/><br/>
				<input type = "submit" name = "SaveProject" value = "Opslaan">
			</form>
		</div>
	</div>
</body>
</html>