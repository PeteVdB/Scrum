<?php

	echo $_POST["LastName"]."<br/>";
	echo $_POST["FirstName"]."<br/>";
	echo $_POST["Email"]."<br/>";
	echo $_POST["passwd"]."<br/>";
	echo $_POST["passwd2"]."<br/>";
	echo $_POST["City"]."<br/>";
	echo $_POST["Street"]."<br/>";
	echo $_POST["Number"]."<br/>";

	if($_POST["passwd"] == $_POST["passwd2"])
	{
		echo "true";
		$pass = md5($_POST["passwd"], true);
		echo $pass;
		
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
		
		$query = "INSERT INTO personeel (ID, LastName, FirstName, Street, Number, City, Email, Role, Passwd)
		VALUES('NULL', '".$_POST["LastName"]."', '".$_POST["FirstName"]."', '".$_POST["Street"]."', ".$_POST["Number"].", '".$_POST["City"]."', '".$_POST["Email"]."', '".$_POST["role"]."', '".$pass."');";
		$result = mysqli_query($link, $query);
		
		echo "<br/>".$result."<br/>";
		echo "test";
		
		mysqli_close($link);
		header("location: Home.php");
	}
	else
	{
		echo "false";
		header("location: AddUser.php");
	}
?>