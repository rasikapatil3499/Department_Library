<?php
// Include your database connection code here
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'library';

$pdo = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

// Fetch data from the 'loans' table
$selectLoansQuery = 'SELECT * FROM loans';
$selectLoansStatement = $pdo->query( $selectLoansQuery );
$loansData = $selectLoansStatement->fetchAll( PDO::FETCH_ASSOC );
?>

<!DOCTYPE html>
<html>
<head>
<title>Loans Table</title>
<link rel = 'stylesheet' href = 'styles.css'>
<!-- Your other head elements -->
</head>
<body>
<!-- Navigation Bar -->
<ul class = 'navbar'>
<li><a href = 'index.html'>Dashboard</a></li>
<li><a href = 'add_book.html'>Add Book</a></li>
<li><a href = 'update_book.html'>Update Status</a></li>
<li><a href = 'delete_book.html'>Delete Book</a></li>
<li><a href = 'issue_book.html'>Issue Book</a></li>
<li><a href = 'return_book.html'>Return Book</a></li>
<li><a href = 'loans.php'>Book Issued</a></li>
<li><a href = 'book_detail.php'>Book Details</a></li>
</ul>

<h1>Loans Table</h1>

<table border = '1'>
<tr>
<th>Loan ID</th>
<th>Book ID</th>
<th>Borrower Name</th>
<th>Issue Date</th>
<th>Return Date</th>
</tr>
<?php foreach ( $loansData as $loan ): ?>
<tr>
<td><?php echo $loan[ 'loan_id' ];
?></td>
<td><?php echo $loan[ 'book_id' ];
?></td>
<td><?php echo $loan[ 'borrower_name' ];
?></td>
<td><?php echo $loan[ 'issue_date' ];
?></td>
<td><?php echo $loan[ 'return_date' ];
?></td>
</tr>
<?php endforeach;
?>
</table>
</body>
</html>
