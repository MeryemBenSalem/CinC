<?php

include 'nouveaux_films.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CineCHome.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Search</title>
    <link rel="shortcut icon" href="logo.png"/>
   <link rel="stylesheet" href="style.css">

</head>
<body style="background-color: #090a0b;">
  <nav id="nvb" class="navbar fixed-top navbar-expand-lg navbar-light">
    <a class="navbar-brand " style="color:#FF6000;" href="home.php"><img src="logo.png" alt="A beautiful image" style="width: 50%; height: 50%;"></a>
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
      
    </div>
  </nav>

<br><br><br><br><br><br><br>
<section class="search-form">
   <form action="" method="get">
      <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required>
      <button style="background-color: #FF6000;" type="submit" class="fas fa-search" name="search_btn">Ok</button>
   </form>
</section>

<section class="products" style="padding-top: 0; min-height:100vh;">

   <div class="box-container">

   <?php
     if(isset($_GET['search_box']) OR isset($_GET['search_btn'])){
     $search_box = $_GET['search_box'];
     $conn = ConnexionBD::getInstance();
     $select_products = $conn->prepare("SELECT * FROM `movietable` WHERE movieTitle LIKE '%{$search_box}%'"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="get" class="box">
      
      <input type="hidden"  name="name" value="<?= $fetch_product['movieTitle']; ?>">
      
      
      <img src="<?= $fetch_product['movieImg']; ?>" alt="">
      <div class="name"><?= $fetch_product['movieTitle']; ?></div>
      <div class="name">Release Date: <?= $fetch_product['movieRelDate']; ?></div>
      <br>
      
      <?php
  echo "<a href='Movie.php?id=" . $fetch_product['movieID']. "' class='btn' style='background-color: #FF6000;'>View Film</a>";
?>

      
   </form>
   <?php
         }
      }else{
         echo '<p class="empty"> No Films found!</p>';
      }
   }
   ?>

   </div>

</section>
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
            <div class="footer-pad">
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


    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="CineCHome.js"></script>
    </body>



</body>
</html>