<?php 
include('db_conn.php');
  
  $username = "";
  $email = "";
//delete query for Devlop tools
  if (isset($_POST['delete_tool'])) {
    $tool_select = $_POST['tool_select'];

  // sql to delete a record
      $sql = "DELETE FROM tools WHERE tool_name ='$tool_select'";
      $results = mysqli_query($conn, $sql);
     // echo $results;
      if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
                
                 header("Location: edit.php"); 
}


//delete query for environment

if (isset($_POST['delete_environment'])) {
    
   
    $environ_select = $_POST['environ_select'];
  
  
   // sql to delete a record
      $sql_enviorn = "DELETE FROM environments WHERE id = '$environ_select'";

      $results_enviorn = mysqli_query($conn, $sql_enviorn);
      //echo '<pre>'; print_r($results_enviorn); 
      if ($conn->query($sql_enviorn) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
                
                 header("Location: edit_environment.php"); 
}

?>