

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST["book_id"];
    $borrowerName = $_POST["borrower_name"];
    $issueDate = $_POST["issue_date"];
  

    // Database connection
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
 
    // Insert into 'loans' table
    $sql = "INSERT INTO loans (book_id, borrower_name, issue_date) VALUES (:book_id, :borrower_name, :issue_date)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':book_id', $bookId);
    $stmt->bindParam(':borrower_name', $borrowerName);
    $stmt->bindParam(':issue_date', $issueDate);

    $stmt->execute();

    // Update 'books' table
    $updateStatusSql = "UPDATE books SET status = 'borrowed' WHERE id = :book_id";
    $updateStatusStmt = $pdo->prepare($updateStatusSql);
    $updateStatusStmt->bindParam(':book_id', $bookId);
    $updateStatusStmt->execute();
    

     // After successful isseu
header("Location: issue_book.html"); // Redirect back to the form page
exit; // Make sure to exit to prevent further execution
}


?>



