<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="BookingPage.css">
    <title>Booking</title>
    <link rel="shortcut icon" href="logo.png"/>
</head>
<body>
    
  <nav id="nvb" class="navbar fixed-top navbar-expand-lg navbar-light">
      <a class="navbar-brand " style="color:#FF6000;" href="http://localhost/projetweb/home.php"><img src="logo.png" alt="A beautiful image" style="width: 50%; height: 50%;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Films.php">Films</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
        <a href="search_page.php" style="margin-left: auto;">
      <img src="loop.png" style="width: 40px; height: 30px;">
    </a>
      </div>
    </nav>


<h2 style="margin:auto; padding :200px;color:white; text-align:center;" >Votre Réservation a été confirmé avec Succés ,<br> n'hésitez pas à consulter d'autre films à réserver !<br> 🍿🍿🍿🍿🍿</h2>


    <footer class="mainfooter" role="contentinfo">
      <div class="footer-middle">
        <div class="row">
          <div class="col-md-3">
            <!--Column1-->
            <div class="footer-pad">
              <h4>LES NOUVEAUTÉS À L'AFFICHE</h4>
              <ul class="list-unstyled">
                <?php include 'nouveaux_films.php';
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
            <div class="footer-pad">
            <h4 id="contact">Contactez-Nous</h4>
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

    
  </body>

 
</html>