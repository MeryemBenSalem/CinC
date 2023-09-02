<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CineCHome.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>CineC</title>
    <link rel="shortcut icon" href="logo.png"/>
</head>
<body style="background-color: #090a0b;">
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
      <a class="nav-link" href="http://localhost/projetweb/home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/projetweb/Films.php">Films</a>
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


  <div class="hero">
  <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <h2  style="font-size: 85px;">DUNE</h2>
    <p><a class="btn btn-secondary" href='Movie.php?id=5' role="button">Réservez Maintenant &raquo;</a></p>
  </div>
  <main role="main" style="background-color: #090a0b;">

    <section class="jumbotron text-center" style="background-color: #090a0b;">
      <div class="container" >
        <h1 class="col-md-9 " style="color:#FF6000; font-size: 50px;"> Avant-premières et préventes </h1>
          
          <a href="Films.php" class="btn btn-secondary my-2" style="color: white;font-size: 25px;">Voir Nos Films </a>
      </div>
    </section>
  
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    
    
    <section class="hero-section" style="background-color: #090a0b; padding-bottom:100px;">
    <div class='card-grid' style='background-color: #090a0b;'>
      <?php include 'nouveaux_films.php';
      
       foreach ($films as $film) {
        echo "<a class='card' href='Movie.php?id=" . $film->movieID . "' style='background-color: #090a0b;'>";
        echo "<div class='card__background' style='background-image: url(" . $film->movieImg . ")'></div>";
        echo "<div class='card__content'>";
        echo "<p class='card__category'>" . $film->movieGenre . "</p>";
        echo "<h3 class='card__heading'>" . $film->movieTitle . "</h3>";
        echo "</div>";
        echo "</a>";
       } 
       ?>
       <div>
    </section>
    <div class="container-fluid bg-light" style="padding:0;">
      <div class="row" style="background-color:#090a0b;">
        <div class="col-md-6" style="margin-top: 5%; margin-left: 5%; margin-bottom: 5%; margin-right: 5%;">
          
         <iframe width="720" height="400" src="https://www.youtube.com/embed/smTK_AeAPHs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          
          </video>
        </div>
        <div class="col" style="margin-top: 10%;  margin-bottom: 10%; margin-right: 10%;">
          <div class="row" style="color:#FF6000;">
        <h1>What's New, What's Leaving</h1></div>
        <span style="font-family: 'Helvetica Neue Thin', Arial, sans-serif; text-align: left; vertical-align: top; color:white;">Vous êtes passionné(e) par le septième art et vous 
        cherchez un endroit pour découvrir les derniers films, lire des critiques, obtenir des informations sur les horaires des séances ou simplement plonger dans 
        l'univers magique du cinéma ? Ne cherchez plus, vous êtes au bon endroit !</span>
        <br><br><br>
        <div class="row"> <a href="Films.php" class="btn  my-2" style="background-color: #090a0b;color: #FF6000;font-size: 25px;">Savoir Plus</a>
        </div>

        </div>
      </div>   
      
   
    <div class="box-container" style="background-color: #090a0b; padding:100px; margin:0%;">
      <div class="box-item"style="padding:20px;">
        <div class="flip-box">
          <div class="flip-box-front text-center" style="background-image: url('https://m.media-amazon.com/images/I/41A58j53TrL._SL500_.jpg');">
            <div class="inner color-white">
              <h3 class="flip-box-header">Fans favourite </h3>
              <p>We selected the best picks for you.</p>
              <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
            </div>
          </div>
          <div class="flip-box-back text-center" style="background-image: url('https://m.media-amazon.com/images/I/41A58j53TrL._SL500_.jpg');">
            <div class="inner color-white">
              <h3 class="flip-box-header">Fans pick </h3>
              <p>N'attendez plus rien.</p>
              <a href="Films.php" class="btn btn- my-2" style="color: white;font-size: 25px;">Book Now </a>
            </div>
          </div>
        </div>
      </div>
      <div class="box-item"style="padding:20px;">
        <div class="flip-box">
          <div class="flip-box-front text-center" style="background-image: url('https://lepetitjournal.com/sites/default/files/styles/main_article/public/2022-04/Cinema_Avril.jpg?itok=pcFJO6Pn');">
            <div class="inner color-white">
              <h3 class="flip-box-header" style="color:black;">Nos Films</h3>
              
              <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
            </div>
          </div>
          <div class="flip-box-back text-center" style="background-image: url('https://lepetitjournal.com/sites/default/files/styles/main_article/public/2022-04/Cinema_Avril.jpg?itok=pcFJO6Pn');">
            <div class="inner color-white">
              <h3 class="flip-box-header" style="color:black;">Nos Films</h3>
              <a href="Films.php" class="btn btn- my-2" style="color: orange ;font-size: 25px;">Our Movies </a>
            </div>
          </div>
        </div>
      </div>
      <div class="box-item"style="padding:20px;">
        <div class="flip-box">
          <div class="flip-box-front text-center filter-" style="background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAilBMVEUhHyD///8AAAAgICC5ubkKBQiamprn5+cGBwaNjY0ODA309PQZFxhxcXEVExRdXV0cHBwYFhcrKyvu7u75+fnh4eFGRkZnZ2dBQUGxsbHb29uBgYHGxsY5NzihoaEeGx3R0dFQTk96enpgX2Crq6svLi+Mi4xEQ0PAv8AlJCTKycp2dnZTU1M7Ozsa5R/gAAAE/0lEQVR4nO2caXuiMBRGIbgVUxZxxSVSl1Fb///fG6u1g3BZFISYec/HeTLOPZOE5GbTNAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABA2Ria43JRdxTPw+CMjW17zJhTdyh3wkWuajHYcOL1db3fXh/Zs2Mqj1O1aEGwZ4xnlRRsov+yYK/SVpvjifcdcbcRMMcwUko6mq+HWJovoSjM9b+YJ5ynGBrWUr9hZlYX58MI7SZqv5fyAWELPcJbs7pIH0Q0D7cx+06iojj2o4ZeT/p2yt6iQa8TP5HNVrSsrk/NtH4rAWLTjcbcPyZ9UZvLuOGMSW5obuNBtxL7lhcvPHAlN2SHeNDLhA+k6MW64akjpo4uEuAOyKDJqMWeMGwbsk/eiIbX7zl0vfB2vLAv+5dGI4JONGSzeOGJ9F8aPx70IGlaY73HC9tutQHfTXgifWWXOCA6sV67lH5O49pxw3crqbQ5ijboL9mrkBrF/eSgjegMaPoCKaIbRIeAVWIVnmDTcNHPFxA8VeLnreA2PWo2/K30w/wVcqcTbBSuxcx2x9m4tfP9XWv+Mhm+Zs5nV8fDn8x2ZxhOh50wEwZNKeFsuP2ulrcgZaHGSKTCSB+Hm+dqSVuIutQcxWss1mhZlWHuF4Muid/i0g6KwuyYJJ1mtFrMEZFXXOl+pQ0wNWJuFj5dLYN1ZCCgpj4h+sPMhdY6MEdE5vQb83t4wml0iAl6mIOM01MexFZobrBDLY8P0wV1fSPh1ya6ihjFD7VTa5peVtdH8vVEsckKOtS3zNiSY5TkfKQ2rGgiFCO0EvqahkS+fsvbv2YKQxjWAgxhCMP6Uc7wnP6FE/M8hr9/I5fhTdpffebPY5n5Kivoaahw9rw0+vOdavMpwYLJsn1LSup0wXu08Df+JG3Np3SseUYe8RQO88r6phVkVsFT8IKKFIVB7BFWQrsaQa0ZO+ZTGYtqFjfYZZXMa9yS2TWXjQJc+kW/kp0b9zIszKKf88wMeJu0ApyLy4b4qoqzKD+jdXRv/q45zf2IffHfyMvPUS1m3G9Y5P+fnX+j1SkWfC6uhpE/fnYdKm+ofh3CsExgqKphzgz4cWo3zNoRPPFRKDOo3/Bn0pHCvFAGW7+h1iTO7IWZFcsLJDB0eqlpo5d4nj0fEhhq7pE4en/FHxbMz2Uw1Lg1mtA73Y33wgdIpDDUhMXIltpnxRdY5DDUDEYc1df1bglnt6UxJE+ReCUsPsht2FapDsnP6UAlQ3LFTSlD4o7IaTBUx1BjO8pwqY6h8b8alnFrUhrDxv9puFPJkEwSlTJcU4YNhQw75N6iUobEDfty7oXKYmiShmuVDMmjQIuOQobkUSD1DVsKGVqflGGx9fwL0hiSuxdblQzJExllvMgiiyG9P/NhqWPIvyjDd5UMA8pwpJChQ15Ks0s4ySSN4Vh5wyNl+JX2ZltOpDGcU4bDEq7ay234RyVD8p7lWCXDHmV4VMqQumY/V8lwT21zbxQyNAz1De95r+0epDF0qPfa9goZahaxzd1Of2k3H5IY0tdNJmXckpDGUNNi5028Ut64uBpWcN8iw5D3djdDYr+kK2fNi2EV70aK8cq27VXiOTzB5naIY0kveInzvzqu5MkT4XKeekztXOAHt7SQ+PevSvimCwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABV8xc5DlOER/p2ZAAAAABJRU5ErkJggg==');">
            <div class="inner color-white">
              <h3 class="flip-box-header" style="color:#FF6000;">About CineC </h3>
              <p style="color:#FF6000;">Découvrez Plus d'Infos .</p>
              <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
            </div>
          </div>
          <div class="flip-box-back text-center" style="background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAilBMVEUhHyD///8AAAAgICC5ubkKBQiamprn5+cGBwaNjY0ODA309PQZFxhxcXEVExRdXV0cHBwYFhcrKyvu7u75+fnh4eFGRkZnZ2dBQUGxsbHb29uBgYHGxsY5NzihoaEeGx3R0dFQTk96enpgX2Crq6svLi+Mi4xEQ0PAv8AlJCTKycp2dnZTU1M7Ozsa5R/gAAAE/0lEQVR4nO2caXuiMBRGIbgVUxZxxSVSl1Fb///fG6u1g3BZFISYec/HeTLOPZOE5GbTNAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABA2Ria43JRdxTPw+CMjW17zJhTdyh3wkWuajHYcOL1db3fXh/Zs2Mqj1O1aEGwZ4xnlRRsov+yYK/SVpvjifcdcbcRMMcwUko6mq+HWJovoSjM9b+YJ5ynGBrWUr9hZlYX58MI7SZqv5fyAWELPcJbs7pIH0Q0D7cx+06iojj2o4ZeT/p2yt6iQa8TP5HNVrSsrk/NtH4rAWLTjcbcPyZ9UZvLuOGMSW5obuNBtxL7lhcvPHAlN2SHeNDLhA+k6MW64akjpo4uEuAOyKDJqMWeMGwbsk/eiIbX7zl0vfB2vLAv+5dGI4JONGSzeOGJ9F8aPx70IGlaY73HC9tutQHfTXgifWWXOCA6sV67lH5O49pxw3crqbQ5ijboL9mrkBrF/eSgjegMaPoCKaIbRIeAVWIVnmDTcNHPFxA8VeLnreA2PWo2/K30w/wVcqcTbBSuxcx2x9m4tfP9XWv+Mhm+Zs5nV8fDn8x2ZxhOh50wEwZNKeFsuP2ulrcgZaHGSKTCSB+Hm+dqSVuIutQcxWss1mhZlWHuF4Muid/i0g6KwuyYJJ1mtFrMEZFXXOl+pQ0wNWJuFj5dLYN1ZCCgpj4h+sPMhdY6MEdE5vQb83t4wml0iAl6mIOM01MexFZobrBDLY8P0wV1fSPh1ya6ihjFD7VTa5peVtdH8vVEsckKOtS3zNiSY5TkfKQ2rGgiFCO0EvqahkS+fsvbv2YKQxjWAgxhCMP6Uc7wnP6FE/M8hr9/I5fhTdpffebPY5n5Kivoaahw9rw0+vOdavMpwYLJsn1LSup0wXu08Df+JG3Np3SseUYe8RQO88r6phVkVsFT8IKKFIVB7BFWQrsaQa0ZO+ZTGYtqFjfYZZXMa9yS2TWXjQJc+kW/kp0b9zIszKKf88wMeJu0ApyLy4b4qoqzKD+jdXRv/q45zf2IffHfyMvPUS1m3G9Y5P+fnX+j1SkWfC6uhpE/fnYdKm+ofh3CsExgqKphzgz4cWo3zNoRPPFRKDOo3/Bn0pHCvFAGW7+h1iTO7IWZFcsLJDB0eqlpo5d4nj0fEhhq7pE4en/FHxbMz2Uw1Lg1mtA73Y33wgdIpDDUhMXIltpnxRdY5DDUDEYc1df1bglnt6UxJE+ReCUsPsht2FapDsnP6UAlQ3LFTSlD4o7IaTBUx1BjO8pwqY6h8b8alnFrUhrDxv9puFPJkEwSlTJcU4YNhQw75N6iUobEDfty7oXKYmiShmuVDMmjQIuOQobkUSD1DVsKGVqflGGx9fwL0hiSuxdblQzJExllvMgiiyG9P/NhqWPIvyjDd5UMA8pwpJChQ15Ks0s4ySSN4Vh5wyNl+JX2ZltOpDGcU4bDEq7ay234RyVD8p7lWCXDHmV4VMqQumY/V8lwT21zbxQyNAz1De95r+0epDF0qPfa9goZahaxzd1Of2k3H5IY0tdNJmXckpDGUNNi5028Ut64uBpWcN8iw5D3djdDYr+kK2fNi2EV70aK8cq27VXiOTzB5naIY0kveInzvzqu5MkT4XKeekztXOAHt7SQ+PevSvimCwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABV8xc5DlOER/p2ZAAAAABJRU5ErkJggg==');">
            <div class="inner color-white">
              <h3 class="flip-box-header" style="color:#FF6000;">About CineC </h3>
              <p style="color:#FF6000;">Découvrez Plus d'Infos .</p>
              <button class="flip-box-button" style="color:#FF6000;">Savoir Plus...</button>
            </div>
          </div>
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
  

          
  
          
          
   
 
      

  

    


 <script src="CineCHome.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>