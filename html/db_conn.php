<?php


//connect to .env 

require_once realpath(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

//loads the required env when called
$dotenv->load();  

//get database connectionfrom environment variable file


$Hostname = $_ENV["MYSQLIP"]; // input servername
$dbUsername = $_ENV["MYSQLUSER"]; // input username
$dbPassword = $_ENV["MYSQLPASS"]; //input password
$dbName = $_ENV["MYSQLDBNAME"]; // input dbname

// Create connection
$conn = new mysqli($Hostname, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>
