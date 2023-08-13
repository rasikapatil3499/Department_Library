<?php
// Include your database connection code here
// Database connection
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'library';

$pdo = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    // Retrieve form data
    $bookId = $_POST[ 'book_id' ];

    // Check if the book is available
    $selectBookQuery = 'SELECT status FROM books WHERE id = :book_id';
    $selectBookStatement = $pdo->prepare( $selectBookQuery );
    $selectBookStatement->bindParam( ':book_id', $bookId );
    $selectBookStatement->execute();
    $bookStatus = $selectBookStatement->fetchColumn();

    if ( $bookStatus === 'available' ) {
        // Delete the book from the 'books' table
        $deleteBookQuery = 'DELETE FROM books WHERE id = :book_id';
        $deleteBookStatement = $pdo->prepare( $deleteBookQuery );
        $deleteBookStatement->bindParam( ':book_id', $bookId );
        $deleteBookStatement->execute();

        // Redirect to the index page or show a success message
        header( 'Location: index.html?success=true' );
        exit;
    } else {
        // Book is borrowed, show an error message
        $errorMessage = 'Cannot delete borrowed book. Return the book before deleting.';
    }
}
?>

