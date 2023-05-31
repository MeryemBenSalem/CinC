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
    echo "Database connection successful";
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

include 'nouveaux_films.php';

$movieId = $_GET['id'];
$HOUR = $_GET['time'];
$DATE = $_GET['date'];

$sql = "SELECT * FROM movietable WHERE movieID = :movieId";
$stmt = $connection->prepare($sql);
$stmt->bindParam(':movieId', $movieId, PDO::PARAM_STR);
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
            <a class="nav-link" href="http://localhost/projetweb/home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/projetweb/Films.php">Films</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
      </div>
    </nav>




    <div class="container" style ="margin-top: 150px;">
    <div class="card" style="background-color: #f2f2f2;  border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 90%; margin: auto; margin-bottom: 200px;">
    <h1 style="text-align: center; padding-top: 100px; color: black; font-family: Arial, sans-serif;">Sélectionnez vos places</h1>
    <h7 style="text-align: center; color: black; font-family: Arial, sans-serif;">
    Le prix d'Une chaise = <span style="color: #FF6000;">13.0dt</span></h7>

    <div class="row" style="margin:auto;  padding: 50px;" id="seatMap"></div>
      
    <form id="bookingForm" action="nouveau_bookings.php" method="POST">

    <input type="hidden" name="movieID" value="<?php echo $movieId; ?>">
    <input type="hidden" name="HOUR" value="<?php echo $HOUR; ?>">
    <input type="hidden" name="DATE" value="<?php echo $DATE; ?>">

  <div class="row" style="padding:50px">
  <div class="col">
    <label for="movie" id="movie" >Film:<div style="font-size:50px;"><?php echo $film->movieTitle; ?>  </div></label>
  </div>
  <div class="col">
  <label class="row" for="date" id="date" >Date:&nbsp;&nbsp;&nbsp;&nbsp;<div style="font-size:30px;"><?php echo   $DATE; ?>  </div></label>
  <label class="row" for="time" id="time" >Heure:&nbsp;&nbsp;&nbsp;&nbsp;<div style="font-size:30px;" ><?php echo   $HOUR; ?>  </div></label>
  </div>
</div>
<div class="row" style="padding-left: 50px">
    <div class="col">
    <label for="name">Nom:&nbsp;&nbsp;</label>
    <input type="text" id="name"  placeholder="votre nom" name="name" required></div>
    <div class="col">
    <label for="email">Prénom:&nbsp;&nbsp;</label>
    <input type="prenom" id="prenom" placeholder="Votre Prenom"  name="prenom" required></div>
</div>
<div class="row" style="padding: 50px;">
  <div class="col">
    <label for="email">Email:&nbsp;&nbsp;</label>
    <input type="email" id="email" placeholder="VotreEmail@mail.tn" name="Email" required>
  </div>
  <div class="col">
    <label for="nbr" id="nbr">Nombre de Places Sélectionné:&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div style="font-size: 20px;">
    <input type="hidden" name="selectedChairsCount" value="">
    <span class="selectedChairsCountValue">0</span>
    </div>

  </div>
</div>

<div class="row" style="padding-left: 50px">
  <div class="col">
    <label for="nbr" id="nbr">Prix Total:&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div style="font-size: 20px;">
      <span class="totalPrice">0</span>
    </div>
  </div>
  <div class="col">
    <label for="metode">Methode de payement:</label>
    <select id="metode" name="metode" required>
      <option value="metode1">Carte Bancaire</option>
      <option value="metode2">Paypal</option>
      <option value="metode3">Paylib</option>
      <option value="metode3">Carte e-dinar</option>
    </select>
  </div>

</div>

<div class="row submit-row">
<button type="submit" class="submit-button">confirmer</button>
</div>

</form>

    </div></div>


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
    <script>
  // Define the number of rows and chairs
  const numRows = 7;
  const numChairsPerRow = 14;

  // Get the seatMap element
  const seatMap = document.getElementById("seatMap");

  // Generate the rows and chairs
  for (let i = 1; i <= numRows; i++) {
    const row = document.createElement("div");
    row.classList.add("row");
    row.style.margin = "auto";
    let k = 3;
    for (let j = 1; j <= numChairsPerRow; j++) {
      const chairId = `chairA${i}${j}`;
      const chair = document.createElement("img");
      chair.setAttribute("height", "30px");
      chair.setAttribute("id", chairId);
      chair.setAttribute("src", "seat.png");
      chair.addEventListener("click", () => togglechair(chairId));

      if (j === 4 || j === 12) {
        const space = document.createElement("span");
        space.innerHTML = "&nbsp;&nbsp;&nbsp;";
        row.appendChild(space);
      }
      row.appendChild(chair);
    }

    seatMap.appendChild(row);

    if (i !== numRows) {
      const newLine = document.createElement("div");
      newLine.setAttribute("class", "w-100");
      seatMap.appendChild(newLine);
    }
  }

  var chairState = [];
  var nbr_chair = 0;

  function togglechair(chairId) {
  var chair = document.getElementById(chairId);
  if (chairState[chairId] == undefined || chairState[chairId] == false) {
    chairState[chairId] = true;
    chair.src = "seat (1).png";
    nbr_chair++;
  } else {
    chairState[chairId] = false;
    chair.src = "seat.png";
    nbr_chair--;
  }
  updateSelectedChairsCount();
  updateTotalPrice();
}

function updateSelectedChairsCount() {
  // Get the placeholder element
  const selectedChairsCountElement = document.querySelector(".selectedChairsCountValue");

  // Update the content of the placeholder element
  selectedChairsCountElement.textContent = nbr_chair;

  // Update the value of the hidden input field
  const selectedChairsCountInput = document.querySelector("input[name='selectedChairsCount']");
  selectedChairsCountInput.value = nbr_chair;
  
}

function updateTotalPrice() {
  // Calculate the total price
  const totalPrice = nbr_chair * 13;

  // Get the placeholder element
  const totalPriceElement = document.querySelector(".totalPrice");

  // Update the content of the placeholder element
  totalPriceElement.textContent = totalPrice ;

  // Update the value of the hidden input field
  const totalPriceInput = document.querySelector("input[name='totalPrice']");
  totalPriceInput.value = totalPrice;


}
    const bookingForm = document.getElementById("bookingForm");
bookingForm.addEventListener("submit", () => updateSelectedChairsCount());

 
</script>
<script src="CineCHome.js"></script>

  </body>

 
</html>