<?php
// Database connection
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'library';

$pdo = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

// Get borrowers' borrowing counts
$borrowersSql = 'SELECT borrower_name, COUNT(*) AS borrowing_count FROM loans GROUP BY borrower_name ORDER BY borrowing_count DESC';

$stmtBorrowers = $pdo->query( $borrowersSql );
$borrowers = $stmtBorrowers->fetchAll( PDO::FETCH_ASSOC );

// Close the database connection
$pdo = null;

// Convert the array to JSON and output it
header( 'Content-Type: application/json' );
echo json_encode( $borrowers );
?>
