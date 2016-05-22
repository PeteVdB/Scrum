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
	<div id = "wrapper">
		<?php
			include("Menubar.php");
		?>		
		<div id = "main">
			<form method = "POST" action = "AddUserToDB.php" id = "addUser">
				First Name:</br>
				<input type = "text" name = "FirstName" required></br>
				Last Name:</br>
				<input type = "text" name = "LastName" required></br></br>
				Street:</br>
				<input type = "text" name = "Street" required></br>
				Number:</br>
				<input type = "text" name = "Number" required></br>
				City:</br>
				<input type = "text" name = "City" required></br></br>
				Role:
				<select name = "role" form = "addUser">
					<option value = "Admin">Admin</option>
					<option value = "Developer">Developer</option>
					<option value = "Master">Master</option>
				</select></br></br>
				Email adres:</br>
				<input type = "text" name = "Email" required></br>
				Password:</br>
				<input type = "password" name = "passwd" required></br>
				Repeat Password:</br>
				<input type = "password" name = "passwd2" required></br></br>
				<input type = "submit">				
			</form>
		</div>
	</div>
</body>
</html>