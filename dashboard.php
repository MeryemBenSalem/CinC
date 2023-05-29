<?php

include 'connexionDB.php';

session_start();

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="shortcut icon" href="logo.png"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="dashboard">

<br><br><br><h1 class="heading">Dashboard</h1><br><br><br><br><br>

   <div class="box-container">

      <div class="box">
         <h3>Welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">Update Profile</a>
      </div>

     

     

      <div class="box">
         <?php
            $conn = ConnexionBD::getInstance();
            $select_orders = $conn->prepare("SELECT * FROM `bookingtable`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount()
         ?>
         <h3><?= $number_of_orders; ?></h3>
         <p>Booked Places</p>
         <a href="booked_places.php" class="btn">See Bookingorders</a>
      </div>

      <div class="box">
         <?php
            $conn = ConnexionBD::getInstance();
            $select_products = $conn->prepare("SELECT * FROM `movietable`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>Films added</p>
         <a href="films_admin.php" class="btn">see Films</a>
      </div>



      <div class="box">
         <?php
            $conn = ConnexionBD::getInstance();
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>Admins</p>
         <a href="admin_accounts.php" class="btn">See admins</a>
      </div>


   </div>

</section>

<script src="admin_script.js"></script>
   
</body>
</html>