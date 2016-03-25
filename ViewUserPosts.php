  <?php

    $username = $_POST["username"];
    
    #open database
    $mysqli = new mysqli("mysql.eecs.ku.edu", "kstrombo", "JuiceBug_3872", "kstrombo");
	
    #check connection	
    if ($mysqli->connect_errno) 
    {
        echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
        exit();
    }

    $select = "SELECT content FROM Posts WHERE author_id='$username'";
    $result = $mysqli -> query($select);
    $num = $result -> num_rows;
        
        
        echo "<table style='width:100%'>";
        for($i=0; $i<$num; $i++)
        {
            $row = $result -> fetch_assoc();
            $post = $row["content"];
            
            echo "<tr><td>$post</tr></td>";
            
        }

        echo "</table>";
        
        
    #close mysqli
    $mysqli->close();
	

?> 
