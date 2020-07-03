<?php include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Create user</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="login-box">
		<h2>Admin - create user</h2>
	
	
	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label></label>
			<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label></label>
			<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
		</div>
		
		<label>User Type</label>
		<div class="input-group">
			<label>User Type</label>
			<select name="user_type" id="user_type" >
				<option value="" ></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<br>
		<div class="input-group">
			<label></label> 
			<input type="password" name="password_1"  placeholder=" Password" >
		</div>
		<div class="input-group">
			<label></label>
			<input type="password" name="password_2"  placeholder=" Confirm Password" >
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>
	</form>
	</div>
</body>
</html>