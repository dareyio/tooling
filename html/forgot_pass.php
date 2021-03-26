<?php 
include('db_conn.php');

if(isset($_POST["reset-password"])){  
  
if(!empty($_POST['email']) && !empty($_POST['new_pass'])) {  
    $email_r=$_POST['email'];  
    $new_pass=$_POST['new_pass'];  
  
    $sql=  "UPDATE user SET password = '".$new_pass."' WHERE email='".$email_r."'";
    echo $sql;
   $query= mysqli_query($conn, $sql);
   header("Location: login.php"); 

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>
	
	<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<style >
	h2.form-title {
	text-align: center;
}
form.login-form {
    padding: 30px;
/*   text-align: center;*/
}

.register-sec {
    max-width: 775px;
     height: max-content; 
    margin: 0 auto;
    width: 100%;
    box-shadow: 0px 0px 20px rgb(0 0 0 / 15%);
}
</style>
<body>
	<div class="main-content">
		<div class="container">
	<div class="register-sec">
	<form class="login-form" action="forgot_pass.php" method="post">
		<h2 class="form-title">Reset password</h2>
             <fieldset form="form">
                <legend>Email</legend>
               
                <input type="email" id="email" name="email" required="" ><br><br>
                
              </fieldset>
              <fieldset form="form">
                <legend>Reset Password</legend>
               
                <input type="password" id="new_pass" name="new_pass" required=""><br><br>
                <img class="eye-img" src="images/blue-eye.png" alt="" >
              </fieldset>
                  <div class="form-group submit-btn ">
                    <input  type="submit" name="reset-password" class="login-btn" placeholder="Reset Password" value="Reset Password">
                  </div>
	</form>
</div>
</div>
</div>
<script >
    jQuery("body").on('click', '.eye-img', function() {
  jQuery(this).toggleClass("show_pswd");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
  </script>
</body>
</html>