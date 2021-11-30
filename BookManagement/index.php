<?php
// Start Session
//session_start();

// Include Config
require('config.php');

// require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Message.php');



require('controllers/home.php');
require('controllers/addBooks.php');
require('controllers/editBooks.php');

require('models/home.php');
require('models/addBook.php');
require('models/editBook.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}