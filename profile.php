
<?php
require_once 'core/init.php';
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $id = intval($id);
}else{
    header("location: index.php");
}

$query = "SELECT * FROM players WHERE id='$id'";
    if($result = mysqli_query($link, $query)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $fullName = $row['name'];
                $country = $row['country'];
                $gender = $row['gender'];
                $birthYear = $row['birthyear'];
                $active = $row['active'];
                $age = $row['age'];
                $matches = $row['matches'];
                $wins = $row['wins'];
                $losses = $row['losses'];
            }
        }else{
            header("location: index.php");
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
            <div class="row mb-4 wow fadeIn d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-sm-6">
                    <!-- Card Regular -->
                    <div class="card testimonial-card">
                        <!-- Background color -->
                    <div class="card-up black lighten-1"></div>
                        <!-- Card image -->
                        <div class="avatar mx-auto white">
                        <img class="rounded-circle" src="img/country/<?php echo $country;?>.png" alt="Card image cap">
                        </div>
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">

                        <!-- Title -->
                        <h4 class="card-title"><strong><?php echo $fullName;?></strong></h4>
                        <!-- Subtitle -->
                        <h6 class="font-weight-bold black-text py-2"><?php echo $gender;?> | <?php echo $country;?></h6>
                        
                        <!-- Text -->
                        <p class="card-text">
                            <table class="table table-sm">
                                <tbody class="text-left">
                                    <tr>
                                    <th scope="row">Age: <?php echo $age;?></th>
                                    <td><i class="fas fa-clipboard-list"></i> Matches: <?php echo $matches;?></td>
                                    
                                    </tr>
                                    <tr>
                                    <th scope="row">Birthyear: <?php echo $birthYear;?></th>
                                    <td><i class="fas fa-arrow-up green-text"></i> Wins: <?php echo $wins;?> (<?php if($wins != 0){echo round(($wins/$matches)*100);}?>%)</td>
                                    
                                    </tr>
                                    <tr>
                                    <th scope="row">Status: <?php if($active === "Active"){echo "<span class='text-success font-weight-bold'>".$active."</span>";}else{echo "<span class='font-weight-bold text-danger'>".$active."</span>";}?></th>
                                    <td colspan="2"><i class="fas fa-arrow-down red-text"></i> Losses: <?php echo $losses;?> (<?php if($losses != 0){echo round(($losses/$matches)*100);}?>%)</td>
                                    
                                    </tr>
                                </tbody>
                            </table>
                        </p>
                        </div>
                    </div>
                    <!-- Card Regular -->
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
      © 2020 Copyright:
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
