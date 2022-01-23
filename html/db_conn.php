<?php

//connect .env file

require_once realpath(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// enabling environment variable for php


$servername = $_ENV["MYSQL_IP"]; // input servername
$username = $_ENV["MYSQL_USER"]; // input username
$password = $_ENV["MYSQL_PASS"]; //input password
$dbname = $_ENV["MYSQL_DBNAME"]; // input dbname


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>