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
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$movieId = $_POST['movieID'];
$HOUR = $_POST['HOUR'];
$DATE = $_POST['DATE'];
$name = $_POST['name'];
$prenom = $_POST['prenom'];
$email = $_POST['Email'];
$metode = $_POST['metode'];

$selectedChairsCount = $_POST['selectedChairsCount'];
$totalPrice = $selectedChairsCount*13;

try {
    // Prepare the SQL query to insert the data into the bookingtable
    $sql = "INSERT INTO bookingtable (movieID, bookingTime, bookingDate, bookingFName, bookingLName, bookingEmail, bookingType,amount,bookingSeat) 
            VALUES (:movieId, :HOUR, :DATE, :name, :prenom, :email, :metode,:totalPrice, :selectedChairsCount)";
    $stmt = $connection->prepare($sql);
    
    // Bind the values to the query parameters
    $stmt->bindParam(':movieId', $movieId, PDO::PARAM_STR);
    $stmt->bindParam(':HOUR', $HOUR, PDO::PARAM_STR);
    $stmt->bindParam(':DATE', $DATE, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':metode', $metode, PDO::PARAM_STR);
    $stmt->bindParam(':totalPrice', $totalPrice, PDO::PARAM_INT);
    $stmt->bindParam(':selectedChairsCount', $selectedChairsCount, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();
    
    // Close the database connection (not necessary with PDO)
    $connection = null;
    
    // Redirect the user to a success page or display a success message
    header("Location: confirmation_page.php");
    exit();
} catch(PDOException $e) {
    die("Error inserting data into the database: " . $e->getMessage());
}
?>
