<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<link href = "reset.css" rel = "stylesheet"/>
	<link href = "Scrum.css" rel = "stylesheet"/>
	<title>Home</title>
</head>
<body>
	<div id = "wrapper">
		<?php
			include("Menubar.php");
		?>		
		<div id = "main">
			<div id = "ProjectSelect">
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$DBname = "scrum";
					
					$link = mysqli_connect($servername, $username, $password, $DBname);
					
					if (!$link)	//check connection
					{
						echo "Connection failed<br/>";
					}
					
					$query = "SELECT project.ProjectName, klanten.CustomerName, project.Description FROM project
								INNER JOIN klanten
								ON project.Customer = klanten.ID";
					$result = mysqli_query($link, $query);					
					mysqli_close($link);
				?>
				<form method = "post" action = "Dashboard.php" id = "project">
					<table>
						<tr>
							<th>Projectnaam</th>
							<th>Klant</th>
							<th>Beschrijving</th>
							<th>Actie</th>
						</tr>
						<?php
							while($row = mysqli_fetch_assoc($result))
							{
								$pn = $row["ProjectName"];
								
								echo "<tr>";
									echo "<td>".$pn."</td>";
									echo "<td>".$row["CustomerName"]."</td>";
									echo "<td>".$row["Description"]."</td>";
									echo "<td><button type = 'submit' name = 'SelectProj' value = '".$pn."' id = 'project'>Selecteren</button></td>";
								echo "</tr>";
							}
						?>
					</table>
				</form>
			</div>
			<div id = "ProjectControls">
				<button type = "button" id = "CB" onclick = "ChangePS()">Create Project</button>
			</div>			
			<script>
				function ChangePS() {
				  var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function()
				  {
					if (xhttp.readyState == 4 && xhttp.status == 200)
					{
					  document.getElementById("ProjectSelect").innerHTML = xhttp.responseText;
					}
				  };
				  xhttp.open("GET", "AjaxNewProj.txt", true);
				  xhttp.send();
				  
				  document.getElementById("CB").disabled = true;  
				}
			</script>	
		</div>
	</div>
</body>
</html>