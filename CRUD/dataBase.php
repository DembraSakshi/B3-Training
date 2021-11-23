<?php
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = books";
   $credentials = "user = postgres password=root123";

  
   $db = new PDO("pgsql:$host $port $dbname $credentials");
   $bookname ="";
   $author ="";
   $price ="";

   if($_SERVER['REQUEST_METHOD']=== 'POST'){
     $bookname = $_POST['bookname'];
     $author = $_POST['author'];
     $price = $_POST['price'];

     $statement = $db->prepare("INSERT INTO books (book_name, author, price)
     VALUES (:bookname, :author, :price)");
$statement->bindValue(':bookname', $bookname);
$statement->bindValue(':author', $author);
$statement->bindValue(':price', $price);
$statement->execute();


$statement = $db->prepare('SELECT * FROM books');
$statement->execute();
// $products = $statement->fetchAll(PDO::FETCH_ASSOC);

   }

   ?> 