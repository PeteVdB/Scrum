<?php
	session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<link href = "reset.css" rel = "stylesheet"/>
	<link href = "Create.css" rel = "stylesheet"/>
	<title>Create User Story</title>
</head>
<body>
	<div id = "wrapper">
		<div id = "main">
			<form method = "POST" action = "AddUS.php" id = "CreateUSForm">
				Sprint:
				<input type = "number" name = "Sprint" min = "1" style = "width: 40px" required>
				Prioriteit:
				<input type = "number" name = "Priority" min = "1" style = "width: 40px" required></br></br>
				Beschrijving:</br>
				<textarea name = "Beschrijving" cols = "40" rows = "10" form = "CreateUSForm" required></textarea><br/><br/>
				<input type = "submit" value = "Opslaan">
			</form>
		</div>
	</div>
</body>
</html>