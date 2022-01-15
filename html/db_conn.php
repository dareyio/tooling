<?php
$servername = "mysqlserverhost";
$username = "clientConnect";
$password = "password@@@@@";
$dbname = "toolingdb5";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>
