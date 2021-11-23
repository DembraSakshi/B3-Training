<?php
  $host        = "host = 127.0.0.1";
  $port        = "port = 5432";
  $dbname      = "dbname = books";
  $credentials = "user = postgres password=root123";
$db = new PDO("pgsql:$host $port $dbname $credentials");

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $db->prepare('DELETE FROM books WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');
