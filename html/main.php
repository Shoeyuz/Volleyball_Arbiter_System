<?php

    //gets all the error reporting, comment out when live
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //

    
    $servername = "localhost";
    $username = "michael";
    $password = "root";
    $db = "arbiter_system";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    // Check connection
    if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connectedh successfully";


    //---------------------------------------------------
    //             0 IS MEN ---- 1 IS WOMEN for gender
    //             0 is game ---- 1 IS TOURNAMENT for tournament
    //-----------------------------------------------------
   
   
    //query for all games
   
    $sql = "SELECT id, place, timing, tournament, gender
    FROM Games ORDER BY id";
    

    //make querry and get result
    $result = mysqli_query($conn,$sql);

    //fetch the rows
    $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free and clear memory with connection
    mysqli_free_result($result);    
    mysqli_close($conn);
    print_r($assignments);

    
?>


