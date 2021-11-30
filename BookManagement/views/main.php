
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
          <a class="navbar-brand" href="#"><strong> Book Management</strong></a>
            <form class="d-flex">
              <ul class="nav navbar-nav navbar-left">
            <li><a href="<?php ROOT_PATH ?>addBooks/add">Add Book</a></li>
          </ul>
          </form>

          <ul class="nav navbar-nav navbar-right">
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <input type="search" name="search_data">
                <input type="submit" name="search" class="btn btn-info" value="Search">
                </form>
            </ul>
          </div>
        </div>
      </nav>
<?php Message::display(); ?>

<?php require($view); ?>
      
</body>
</html>