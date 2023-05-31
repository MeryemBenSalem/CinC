<?php

// Establish database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cinec';

try {
    $connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

include 'nouveaux_films.php';

$movieId = $_GET['id'];
$sql = "SELECT * FROM movietable WHERE movieID = :movieId";
$stmt = $connection->prepare($sql);
$stmt->bindParam(':movieId', $movieId, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $film = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    echo "No movie found with the specified ID.";
}

// Close the database connection (not necessary with PDO)
$connection = null;
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <title><?php echo $film->movieTitle; ?></title>
    <link rel="shortcut icon" href="logo.png"/>
</head>
<body>
    
<nav id="nvb" class="navbar fixed-top navbar-expand-lg navbar-light">
  <a class="navbar-brand" style="color: #FF6000;" href="#">
    <img src="logo.png" alt="A beautiful image" style="width: 50%; height: 50%;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Films.php">Films</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
    </ul>
    <a href="search_page.php" style="margin-left: auto;">
      <img src="loop.png" style="width: 40px; height: 30px;">
    </a>
  </div>
</nav>

    <picture class="cover">
     <img src="<?php echo $film->movieImgPAYSAGE; ?>" alt="A beautiful image" style = "height:800px">
    </picture>
    <div class="container my-container">
      <div class="row">
        <div class="col-5">
          <h1 class="mb-md-1" style ="font-size: 67px"><?php echo $film->movieTitle; ?></h1>
          <div>
          <div class="hero-film__subtitle mb-2 f-inline f-ai-center f-wrap">
        <?php
        $year = date('Y', strtotime($film->movieRelDate));
        if ($year == 2023) {
          echo '<span class="label label--dark" style="background-color: #FF6000;">Nouveau</span>';
        }
        ?>
            <span class="label label--dark "><?php echo $film->movieGenre; ?></span>
            <span class="label label--dark "><?php echo $film->movieDuration; ?>min</span>
            <span class="label label--dark ">+16</span>
          </div>
          <p id="paragraph"><?php echo $film->description; ?></p>
           </div>
           
        </div>
        <div class="col"></div>
        <div class="col">
          <iframe width="560" height="315" src="<?php echo $film->trailer; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
    </div>
      <div class="container second-container">
        <div class="row second-row">
            Réserver vos places maintenant!
        </div>
        <div class="row third-row">
            <div class="el first-el">
              <div style="text-align: center;"> <span> MER. <br> AVR. </span></div>
              <div><span style=" font-weight: bold ; font-size: 18px; padding: 10px;"> 19</span></div>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=09:00&date=2023-04-19">'; ?>
              <span style="font-weight: bold ;font-size: 17px;"> 09:00</span>
              <div  style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=13:00&date=2023-04-19">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 13:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VOSTFR</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=15:30&date=2023-04-19">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 15:30</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=20:50&date=2023-04-19">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 20:50</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">3D</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=00:05&date=2023-04-19">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 00:05</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=03:00&date=2023-04-19">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 03:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">ENG</div></a>
            </div>
          </div>
          <div class="row third-row">
            <div class="el first-el">
              
              <div style="text-align: center;"> <span> JEU. <br> AVR. </span></div>
              <div><span style=" font-weight: bold ; font-size: 17px; padding: 10px;"> 20 </span></div>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=09:00&date=2023-04-20">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 09:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=13:00&date=2023-04-20">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 13:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VOSTFR</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=15:30&date=2023-04-20">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 15:30</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=20:50&date=2023-04-20">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 20:50</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">3D</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=00:05&date=2023-04-20">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 00:05</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
          </div>
          <div class="row third-row">
            <div class="el first-el">
              
              <div style="text-align: center;"> <span> VEN. <br> AVR. </span></div>
              <div><span style=" font-weight: bold ; font-size: 17px; padding: 10px;"> 21 </span></div>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=09:00&date=2023-04-21">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 09:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=13:00&date=2023-04-21">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 13:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VOSTFR</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=15:30&date=2023-04-21">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 15:30</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=20:50&date=2023-04-21">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 20:50</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">3D</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=00:05&date=2023-04-21">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 00:05</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=03:00&date=2023-04-21">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 03:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">ENG</div></a>
            </div>
          </div>
          <div class="row third-row">
            <div class="el first-el">
              
              <div style="text-align: center;"> <span> SAM. <br> AVR. </span></div>
              <div><span style=" font-weight: bold ; font-size: 17px; padding: 10px;"> 22 </span></div>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=09:00&date=2023-04-22">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 09:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=13:00&date=2023-04-22">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 13:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VOSTFR</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=15:30&date=2023-04-22">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 15:30</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=20:50&date=2023-04-22">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 20:50</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">3D</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=00:05&date=2023-04-22">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 00:05</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="col"></div>
          </div>
          <div class="row third-row">
            <div class="el first-el">
              
              <div style="text-align: center;"> <span> DIM. <br> AVR. </span></div>
              <div><span style=" font-weight: bold ; font-size: 17px; padding: 10px;"> 23 </span></div>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=09:00&date=2023-04-23">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 09:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=13:00&date=2023-04-23">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 13:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VOSTFR</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=15:30&date=2023-04-23">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 15:30</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=20:50&date=2023-04-23">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 20:50</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">3D</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=00:05&date=2023-04-23">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 00:05</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=03:00&date=2023-04-23">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 03:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">ENG</div></a>
            </div>
          </div>
          <div class="row third-row">
            <div class="el first-el">
              
              <div style="text-align: center;"> <span> LUN. <br> AVR. </span></div>
              <div><span style=" font-weight: bold ; font-size: 17px; padding: 10px;"> 24 </span></div>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=09:00&date=2023-04-24">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 09:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=13:00&date=2023-04-24">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 13:00</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VOSTFR</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=15:30&date=2023-04-24">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 15:30</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=20:50&date=2023-04-24">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 20:50</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">3D</div></a>
            </div>
            <div class="el second-el">
            <?php echo '<a role="button" class="screening" href="bookingPage.php?id='.$film->movieID.'&time=00:05&date=2023-04-24">'; ?>
              <span style="font-weight: bold ; font-size: 17px;"> 00:05</span>
              <div style="text-align: right;color :rgba(250, 235, 215, 0.711); font-family: 'Lucida Console', 'Courier New', monospace; margin-right: 3px;">VF</div></a>
            </div>
          </div>
      </div>
    
    <footer class="mainfooter" role="contentinfo">
      <div class="footer-middle">
        <div class="row">
          <div class="col-md-3">
            <!--Column1-->
            <div class="footer-pad">
              <h4>LES NOUVEAUTÉS À L'AFFICHE</h4>
              <ul class="list-unstyled">
                <?php 
                  foreach ($films as $film) {
                  echo"<li><a href='#'>".$film->movieTitle."</a></li>";
                  }
                  ?>
                </ul>

            </div>
          </div>
          <div class="col-md-3">
            <!--Column1-->
            <div class="footer-pad">
              <h4>LIENS UTILES</h4>
              <ul class="list-unstyled">
                <li><a href="#">Offres</a></li>
                <li><a href="#">Centre d'aide</a></li>
                <li><a href="#">Privacy Policy</a></li>
                
              </ul>
            </div>
          </div>
          <div class="col-md-3 ">
            <!--Column1-->
            <div id="contact" class="footer-pad">
              <h4>Contactez-Nous</h4>
              <ul class="list-unstyled">
                <li><a href="https://www.facebook.com/?stype=lo&jlou=AfdyNq-qIwM_wP6Ai-KI03k6-vXaYiCg6PqX8kGLGVMNHfQNQUyox--YQ4EaCk5oItOPT1eSBUfVv7oEsr-AMYA1U-lYV58cfPzZA35UsUUqFQ&smuh=32090&lh=Ac_4fPV__1Pqp2ojIK8">Facebook</a></li>
                <li><a href="https://www.instagram.com/">Instagram</a></li>
                <li><a href="https://www.instagram.com/">Twitter</a></li>
                
                <li>
                  <a href="#"></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <img src="logo.jpg" alt="" width="250" height="150">
          </div>			
        
        </div>
          <p class="text-center"> Copyright  ©  2023 - CineC.  All rights reserved.</p>
      </div>
    </footer>
    <script src="index.js"></script>
  </body>

 
</html>
  