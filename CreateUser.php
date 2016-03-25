 <?php

	$username = $_POST["username"];

	#if username is empty
	if($username == "")
	{
		echo "<p>Username blank</p>";
		exit();
	}
	#open database
		
	$mysqli = new mysqli("mysql.eecs.ku.edu", "kstrombo", "JuiceBug_3872", "kstrombo");
	#check connection	
	if ($mysqli->connect_errno) 
	{
	    echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
	    exit();
	}

	#check table for username
	$select = "SELECT * FROM Users WHERE user_id = '$username'";
	$result = $mysqli -> query($select);
	
	#if it worked
	if($result -> num_rows == 0)
	{
		#add to table
		$insert = "INSERT INTO Users (user_id) VALUES ('$username')";
		$mysqli -> query ($insert);
		echo "<p>User added</p>";
		exit();
	}
	#if already in
	else
	{
		echo "<p>Username already taken</p>";
		exit();
	}

	#close mysqli
	$mysqli->close();
	

?>
