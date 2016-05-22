<!DOCTYPE html>
<html>
<body>
	<div id = "menubar">
		<a href = 'Home.php'><h1 class = menu>Scrum</h1></a>
		<?php
			if (isset($_SESSION["Project"]))
			{
				echo "<nav class = 'menu'>";
					echo "<a class = 'menu' href = 'ProductBacklog.php'>Product Backlog</a>";
					echo "<a class = 'menu' href = 'Dashboard.php'>Dashboard</a>";
					echo "<a class = 'menu' href = 'BurnDownChart.php'>Burndown Chart</a>";
					if($_SESSION["role"] == "Admin")
					{
						echo "<a class = 'menu' href = 'AddUser.php'>Add user</a>";
					}
				echo "</nav>";					
			}
		
			if(isset($_SESSION["userfname"]) && isset($_SESSION["userlname"]))
			{
				echo "<p class = 'menu'>".$_SESSION["userfname"]." ".$_SESSION["userlname"]."</p>";
			}
		?>
	</div>
</body>
</html>
