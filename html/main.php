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
    FROM Games ORDER BY timing ASC";
    

    //make querry and get result
    $result = mysqli_query($conn,$sql);

    //fetch the rows
    $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free and clear memory with connection
    mysqli_free_result($result);    








    //end connection
    mysqli_close($conn);
    //print_r($assignments);

    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignments</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <link rel="stylesheet" href = "/Volleyball_Arbiter_System/css/main.css">
    <script src="/Volleyball_Arbiter_System/js/main.js"></script> 
  </head>

 <!-- NAVIGATION -->
 <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href = main.php>
        Assignment List
      </a>

      <a class="navbar-item" href = "rules.php">
        League Rules
      </a>

      <a class="navbar-item">
        Your Games
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            For Assignors
          </a>
          <a class="navbar-item">
            Pay Rates
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>




<body>



 <!-- CARDS SHOWING -->
  <section class = "games">

    <?php foreach($assignments as $assignment){ ?>
        <div class="card" id = <?php echo $assignment['id'] ?>>
        <!-- this sets the id of the div to the game id -->
        
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
          <!-- MODAL -->
          <div class="modal" id="assignment-application">
            <div class="modal-background"></div>
            <div class="modal-card">
              <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close"></button>
              </header>
              <section class="modal-card-body">
                <!-- Content ... -->
              </section>
              <footer class="modal-card-foot">
                <button class="button is-success">Save changes</button>
                <button class="button">Cancel</button>
              </footer>
            </div>
          </div>
        </div>

    <?php }?>

  </section>
  
 
  </body>
</html>

