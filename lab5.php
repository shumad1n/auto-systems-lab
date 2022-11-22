<?php

$host = 'localhost';
$db = 'libdb';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
	$pdo = new PDO($dsn, $user, $password);

	if ($pdo) {
		echo "Connected to the $db database successfully!\n";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}


// $sql = 'INSERT INTO books(title, isbn, published_date) VALUES(:title, :isbn, :published_date)';

// $statement = $pdo->prepare($sql);

// $statement->execute([
// 	'title' => "mybook3",
//     'isbn' => "5678",
//     'published_date' => "2020-11-12",
// ]);

// $book_id = $pdo->lastInsertId();

// echo 'The book id ' . $book_id . ' was inserted';

$sql = 'SELECT book_id, title 
		FROM books
        WHERE isbn = :isbn';
        
$isbn = "1234";

$statement = $pdo->prepare($sql);
$statement->bindParam(':isbn', $isbn, PDO::PARAM_STR);
$statement->execute();

$books = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($books) {
	foreach ($books as $book) {
		echo $book['title'] . "\n";
	}
}

?>