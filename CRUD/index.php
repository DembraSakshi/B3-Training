<!-- <?php
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
   }

   ?> -->


<?php
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = books";
   $credentials = "user = postgres password=root123";

   $sn =1;
  
   $db = new PDO("pgsql:$host $port $dbname $credentials");
    //  $statement = $db->prepare("INSERT INTO books (book_name, author, price)
    //  VALUES (:bookname, :author, :price)");
$statement = $db->prepare('SELECT * FROM books');
$statement->execute();
// $products = $statement->fetchAll(PDO::FETCH_ASSOC);

// $sql = "SELECT * FROM books";
// $queryRecords = $statement->execute();
// $data = pg_fetch_all($queryRecords)


   ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" >
          <a class="navbar-brand" href="#">Book Management</a>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    
      <div class="container" style="color: aliceblue;">
        <div class="row">
  <form method="post" enctype="multipart/form-data">

          <div class="col" ml-0>
            <div class="mb-3">
                <label >Book Name</label>
                <input type="text" class="form-control" name="bookname" value="<?php echo $bookname ?>" placeholder="Book Name">
              </div>
              <div class="mb-3">
                <label >Author</label>
                <input type="text" class="form-control" name="author" value="<?php echo $author ?>" placeholder="Author">
              </div>
              <div class="mb-3">
                <label>Price</label>
                <input type="text" class="form-control" name="price" value="<?php echo $price ?>" placeholder="Price">
              </div>
              <button type="submit" class="btn btn-primary">ADD BOOK</button>
          </div>
  </form>
          <div class="col">
            <table class="table table-striped" style="color: aliceblue;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Book Name</th>
                  <th scope="col">Author</th>
                  <th scope="col">Price</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $books = $statement->fetchAll();
              foreach ($books as $i => $book) {
                // echo "Printing book object";
                // echo $book;
                ?>
               
        <tr id=<?php echo $book[0]; ?>>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td><?php echo $book[1]; ?></td>
            <td><?php echo $book[2]; ?></td>
            <td><?php echo $book[3]; ?></td>

            <td>
                <a href="update.php?id=<?php echo $book['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form method="post" action="delete.php" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $book['id'] ?>"/>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</body>
</html>