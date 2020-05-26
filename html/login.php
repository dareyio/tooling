<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Propitix Tooling Login</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>

	<div class="login-box">
		<h2>Login</h2>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label></label>
			<input type="text" name="username" placeholder="Username" >
		</div>
		<div class="input-group">
			<label></label>
			<input type="password" name="password" pattern=".{8,16}" placeholder=" Password " >
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
	<!--	<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p> -->
	</form>
	</div>
</body>
</html>