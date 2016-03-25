  <?php

	$username = $_POST["username"];
	$postname = $_POST["postname"];
	$post = $_POST["post"];

	#if any field is empty is empty
	if($username == "")
	{
		echo "<p>Username blank</p>";
		exit();
	}
	if($postname == "")
	{
		echo "<p>Postname blank</p>";
		exit();
	}
	if($post == "")
	{
		echo "<p>Post blank</p>";
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
	
	#if username is not in table
	if($result -> num_rows == 0)
	{
		echo "<p>User not registered</p>";
		exit();
	}
	#if OK to add
	else
	{
		#add to table
		$mysqli -> query ("INSERT INTO Posts (author_id,post_id,content) VALUES ('$username','$postname','$post')");
		echo "<p>Post added!</p>";
		exit();
	}

	#close mysqli
	$mysqli->close();
	

?>
