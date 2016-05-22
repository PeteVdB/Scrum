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
	
	//query: id van klantnaam opvragen
	$query = "SELECT ID FROM klanten WHERE CustomerName = '".$_POST["customer"]."'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	
	$query = "INSERT INTO project (ProjectName, Customer, Description)
	VALUES('".$_POST['ProjectNaam']."', '". $row["ID"] ."', '".$_POST['omschrijving']."');";
	$result = mysqli_query($link, $query);
	
	mysqli_close($link);
	
	echo "<script type = 'text/javascript'>";
	echo "parent.location.reload();";
	echo "</script>";
	
?>	