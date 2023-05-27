<?php
include 'connexionDB.php';
$bdd = ConnexionBD::getInstance();
$query = "SELECT * FROM movietable ORDER BY movieRelDate DESC LIMIT 4 ";
$response = $bdd->query($query);
$films=$response->fetchAll(PDO::FETCH_OBJ);
