<?php
require_once 'core/init.php';
session_start();

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

                    <!-- PLAYERS LIST -->
                    <table class="table table-hover table-sm">
                        <thead class="black white-text">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Country</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 10;
                                $offset = ($pageno-1) * $no_of_records_per_page;
                                $total_pages_sql = "SELECT COUNT(*) FROM players";
                                $resultPage = mysqli_query($link,$total_pages_sql);
                                $total_rows = mysqli_fetch_array($resultPage)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);
                                $query = "SELECT * FROM players LIMIT $offset,$no_of_records_per_page";
                                if($result = mysqli_query($link, $query)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                            echo "<td>".$row['id']."</td>";
                                            echo "<td>".$row['name']."</td>";
                                            echo "<td><img src='img/flags/".$row['country'].".png'/> ".$row['country']."</td>";
                                            echo "<td>".$row['gender']."</td>";
                                            echo '<td><a href="profile.php?id='.$row['id'].'" target="__blank"><i class="fas fa-search"></i></a></td>';
                                            echo "</tr>";
                                        }
                                    }
                                }
                          
                            ?>

                            <!-- PAGINATION -->
                            <tr>
                                <ul class="pagination pg-blue justify-content-end">
                                    <li class="page-item">
                                        <a href="?pageno=1" class="page-link"><i class="fas fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="<?php if($pageno <= 1){ echo ''; } ?> page-item">
                                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">
                                            <i class="fas fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="<?php if($pageno >= $total_pages){ echo ''; } ?> page-item">
                                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">
                                            <i class="fas fa-angle-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link"><i class="fas fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </tr>
                            <!-- PAGINATION -->

                        </tbody>
                    </table>
                    <!-- PLAYERS LIST -->
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
