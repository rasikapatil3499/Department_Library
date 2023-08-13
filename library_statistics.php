<?php
// Database connection
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'library';

$pdo = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

// Get total number of books
$totalBooksSql = 'SELECT COUNT(*) FROM books';
$stmtTotalBooks = $pdo->query( $totalBooksSql );
$totalBooks = $stmtTotalBooks->fetchColumn();

// Get number of available books
$availableBooksSql = "SELECT COUNT(*) FROM books WHERE status = 'available'";
$stmtAvailableBooks = $pdo->query( $availableBooksSql );
$availableBooks = $stmtAvailableBooks->fetchColumn();

// Get number of borrowed books
$borrowedBooksSql = "SELECT COUNT(*) FROM books WHERE status = 'borrowed'";
$stmtBorrowedBooks = $pdo->query( $borrowedBooksSql );
$borrowedBooks = $stmtBorrowedBooks->fetchColumn();

// Close the database connection
$pdo = null;

// Create an array with statistics
$statistics = array(
    'totalBooks' => $totalBooks,
    'availableBooks' => $availableBooks,
    'borrowedBooks' => $borrowedBooks
);

// Convert the array to JSON and output it
header( 'Content-Type: application/json' );
echo json_encode( $statistics );
?>
