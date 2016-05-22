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
	<title>Sprint Backlog</title>
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
	
	$query = "SELECT ID, CurrentSprint FROM project WHERE ProjectName = '".$_SESSION["Project"]."'";
	$result = mysqli_query($link, $query);		//id en huidige sprint van project opvragen
	$row = mysqli_fetch_assoc($result);
	
	$pid = $row["ID"];
	$CurrentSprint = $row["CurrentSprint"];
	
	$query = "SELECT ID, USDescription FROM userstory
				WHERE Project = '".$pid."' AND Sprint = '".$CurrentSprint."'
				AND Status = 'ToDo'";
	$resultToDo = mysqli_query($link, $query);		//query voor to do takenD

	$query = "SELECT ID, USDescription FROM userstory
				WHERE Project = '".$pid."' AND Sprint = '".$CurrentSprint."'
				AND Status = 'InProgress'";
	$resultInProg = mysqli_query($link, $query);		//query voor taken in progress
	
	$query = "SELECT ID, USDescription FROM userstory
				WHERE Project = '".$pid."' AND Sprint = '".$CurrentSprint."'
				AND Status = 'Done'";
	$resultDone = mysqli_query($link, $query);		//query voor afgewerkte taken
	
	mysqli_close($link);
?>
	<div id = "wrapper">
		<?php
			include("Menubar.php");
		?>
		<div id = "main">
			<div class= "dashboardInfo">
				<h2>To Do</h2>
			</div>
			<div class= "dashboardInfo">
				<h2>In Progress</h2>
			</div>
			<div class= "dashboardInfo">
				<h2>Done</h2>
			</div>
			<div class = "sprint" id = "DivToDo" style = "float: left">
				<?php
					while($row = mysqli_fetch_assoc($resultToDo))
					{
						$USid = $row["ID"];
						//userstory's to do
						echo "<div class = 'story' style = 'background-color: red'>";
							echo "<form method = 'POST' action = 'MoveTask.php'>";
								echo "<p>".$row["USDescription"]."</p>"; 
								echo "<button type = 'submit' name = 'InProg' value = '".$USid."'>Select</button>";
							echo "</form>";
						echo "</div>";
					}
				?>
			</div>			
			<div class = "sprint" id = "DivInProg" style = "margin-left: 3px">	<!--margin left niet ideaal-->
				<?php
					while($row = mysqli_fetch_assoc($resultInProg))
					{
						$USid = $row["ID"];
						//userstory's in progress
						echo "<div class = 'story' style = 'background-color: orange'>";
							echo "<form method = 'POST' action = 'MoveTask.php'>";
								echo "<p>".$row["USDescription"]."</p>"; 
								echo "<button type = 'submit' name = 'ToDo' value = '".$USid."'>Undo</button>";
								echo "<button type = 'submit' name = 'Done' value = '".$USid."'>Done</button>";
							echo "</form>";
						echo "</div>";
					}
				?>
			</div>			
			<div class = "sprint" id = "DivDone" style = "float: right">
				<?php
					while($row = mysqli_fetch_assoc($resultDone))
					{
						$USid = $row["ID"];
						//userstory's done
						echo "<div class = 'story' style = 'background-color: green'>";
							echo "<form method = 'POST' action = 'MoveTask.php'>";
								echo "<p>".$row["USDescription"]."</p>"; 
								echo "<button type = 'submit' name = 'InProg' value = '".$USid."'>Not Done</button>";
							echo "</form>";
						echo "</div>";
					}
				?>
			</div>
			<button onclick = "showUSadd()" id = "USA">Add User Story</button>
		</div>
		<script type = "text/javascript">			
			function showUSadd()
			{
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function()
				{
					if (xhttp.readyState == 4 && xhttp.status == 200)
					{
						document.getElementById("main").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET", "AJAXNewUS.txt", true);
				xhttp.send();

				document.getElementById("USA").disabled = true;  
			}	
		</script>
	</div>
</body>