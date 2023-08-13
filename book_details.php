


<?php
// Include your database connection code here
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Query to retrieve all data from the "library" table
$query = "SELECT * FROM library"; // Adjust the table name if needed
$result = $pdo->query($query);
$data = $result->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
$pdo = null;

// Return the results as JSON
echo json_encode($data);
?>

