<?php
// Include your database connection code here
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'library';

$pdo = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

// Fetch data from the 'books' table
$selectBooksQuery = 'SELECT * FROM books';
$selectBooksStatement = $pdo->query( $selectBooksQuery );
$booksData = $selectBooksStatement->fetchAll( PDO::FETCH_ASSOC );
?>

<!DOCTYPE html>
<html>
<head>
<title>Books Table</title>
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

<h1>Books Table</h1>

<table border = '1'>
<tr>
<th>ID</th>
<th>Title</th>
<th>Author</th>
<th>Status</th>
</tr>
<?php foreach ( $booksData as $book ): ?>
<tr>
<td><?php echo $book[ 'id' ];
?></td>
<td><?php echo $book[ 'title' ];
?></td>
<td><?php echo $book[ 'author' ];
?></td>
<td><?php echo $book[ 'status' ];
?></td>
</tr>
<?php endforeach;
?>
</table>
</body>
</html>
