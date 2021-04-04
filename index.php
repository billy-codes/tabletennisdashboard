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
                    <table class="table table-hover table-sm">
                      <caption>Top 10 Male Players</caption>
                        <thead class="black white-text">
                            <tr>
                            <th scope="col">ID </th>
                            <th scope="col">Name</th>
                            <th scope="col">Country</th>
                            <th scope="col">Wins <i class="fas fa-angle-down"></i></th>
                            <th scope="col">Information</th>
                            </tr>
                        </thead>
                        
                    </table>
                    
                  

                    <!-- PLAYERS LIST -->
                    <table class="table table-hover table-sm">
                    <caption>Top 10 Female Players</caption>
                        <thead class="black white-text">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Country</th>
                            <th scope="col">Wins</th>
                            <th scope="col">Information</th>
                            </tr>
                        </thead>
                        
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
      <a href="index.php" target="_blank"> Belal Khaled - UCSI University </a>
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
