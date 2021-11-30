<?php
   // $host        = "host = 127.0.0.1";
   // $port        = "port = 5432";
   // $dbname      = "dbname = books";
   // $credentials = "user = postgres password=root123";

  
   // $db = new PDO("pgsql:$host $port $dbname $credentials");
// // Define DB Params
define("DB_HOST", "localhost");
define("DB_USER", "postgres");
define("DB_PORT", "5432");
define("DB_NAME", "bookManagement");
define("DB_PASSWORD", "root123");


// Define URL
define("ROOT_PATH", "/BookManagement/");
define("ROOT_URL", "http://localhost/BookManagement/");