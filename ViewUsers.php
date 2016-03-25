  <?php

    #open database
    $mysqli = new mysqli("mysql.eecs.ku.edu", "kstrombo", "JuiceBug_3872", "kstrombo");
	
    #check connection	
    if ($mysqli->connect_errno) 
    {
        echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
        exit();
    }

    $select = "SELECT user_id FROM Users";
    $result = $mysqli -> query($select);
    $num = $result -> num_rows;
    
    echo "<table>";
    
    for($i=0; $i<$num; $i++)
    {
        $row = $result -> fetch_assoc();
        $user = $row ["user_id"];
        echo "<tr><td>";
        echo "$user";
        echo "</tr></td>";
    }
    
    echo "</table>";
    
    

    #close mysqli
    $mysqli->close();
	

?>  
