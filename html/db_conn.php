<?php

// enabling environmental variable for the parameters 
$servername = "localhost" ;
$username = '.$_ENV["MYSQL_USERNAME"]' ;
$password = '.$_ENV["MYSQL_PW"]' ;
$dbname = '.$_ENV["MYSQL_DBNAME"]' ;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
