<?php

include 'connexionDB.php';

session_start();

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}


if(isset($_GET['delete'])){
   $conn = ConnexionBD::getInstance();
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `bookingtable` WHERE bookingID = ?");
   $delete_order->execute([$delete_id]);
   header('location:booked_places.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Booking Orders</title>
   <link rel="shortcut icon" href="logo.png"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="orders">

<h1 class="heading">Booking Orders</h1>

<div class="box-container">

   <?php
      $conn = ConnexionBD::getInstance();
      $select_orders = $conn->prepare("SELECT * FROM `bookingtable`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      
      <p> First Name : <span><?= $fetch_orders['bookingFName']; ?></span> </p>
      <p> Last Name : <span><?= $fetch_orders['bookingLName']; ?></span> </p>
      <p> Email : <span><?= $fetch_orders['bookingEmail']; ?></span> </p>
      <p> Booking Date: <span><?= $fetch_orders['bookingDate']; ?></span> </p>
      <p> Booking time : <span><?= $fetch_orders['bookingTime']; ?></span> </p>
      <p> Film ID : <span><?=  $fetch_orders['movieID']; ?></span> </p>
      <p> Date Time : <span><?= $fetch_orders['DATE-TIME']; ?></span> </p>
      <p> Booking Seat : <span><?= $fetch_orders['bookingSeat']; ?></span> </p>
      <p>  Price : <span>$<?= $fetch_orders['amount']; ?></span> </p>
      <p> Payment Method : <span><?= $fetch_orders['bookingType']; ?></span> </p>
      <form action="" method="post">
      <div class="flex-btn">
         
         <a href="booked_places.php?delete=<?= $fetch_orders['bookingID']; ?>" class="delete-btn" onclick="return confirm('Delete this order?');">delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
   ?>

</div>

</section>

</section>












<script src="admin_script.js"></script>
   
</body>
</html>