<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link rel="stylesheet" href="stylefilms.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png"/>
    
</head>
<body style="background-color: #090a0b;">

    <section>
    <nav id="nvb" class="navbar fixed-top navbar-expand-lg navbar-light">
    <a class="navbar-brand " style="color:#FF6000;" href="http://localhost/projetweb/home.php"><img src="logo.png" alt="A beautiful image" style="width: 50%; height: 50%;"></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/projetweb/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Films</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="#contact">Contact</a>
          </li>
      </ul>
    <a href="#"><img src="user-removebg-preview.png" style="width: 30PX; height: 30PX;"></a>
    </div>
  </nav>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php include 'nouveaux_films.php';
             foreach ($filmslides as $slide) {
              echo"<div class='swiper-slide'>";

                echo "<div class='image'>";

                    echo "<div class='black'>";

                        echo"<h1>".$slide->movieTitle."</h1>";
                        echo"<div class='star'>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star-half-stroke'></i>
                            <i class='fa-regular fa-star'></i>
                        </div>";
                     
                        echo"<div class='genre'>

                            <a href='#' class='category'>".$slide->movieGenre."</a>";
                            
                            echo"<a href='#' class='category'><span>4K</span></a>

                        </div>
                        <div class='watch'>
                            
                            <p>Director :".$slide->movieDirector."</p>
                        </div>

                    </div>";

                    echo"<img src=".$slide->movieImg.">

                </div>

              </div>";
             }
              ?>

             


            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>

    </section>




    <div class="second">

        <div class="latest">

            <h1>Old But Gold </h1>

            <div class="box">
                <?php 
                foreach($filmsOld as $old) {

                echo"<div class='card'>

                    <div class='details'>

                        <div class='left'>

                            <p class='name'>".$old->movieTitle."</p>
                            <div class='date_quality'>
                                <p class='quality'>HD</p>
                                <p class='date'>".$old->movieRelDate."</p>
                            </div>
                            <p class='category'>".$old->movieGenre."</p>

                            <div class='info'>

                                <div class='time'>
                                    <i class='fa-regular fa-clock'></i>
                                    <p>".$old->movieDuration."min</p>
                                </div>

                            </div>

                        </div>

                        <div class='right'>

                            <i class='fa-solid fa-play'></i>

                        </div>

                    </div>

                    <img src=".$old->movieImg.">

                </div>";
            }
            ?>


            </div>

        </div>

    </div>





    <div class="upcoming">

        <div class="movies_box">

            <h1>Our Movies</h1>

            <div class="box">
            <?php 
                foreach($Mystery as $mys) {

               
                echo"<div class='card'>

                    <div class='details'>

                        <div class='left'>

                            <p class='name'>". $mys->movieTitle."</p>
                            <div class='date_quality'>
                                <p class='quality'>HD</p>
                                <p class='date'>".$mys->movieRelDate."</p>
                            </div>
                            <p class='category'>".$mys->movieGenre."</p>

                            <div class='info'>

                                <div class='time'>
                                    <i class='fa-regular fa-clock'></i>
                                    <p>".$mys->movieDuration."min</p>
                                </div>

                            </div>

                        </div>

                        <div class='right'>

                            <i class='fa-solid fa-play'></i>

                        </div>

                    </div>

                    <img src=".$mys->movieImg.">

                </div>";
                }
                ?>

               

            </div>

        </div>

    </div>
    
    <footer class="mainfooter" role="contentinfo">
        <div class="footer-middle">
          <div class="row">
            <div class="col-md-4">
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
            
            <div class="col-md-4 ">
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
            <div class="col-md-4">
              <img src="logo.png" alt="" width="250" height="150">
            </div>			
          
          </div>
            <p class="text-center"> Copyright  ©  2023 - CineC.  All rights reserved.</p>
        </div>
      </footer>



    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="CineCHome.js"></script>
    </body>
</html>

 
