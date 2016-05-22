<?php	
	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "scrum";
	
	if(isset($_POST["InProg"]))
	{
		echo $_POST["InProg"];
		$id = $_POST["InProg"];
		$status = "InProgress";
		
		$query = "UPDATE userstory
			SET status = '".$status."', Developer = '".$_SESSION["userID"]."'
			WHERE ID = '".$id."'";
		
		unsetStatus();
	}
	else if(isset($_POST["ToDo"]))
	{
		echo $_POST["ToDo"];
		$id = $_POST["ToDo"];
		$status = "ToDo";
		
		$query = "UPDATE userstory
			SET status = '".$status."', Developer = 'NULL'
			WHERE id = '".$id."'";
		
		unsetStatus();
	}	
	else if(isset($_POST["Done"]))
	{
		echo $_POST["Done"];
		$id = $_POST["Done"];
		$status = "Done";
		
		$query = "UPDATE userstory
			SET status = '".$status."', Developer = '".$_SESSION["userID"]."'
			WHERE id = '".$id."'";
		
		unsetStatus();
	}

	$link = mysqli_connect($servername, $username, $password, $DBname);
	
	// Check connection
	if (!$link)
	{
		echo "Connection failed<br/>";
	}	 
	echo "Connected successfully<br/>";
	
	$result = mysqli_query($link, $query);
	
	mysqli_close($link);
	
	header("location: Dashboard.php");
?>

<?php
//functions

function unsetStatus()
{
	unset($_POST["InProg"]);
	unset($_POST["ToDo"]);
	unset($_POST["Done"]);
}
?>