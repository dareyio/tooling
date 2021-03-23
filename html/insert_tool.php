<?php 
include('db_conn.php');
  //$conn = mysqli_connect('localhost', 'root', '', 'dare');
  $username = "";
  $email = "";
  if (isset($_POST['save_tool'])) {
    $toolType = $_POST['tools'];
    $toolName = $_POST['tool_name'];
  	$toolUrl = $_POST['tool_url'];
  	//$toolImage = $_POST['img'];
   // $image_Path = "images/".basename($toolImage);
    $Get_image_name = $_FILES['img']['name'];
   
    // image Path
    $image_Path = "images/".basename($Get_image_name);
    //move to directory
      move_uploaded_file($_FILES['img']['tmp_name'], $image_Path);
      
    $image = $_FILES['img']['name'];
  

    // image file directory
    $target = "images/".basename($image);

  	$sql_t = "SELECT * FROM tools WHERE tool_type='$toolType'";
  	$sql_n = "SELECT * FROM tools WHERE tool_name='$toolName'";
    $sql_url = "SELECT * FROM tools WHERE url='$toolUrl'";
    $sql_img = "SELECT * FROM tools WHERE image='$image_Path'";
  	$res_t = mysqli_query($conn, $sql_t);
  	$res_n = mysqli_query($conn, $sql_n);
    $res_url = mysqli_query($conn, $sql_url);
    $res_img = mysqli_query($conn, $sql_img);
    
  	if (mysqli_num_rows($res_n) > 0) {
  	  $name_error = "Tool already exist"; 	
  		
  	}else{
           $query = "INSERT INTO tools (tool_name, tool_type, url, image) 
      	    	  VALUES ('$toolName', '$toolType', '$toolUrl', '$image_Path' )";
           $results = mysqli_query($conn, $query);
           header("Location: dev_tools.php"); 
           
           exit();
  	}
  }
?>