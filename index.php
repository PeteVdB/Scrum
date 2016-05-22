<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<link href = "reset.css" rel = "stylesheet"/>
	<link href = "Scrum.css" rel = "stylesheet"/>
	<title>Authenticatie</title>
</head>
<body>
	<div id = "wrapper">
		<?php
			include("Menubar.php");
		?>
		<div id = "main">
			<img src = "images/Scrum.png" width = "500px" height = "500px" alt = "logo"></img>
			<div id = "login">
				<form method = "post" action = "Login.php">		<!--action doet login opzoeking -->
					Email-adres: <br/>			<!--voorlopig wijzen naar dashboard-->
					<input type = "text" name = "email"><br/>
					Password: <br/>
					<input type = "password" name = "passwd"><br/>
					<input type = "checkbox">Remember Username<br/> <!--cookie-->
					<input type = "submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>