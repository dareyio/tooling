
<?php  
include('db_conn.php');
if(isset($_POST["login"])){  
  
if(!empty($_POST['email']) && !empty($_POST['password'])) {  
    $email=$_POST['email'];  
    $pass=$_POST['password'];  
  
  //  $conn = mysqli_connect('localhost', 'root', '', 'dare'); 
    $sql= "SELECT * FROM user WHERE email='".$email."' AND password='".$pass."'";  
    $query= mysqli_query($conn, $sql);
    
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbemail=$row['email'];  
    $dbpassword=$row['password'];  
    }  
  
    if($email == $dbemail && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$email;  
  
    /* Redirect browser */  
    header("Location: home.php");  
    }  
    } else {  
    $email_error = "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}
// if(!empty($_POST["remember"])) {
// 	setcookie ("email",$_POST["email"],time()+ 3600);
// 	setcookie ("password",$_POST["password"],time()+ 3600);
// 	echo "Cookies Set Successfuly";
// } else {
// 	setcookie("email","");
// 	setcookie("password","");
// 	echo "Cookies Not Set";
// }  
}  
?>  
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>
	
	<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<style >
	
	img.eye-img {
        position: relative;
    margin-top: -39px;
    float: right;
   
}
.forgot-content {
    font-family: Messina Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    color: #EB5757;
    line-height: 14px;
}
p.instr-content {
    margin-top: 20px;
}
label {
    font-family: Messina Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 14px;
    color: #000000;
}
.remember.text-left {
    display: flex;
}
.submit-btn {
    margin: 20px;
}
input#remember {
    width: 20%;
}
</style>
</head>
<body>
	<div class="main-content">
		<div class="container">
			<div class="row register-sec">
				<div class="col-md-6 one-half">
					<div class="  register-content">
						<div class=" row">
							<div class="col-md-6 reg-title one-half">
								<a href="index.php">Register</a>
							</div>
							<div class="col-md-6 logo-title one-half">
								<a href="login.php">Log In</a> 
							</div>
						</div>
						<div class="row text-center">
							<p class="instr-content" > Fill in details to log in to your account</p>
						</div>
						<div class="reg-form">
							<form action="" method = "post">
							<fieldset form="form">
							  <legend>Email</legend>
							 
							  <input type="email" id="email" name="email" required="" ><br><br>
							  
							</fieldset>
							<fieldset form="form">
							  <legend>Password</legend>
							 
							  <input type="password" id="password" name="password" required=""><br><br>
							  <img class="eye-img" src="images/blue-eye.png" alt="" >
							</fieldset>
							<div class="row">
								<div class="col-md-6 text-left remember " >
									<input type="radio" id="remember" name="remember" value="remember">
									<label>Remember me</label>
 								 </div>
 								 <div class="col-md-6 text-right ">
 								  	<a href="forgot_pass.php" class="forgot-content" > Forgot your password ?</p>
								 </div>
							</div>
							<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
							<div class="submit-btn">
								<input type="submit" value="Log In" name="login">
							</div>
							<?php if (isset($email_error)): ?>
						  	<div class="error-display">
						  		<span ><?php echo $email_error; ?></span>
						  	</div>
						  <?php endif ?>
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