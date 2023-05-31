<?php 
$movieID = filter_input(INPUT_POST, "movieID", FILTER_VALIDATE_INT);
$bookingDate = filter_input(INPUT_POST, "DATE", FILTER_SANITIZE_STRING);
$bookingTime = filter_input(INPUT_POST, "HOUR", FILTER_SANITIZE_STRING);
$bookingFName = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$bookingLName = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_STRING);
$bookingEmail = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_STRING);
$bookingType = filter_input(INPUT_POST, "metode", FILTER_SANITIZE_STRING);

try {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'cinec';
    
    $connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO bookingtable (movieID, bookingDate, bookingTime,  bookingFName, bookingLName, bookingEmail, bookingType)
        VALUES (:movieID, :bookingDate, :bookingTime, :bookingFName, :bookingLName, :bookingEmail,  :bookingType)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':movieID', $movieID, PDO::PARAM_INT);
    $stmt->bindParam(':bookingDate', $bookingDate, PDO::PARAM_STR);
    $stmt->bindParam(':bookingTime', $bookingTime, PDO::PARAM_STR);
    $stmt->bindParam(':bookingFName', $bookingFName, PDO::PARAM_STR);
    $stmt->bindParam(':bookingLName', $bookingLName, PDO::PARAM_STR);
    $stmt->bindParam(':bookingEmail', $bookingEmail, PDO::PARAM_STR);
    $stmt->bindParam(':bookingType', $bookingType, PDO::PARAM_STR);
    $stmt->execute();
    
    echo "Votre booking a été réalisé avec succès";
} catch(PDOException $e) {
    echo "Error executing the query: " . $e->getMessage();
}

// Close the database connection (not necessary with PDO)
$connection = null;
?>
