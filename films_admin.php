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
   
   $image = $_POST['image'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
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
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $trailer = $_POST['trailer'];
   $trailer = filter_var($trailer, FILTER_SANITIZE_STRING);
   $imageP = $_POST['imageP'];
   $imageP = filter_var($imageP, FILTER_SANITIZE_STRING);
   
   

   $conn = ConnexionBD::getInstance();
   $select_films = $conn->prepare("SELECT * FROM `movietable` WHERE movieTitle = ?");
   $select_films->execute([$name]);

   if($select_films->rowCount() > 0){
      $message[] = 'Film name already exist!';
   }else{
      $conn = ConnexionBD::getInstance();
      $insert_films = $conn->prepare("INSERT INTO `movietable`( `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `description`, `trailer`, `movieImgPAYSAGE`) VALUES (?,?,?,?,?,?,?,?,?,?) ");
      $insert_films->execute([$image,$name, $genre,$duration,$release,$director,$actors ,$description,$trailer,$imageP]);

      if($insert_films){
          
            $message[] = 'New Film added!';
         

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
            <input type="text" class="box" required maxlength="100" placeholder="enter film image" name="image">
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
            <span>Film description  (required)</span>
            <input type="text" name="description" placeholder="enter film description" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film trailer (required)</span>
            <input type="text" name="trailer" placeholder="enter film trailer" class="box" required>
        </div>
        <div class="inputBox">
            <span>Film image Paysage (required)</span>
            <input type="text" name="imageP" placeholder="enter film image Paysage" class="box" required>
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
      <div class="description">Descripton: <span><?= $fetch_films['description']; ?></span></div><br>
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