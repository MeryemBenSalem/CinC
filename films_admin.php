<?php

include 'connexionDB.php';

session_start();

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_film'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'uploaded_img/'.$image_01;
   $genre = $_POST['genre'];
   $genre = filter_var($genre, FILTER_SANITIZE_STRING);
   $duration = $_POST['duration'];
   $duration = filter_var($duration, FILTER_SANITIZE_STRING);
   $release = $_POST['release'];
   $release = filter_var($release, FILTER_SANITIZE_STRING);
   $director = $_POST['director'];
   $director = filter_var($director, FILTER_SANITIZE_STRING);
   $actors = $_POST['actors'];
   $actors = filter_var($actors, FILTER_SANITIZE_STRING);
   $mainhall = $_POST['mainhall'];
   $mainhall = filter_var($mainhall, FILTER_SANITIZE_STRING);
   $viphall = $_POST['viphall'];
   $viphall = filter_var($viphall, FILTER_SANITIZE_STRING);
   $privatehall = $_POST['privatehall'];
   $privatehall = filter_var($privatehall, FILTER_SANITIZE_STRING);
   
   

   $conn = ConnexionBD::getInstance();
   $select_films = $conn->prepare("SELECT * FROM `movietable` WHERE movieTitle = ?");
   $select_films->execute([$name]);

   if($select_films->rowCount() > 0){
      $message[] = 'Film name already exist!';
   }else{
      $conn = ConnexionBD::getInstance();
      $insert_films = $conn->prepare("INSERT INTO `movietable`( `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `mainhall`, `viphall`, `privatehall`) VALUES (?,?,?,?,?,?,?,?,?,?) ");
      $insert_films->execute([$image_01,$name, $genre,$duration,$release,$director,$actors ,$mainhall,$viphall,$privatehall]);

      if($insert_films){
         if($image_size_01 > 2000000 ){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
          
            $message[] = 'New Film added!';
         }

      }

   }  

};

if(isset($_GET['delete'])){
   $conn = ConnexionBD::getInstance();
   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `movietable` WHERE movieID = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('uploaded_img/'.$fetch_delete_image['movieImg']);
   $conn = ConnexionBD::getInstance();
   $delete_product = $conn->prepare("DELETE FROM `movietable` WHERE movieID = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `bookingtable` WHERE movieID = ?");
   $delete_cart->execute([$delete_id]);
  
   header('location:films_admin.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Films</title>
   <link rel="shortcut icon" href="logo.png"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">Add Film</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Film Name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter film name" name="name">
         </div>
       
        <div class="inputBox">
            <span>Image  (required)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film Genre  (required)</span>
            <input type="text" name="genre" placeholder="enter film genre" class="box" required>
        </div>
      
        <div class="inputBox">
            <span>Film duration  (required)</span>
            <input type="number" name="duration" placeholder="enter film duration" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film release date  (required)</span>
            <input type="text" name="release" placeholder="enter film release date" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film director  (required)</span>
            <input type="text" name="director" placeholder="enter film director" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film actors  (required)</span>
            <input type="text" name="actors" placeholder="enter film actors" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film mainhall  (required)</span>
            <input type="number" name="mainhall" placeholder="enter film mainhall" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film viphall  (required)</span>
            <input type="number" name="viphall" placeholder="enter film viphall" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film privatehall  (required)</span>
            <input type="number" name="privatehall" placeholder="enter film privatehall" class="box" required>
        </div>

   
      </div>
      
      <input type="submit" value="add film" class="btn" name="add_film">
   </form>

</section>

<section class="show-products">

   <h1 class="heading">Films added</h1>

   <div class="box-container">

   <?php
      $conn = ConnexionBD::getInstance();
      $select_films = $conn->prepare("SELECT * FROM `movietable`");
      $select_films->execute();
      if($select_films->rowCount() > 0){
         while($fetch_films = $select_films->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <div class="image-container">
         <div class="main-image">
            <img src="<?= $fetch_films['movieImg']; ?>" alt="">
         </div>
      </div>
      <div class="name">Movie Title: <?= $fetch_films['movieTitle']; ?></div><br><br>
      <div class="genre">Genre : <span><?= $fetch_films['movieGenre']; ?></span></div><br>
      <div class="duration">Duration : <span><?= $fetch_films['movieDuration']; ?></span> mins</div><br>
      <div class="release"> Release Date : <span><?= $fetch_films['movieRelDate']; ?></span></div><br>
      <div class="director">Director : <span><?= $fetch_films['movieDirector']; ?></span></div><br>
      <div class="actors">Cast: <span><?= $fetch_films['movieActors']; ?></span></div><br>
      <div class="mainhall">MainHall: <span><?= $fetch_films['mainhall']; ?></span></div><br>
      <div class="viphall">VIPHall : <span><?= $fetch_films['viphall']; ?></span></div><br>
      <div class="privatehall">PrivateHall : <span><?= $fetch_films['privatehall']; ?></span></div><br>
      <div class="flex-btn">
         <a href="update_film.php?update=<?= $fetch_films['movieID']; ?>" class="option-btn">Update</a>
         <a href="films_admin.php?delete=<?= $fetch_films['movieID']; ?>" class="delete-btn" onclick="return confirm('delete this Film?');">Delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No Films added yet!</p>';
      }
   ?>
   
   </div>

</section>








<script src="admin_script.js"></script>
   
</body>
</html>