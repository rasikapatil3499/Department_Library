<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $loanId = $_POST[ 'loan_id' ];
    $returnDate = $_POST[ 'return_date' ];

    // Database connection
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'library';

    $pdo = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

    // Update 'loans' table
    $updateLoansSql = 'UPDATE loans SET return_date = :return_date WHERE loan_id = :loan_id';
    $stmtLoans = $pdo->prepare( $updateLoansSql );
    $stmtLoans->bindParam( ':return_date', $returnDate );
    $stmtLoans->bindParam( ':loan_id', $loanId );
    $stmtLoans->execute();

    // Get book_id from 'loans' table
    $getBookIdSql = 'SELECT book_id FROM loans WHERE loan_id = :loan_id';
    $stmtGetBookId = $pdo->prepare( $getBookIdSql );
    $stmtGetBookId->bindParam( ':loan_id', $loanId );
    $stmtGetBookId->execute();
    $bookId = $stmtGetBookId->fetchColumn();

    // Update 'books' table status to 'available' using the 'id' column
    $updateBooksSql = "UPDATE books SET status = 'available' WHERE id = :book_id";
    // Change 'book_id' to 'id'
    $stmtBooks = $pdo->prepare( $updateBooksSql );
    $stmtBooks->bindParam( ':book_id', $bookId );
    $stmtBooks->execute();

    // After successful return
    header( 'Location: return_book.html' );
    // Redirect back to the form page
    exit;
    // Make sure to exit to prevent further execution
}
?>
