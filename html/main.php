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
    //echo "Connectedh successfully";


    //---------------------------------------------------
    //             0 IS MEN ---- 1 IS WOMEN for gender
    //             0 is game ---- 1 IS TOURNAMENT for tournament
    //             0 is JR ------- 1 is SENIOR
    //-----------------------------------------------------
   
   
    //query for all games
   
    $sql = "SELECT id, place, timing, tournament, gender, age
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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
  </head>
  <body>
  


  <section class = "games">

    <?php foreach($assignments as $assignment){ ?>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                <?php echo htmlspecialchars($assignment['place']);?>

                </p>
                
            </header>
        <div class="card-content">
            <div class="content">
                <?php 
                    if($assignment['gender'])
                        echo ("Girls ");
                    else
                        echo ("Boys ");

                    if($assignment['age'])
                        echo ("Senior ");
                    else
                        echo ("Junior ");
                ?>
                <br>
                <?php 
                    if($assignment['tournament'])
                        echo ("Tournament ");
                    else
                        echo ("Game ");
                ?>
                <br>
                <time datetime="2016-1-1"><?php echo htmlspecialchars($assignment['timing']);?></time>
            </div>
        </div>
        <footer class="card-footer">
            <a href="#" id="request" class="card-footer-item">Request Assignment</a>
        </footer>
        </div>

    <?php }?>

  </section>
  
 
  </body>
</html>

