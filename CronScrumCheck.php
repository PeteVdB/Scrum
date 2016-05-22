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
	
	//alle einddatums selecteren, overschreden => currentsprint +1 datum +2weken
	
	$query = "SELECT ID, SprintEndDate, CurrentSprint FROM project";
	$result = mysqli_query($link, $query);
	
	while($row = mysqli_fetch_assoc($result))
	{		
		$datum = date("Y-m-d H:i:s");	
		$DBdate = $row["SprintEndDate"];
		$CurSprint = $row["CurrentSprint"];	
		$id = $row["ID"];		
	
		echo $datum."<br/>";
		echo $DBdate."<br/>";
		
		echo date("Y-m-d H:i:s", strtotime($DBdate."+2 weeks"))."<br/>";
		//$DBdate = date("Y-m-d H:i:s", strtotime($DBdate."+2 weeks"));
		
		if($datum > $DBdate)
		{
			echo "tijd overschreden<br/><br/>";
			//currentsprint +1 datum +2weken
			$CurSprint++;
			$DBdate = date("Y-m-d H:i:s", strtotime($DBdate."+2 weeks"));
			
			$query = "UPDATE project
			SET CurrentSprint = '".$CurSprint."', SprintEndDate = '".$DBdate."'
			WHERE ID = '".$id."'";
			mysqli_query($link, $query);
		}
		else
		{
			echo "niet overschreden<br/><br/>";
		}
	}
	
	mysqli_close($link);
?>