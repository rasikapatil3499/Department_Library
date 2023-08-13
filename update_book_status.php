<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $bookId = $_POST[ 'book_id' ];
    $status = $_POST[ 'status' ];

    // Database connection
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'library';

    $pdo = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

    // Update 'books' table
    $sql = 'UPDATE books SET status = :status WHERE id = :book_id';
    $stmt = $pdo->prepare( $sql );
    $stmt->bindParam( ':status', $status );
    $stmt->bindParam( ':book_id', $bookId );
    $stmt->execute();

    // After successful updation
    header( 'Location: update_book.html' );
    // Redirect back to the form page
    exit;
    // Make sure to exit to prevent further execution
}
?>
