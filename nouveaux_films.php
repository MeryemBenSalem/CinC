<?php
include 'connexionDB.php';
$bdd = ConnexionBD::getInstance();
$query = "SELECT * FROM movietable ORDER BY movieRelDate DESC LIMIT 4 ";
$response = $bdd->query($query);
$films=$response->fetchAll(PDO::FETCH_OBJ);


$query2 = "SELECT * FROM movietable ORDER BY movieID DESC LIMIT 4 ";
$response2 = $bdd->query($query2);
$filmslides=$response2->fetchAll(PDO::FETCH_OBJ);


$query3 = "SELECT * FROM movietable ORDER BY movieRelDate  LIMIT 5 ";
$response3 = $bdd->query($query3);
$filmsOld=$response3->fetchAll(PDO::FETCH_OBJ);



$query4 = "SELECT * FROM movietable ORDER BY movieRelDate DESC  LIMIT 6 ";
$response4 = $bdd->query($query4);
$Mystery=$response4->fetchAll(PDO::FETCH_OBJ);







