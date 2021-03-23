<?php 
include('db_conn.php');
  //$conn = mysqli_connect('localhost', 'root', '', 'dare');
  $username = "";
  $email = "";
  if (isset($_POST['register'])) {
  	$username = $_POST['name'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];

  	$sql_u = "SELECT * FROM user WHERE username='$username'";
  	$sql_e = "SELECT * FROM user WHERE email='$email'";
    $sql_p = "SELECT * FROM user WHERE email='$password'";
  	
    $res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);
    $res_p = mysqli_query($conn, $sql_p);
  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else{
           $query = "INSERT INTO user (username, email, password) 
      	    	  VALUES ('$username', '$email', '".$password."')";
           $results = mysqli_query($conn, $query);
           
          

           header("Location: home.php"); 
           
           exit();
  	}
  }
?>