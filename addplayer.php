<?php
require_once 'core/init.php';
session_start();
$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){    
    $playerName = $_POST['playerName'];
    $playerCountry = $_POST['playerCountry'];
    $gender = $_POST['gender'];
    $birthYear = intval($_POST['birthYear']);
    $active = $_POST['active'];
    $age = intval($_POST['age']);
    $matches = intval($_POST['matches']);
    $wins = intval($_POST['wins']);
    $losses = intval($_POST['losses']);

    $query = "INSERT INTO players (name, country, gender, birthyear, active, age, matches, wins, losses) VALUES ('$playerName', '$playerCountry', '$gender','$birthYear','$active','$age','$matches','$wins','$losses')";
    if(mysqli_query($link, $query)){
        $message = "Player Added Successfully!";
    } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($link);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Table Tennis Statistics</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
</head>

<body>

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark black scrolling-navbar">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="localhost/login.php" target="_blank">
          <strong class="blue-text">TableTennis Stats</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="localhost/tournaments.php" target="_blank">
                Tournaments
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="localhost/players.php" target="_blank">
                Players
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="localhost/matches.php" target="_blank">
                Matches
              </a>
            </li>
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
              <?php 
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                  $current_user = $_SESSION["username"];
              ?>
              <li class="nav-item">
                <a href="panel.php" class="nav-link border border-light rounded waves-effect" target="_blank">
                  <i class="fas fa-user mr-2"></i>Welcome <?php echo $_SESSION["name"];?>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  Logout
                </a>
              </li>
              <?php }else {?>
              <li class="nav-item">
                <a href="login.php" class="nav-link border border-light rounded waves-effect" target="_blank">
                  <i class="fas fa-user mr-2"></i>Login
                </a>
              </li>
              <?php }?>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mt-5 pt-5">
    <div class="container">
      <!--Section: Cards-->
        <section class="text-center">

            <!--Grid row-->
            <div class="row mb-4 wow fadeIn">
                <!--Grid column-->
                <div class="col">
                <!-- Add Form -->
                <?php
                    if(!empty($message)){
                        echo '<div class="alert alert-primary" role="alert">'.$message.'</div>';
                    }
                ?>
                        <!--Header-->
                        <div class="header pt-2 black">
                                <div class="row mx-sm-5 justify-content-center">
                                <h3 class="white-text mb-3 pt-3 font-weight-bold">
                                    <i class="fas fa-user"></i>
                                    Add Player
                                </h3>
                                </div>
                            </div>
                            <!--Header-->
                        <form class="text-center border border-light p-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <hr class="my-2">
                            <div class="form-group">
                            <!-- Username -->
                            <input type="text" name="playerName" class="form-control mb-4" placeholder="Player Name" required>
                            <span class="help-block"></span>
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                            <input type="text" name="playerCountry" class="form-control mb-4" placeholder="Player Country" required>
                            <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <select class="browser-default custom-select" name="gender" required>
                                    <label>Gender</label>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="birthYear" class="form-control mb-4" placeholder="Birthyear" required>
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <select class="browser-default custom-select" name="active">
                                    <label>Activity</label>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="age" class="form-control mb-4" placeholder="Age" required>
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <input type="text" name="matches" class="form-control mb-4" placeholder="Matches" required>
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <input type="text" name="wins" class="form-control mb-4" placeholder="Wins" required>
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <input type="text" name="losses" class="form-control mb-4" placeholder="Losses" required>
                                <span class="help-block"></span>
                            </div>
                            <!-- Sign in button -->
                            <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Add Player">
                            </div>
                        </form>
                    
                </div>
                <!--Grid column-->
            </div>
            <hr>
            <!--Grid row-->
        </section>
      <!--Section: Cards-->
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">

    <!--Copyright-->
    <div class="footer-copyright py-3">
      ?? 2020 Copyright:
      <a href="index.php" target="_blank"> Belal Khaled </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
