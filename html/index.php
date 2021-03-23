<?php 
    include('db_conn.php');
    include('insert.php');
// if (!(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] != '')) {

// header ("Location: home.php");

// }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>
	<div class="main-content">
		<div class="container">
			<div class="row register-sec">
				<div class="col-md-6 one-half">
					<div class="  register-content">
						<div class=" row">
							<div class="col-md-6 reg-title one-half">
								<p class="register-head">Register</p>
							</div>
							<div class="col-md-6 logo-title one-half">
								<a href="login.php">Log In</a> 
							</div>
						</div>
						<div class="row text-center">
							<p class="instr-content" > Fill in details to register account</p>
						</div>
						<div class="reg-form">
						<form action="home.php"  method="POST">
							<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
							<fieldset form="form">
							  <legend>Name</legend>
							 
							  <input type="text" id="name" name="name" value="<?php echo $username; ?>" required><br><br>
							  
							</fieldset>
							<?php if (isset($name_error)): ?>
								<div class="error-display">
						  			<span ><?php echo $name_error; ?></span>
						  		</div>
						  <?php endif ?>
					  	</div>
					  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
							<fieldset form="form">
							  <legend>Email</legend>
							 
							  <input type="email" id="email" name="email" value="<?php echo $email; ?>" required ><br><br>
							  
							</fieldset>
							<?php if (isset($email_error)): ?>
					     	 <div class="error-display">
					      		<span><?php echo $email_error; ?></span>
					      	</div>
					      <?php endif ?>
					  	</div>
							<fieldset form="form">
							  <legend>Password</legend>
							 
							  <input type="password" id="password" name="password" required><br><br>
							  <img class="eye-img show_pswd" src="images/eye.png" alt="" >
							</fieldset>
							<div class="submit-btn">
								<input type="submit" name="register" value="Register">
							</div>
						</form>
							
						</div>
					</div>
				</div>
				<div class="col-md-6 one-half img-sec" style="background-image: url('images/africa-officer-employ 1.png');background-size: cover!important; background-repeat: no-repeat;">
					<div class="img-overlay" >
						<div class="content">
							<img class="logo-img" src="images/logo.png" alt="" >
							<p>Devops Tooling Website</p>
						</div>
						 
					</div>
					
				</div>
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