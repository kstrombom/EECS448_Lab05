<?php

$postsidArray = $_POST["posts"];

     $mysqli = new mysqli("mysql.eecs.ku.edu", "kstrombo", "JuiceBug_3872", "kstrombo");
	
        if ($mysqli->connect_errno) 
        {
            echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
            exit();
        }
        
        echo "Deleted the following posts:<br>";
        
        for($i=0; $i<count($postsidArray);$i++)
        {
            $delete = "DELETE FROM Posts WHERE content = '$postsidArray[$i]'";
            $mysqli->query($delete);
            echo $postsidArray[$i];
        }
        
       $mysqli->close();

?> 
