<?php 
include('db_conn.php');
  //$conn = mysqli_connect('localhost', 'root', '', 'dare');
  $username = "";
  $email = "";
  if (isset($_POST['save_environment'])) {
    $environmentType = $_POST['environment_type'];
    $environmentName = $_POST['env_name'];
  	$IP_address = $_POST['env_ip'];

  
  	$sql_et = "SELECT * FROM environments WHERE environment_type='$environmentType'";
  	//$sql_en = "SELECT * FROM environments WHERE environment_name='$environmentName'";
    //$sql_eip = "SELECT * FROM environments WHERE ip_address='$IP_address'";
    $mainsql = "SELECT * FROM environments WHERE environment_type='$environmentType' and  environment_name='$environmentName' and ip_address='$IP_address'";

    $res_m = mysqli_query($conn, $mainsql);
    //echo $mainsql;
    $num_rows = mysqli_num_rows($res_m);
  	// if (mysqli_num_rows($res_et) > 0 && mysqli_num_rows($res_en) > 0 &&  mysqli_num_rows($res_eip) > 0) 
    echo '<pre>'; print_r($num_rows); echo '</pre>';
    if (mysqli_num_rows($res_m) > 0 ){
  	  $name_error = "Environment already exist"; 	
      //echo $mainsql;
     // echo $sql_en;
     // echo $sql_eip;
  		echo $name_error ;
  	}else{
           $query = "INSERT INTO environments (environment_type, environment_name, ip_address) 
      	    	  VALUES ('$environmentType', '$environmentName', '$IP_address' )";
           $results = mysqli_query($conn, $query);
           header("Location: environment.php"); 
           echo  $query;
           //exit();
  	}
  }
?>