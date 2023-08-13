<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $id = $_POST[ 'id' ];
    $title = $_POST[ 'title' ];
    $author = $_POST[ 'author' ];

    // Database connection
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'library';

    $pdo = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

    // Insert into 'books' table
    $sql = 'INSERT INTO books (id,title, author) VALUES (:id, :title, :author)';
    $stmt = $pdo->prepare( $sql );
    $stmt->bindParam( ':id', $id );
    $stmt->bindParam( ':title', $title );
    $stmt->bindParam( ':author', $author );
    $stmt->execute();

    // After successful insertion
    header( 'Location: add_book.html' );
    // Redirect back to the form page
    exit;
    // Make sure to exit to prevent further execution

}
?>
