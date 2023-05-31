<?php

include 'connexionDB.php';

session_start();

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update'])){

   $pid = $_POST['pid'];
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
   $update_film = $conn->prepare("UPDATE `movietable` SET `movieImg`=?,`movieGenre`=?,`movieDuration`=?,`movieRelDate`=?,`movieDirector`=?,`movieActors`=?,`description`=?,`trailer`=?,`movieImgPAYSAGE`=? WHERE movieID=?");
   $update_film->execute([$name,$image, $genre, $duration,$release,$director,$actors , $description , $trailer, $imageP, $pid]);

   $message[] = 'Film updated successfully!';


 

  

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Film</title>
   <link rel="shortcut icon" href="logo.png"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="update-product">

   <h1 class="heading">Update Film</h1>

   <?php
      $update_id = $_GET['update'];
      $conn = ConnexionBD::getInstance();
      $select_films = $conn->prepare("SELECT * FROM `movietable` WHERE movieID = ?");
      $select_films->execute([$update_id]);
      if($select_films->rowCount() > 0){
         while($fetch_films = $select_films->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $fetch_films['movieID']; ?>">
      <input type="hidden" name="old_image_01" value="<?= $fetch_films['movieImg']; ?>">
   
      <div class="image-container">
         <div class="main-image">
            <img src="<?= $fetch_films['movieImg']; ?>" alt="">
         </div>
        
      </div>
      <span>update name</span>
      <input type="text" name="name" required class="box" maxlength="100" placeholder="enter film name" value="<?= $fetch_films['movieTitle']; ?>">
      <span>update image</span>
      <input type="text" name="image" required class="box" maxlength="100" placeholder="enter film image src" value="<?= $fetch_films['movieImg']; ?>">
      <span>update genre</span>
      <input type="text" name="genre" required class="box" maxlength="100" placeholder="enter film genre" value="<?= $fetch_films['movieGenre']; ?>">
      <span>update duration</span>
      <input type="number" name="duration" required class="box" min="0" max="9999999999" placeholder="enter film duration" onkeypress="if(this.value.length == 10) return false;" value="<?= $fetch_films['movieDuration']; ?>">
      <span>update release date </span>
      <input type="text" name="release" required class="box" maxlength="100" placeholder="enter film release date" value="<?= $fetch_films['movieRelDate']; ?>">
      <span>update director</span>
      <input type="text" name="director" required class="box" maxlength="100" placeholder="enter film director" value="<?= $fetch_films['movieDirector']; ?>">
      <span>update actors</span>
      <textarea name="actors" class="box" placeholder="enter film actors" required cols="30" rows="10"><?= $fetch_films['movieActors']; ?></textarea>
      <span>update description</span>
      <input type="text" name="description" required class="box" maxlength="100" placeholder="enter film description" value="<?= $fetch_films['description']; ?>">
      <span>update trailer</span>
      <input type="text" name="trailer" required class="box" maxlength="100" placeholder="enter film trailer" value="<?= $fetch_films['trailer']; ?>">
      <span>update image paysage</span>
      <input type="text" name="imageP" required class="box" maxlength="100" placeholder="enter film image format paysage" value="<?= $fetch_films['movieImgPAYSAGE']; ?>">
      <div class="flex-btn">
         <input type="submit" name="update" class="btn" value="Update">
         <a href="films_admin.php" class="option-btn">Go back</a>
      </div>
   </form>
   
   <?php
         }
      }else{
         echo '<p class="empty">No Film found!</p>';
      }
   ?>

</section>












<script src="admin_script.js"></script>
   
</body>
</html>