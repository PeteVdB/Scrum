<?php
	session_start();

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
	
	$query = "INSERT INTO userstory (Project, Priority, USDescription, Sprint, Status)
	VALUES ('".$row["ID"]."', '".$_POST["Priority"]."', '".$_POST["Beschrijving"]."', '".$_POST["Sprint"]."', 'ToDo')";
	$result = mysqli_query($link, $query);
	
	mysqli_close($link);
	
	echo "<script type = 'text/javascript'>";
	echo "parent.location.reload();";
	echo "</script>";
?>