<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DBname = "scrum";

	echo $_POST["email"]."<br/>";
	echo $_POST["passwd"]."<br/>";
	$pass = md5($_POST["passwd"],true);
	
	// Create connection
	echo "establish connection<br/>";
	$link = mysqli_connect($servername, $username, $password, $DBname);
	
	// Check connection
	if (!$link)
	{
		echo "Connection failed<br/>";
		//die("Connection failed: " . mysqli_connect_error());
	}	 
	echo "Connected successfully<br/>";
	
	$query = "SELECT Email, Passwd FROM personeel";
	$result = mysqli_query($link, $query);
	
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$Email = $row["Email"];
			$Passwd = $row["Passwd"];
			if($_POST["email"] == $Email && $pass == $Passwd)
			{
				echo "successful login";
				
				$query = "SELECT ID, FirstName, LastName, Role FROM personeel WHERE Email = '".$Email."'";
				$result = mysqli_query($link, $query);
				$row = mysqli_fetch_assoc($result);
				$_SESSION["userID"] = $row["ID"];
				$_SESSION["userfname"] = $row["FirstName"];
				$_SESSION["userlname"] = $row["LastName"];
				$_SESSION["role"] = $row["Role"];
				
				header("location: Home.php");
				break;
			}
			else
			{
				echo "failed";		
			}
			header("location: index.php");	//geen juiste login
		}
	}	
	mysqli_close($link);
?>
</body>
</html>