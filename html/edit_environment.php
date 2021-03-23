<?php 
    include('db_conn.php');
    include('logout_popup.php');
     include('insert_environment.php');
     include('delete.php');
    session_start();

if(!isset($_SESSION['sess_user'])) {

header ("Location: login.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Environment</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>

</head>
<body>
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-md-2 sidebar">
				<div class="logo">
					<img class="logo-img" src="images/Darey_1.png" alt="" >
				</div>
				<div class="sidebar-menus">
					<ul>
						<li ><a href="home.php"><img src="images/dashboard.png"><span class="menu-title">Dashboard</span></a></li>
						<li><a href="environment.php"><img src="images/environment.png"><span class="menu-title">Environment</span></a></li>
						<li><a href="dev_tools.php"><img src="images/tools.png"><span class="menu-title">Devops Tools</span></a></li>
						<li><a href="analytics.php"><img src="images/analytics.png"><span class="menu-title">Analytics</span></a></li>
						<li><a  onclick="popupOpen();"><img src="images/logout.png"><span class="menu-title">Log Out</span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10 main-content">
				<div class="titles">
					<h4>Add Environment</h4>
				</div>
				<div class="inner-content">
					<div class="edit-form">
						<form action="environment.php"  method="POST" enctype="multipart/form-data">
							<select id="environment_type" name="environment_type" required>
							    <option value="SIT">SIT</option>
							    <option value="UAT">UAT</option>
							    <option value="Pentest">Pentest</option>
							    <option value="Pre Prod">Pre Prod </option>
							    <option value="Prod">Prod</option>
							    <option value="QA">QA</option>
							</select>
							<input type="text" name="env_name" placeholder=" Name of Environmental " required>
						
							 <input type="text" id="env_ip" name="env_ip" minlength="7" maxlength="15" size="15" placeholder=" IP address "   required>
							 <div class="submit-btn">
								<input type="submit" class="save-btn" name="save_environment" value="Save Environment">
							</div>
						</form>
					</div>
					<div class="edit-form delete-form">
							<form action="edit_environment.php"  method="POST" enctype="multipart/form-data">
								<select name="environ_select" id="environ_select">
									    <option disabled selected>-- Select City --</option>
									    <?php
									        
									        $environment_records = mysqli_query($conn, "SELECT id, environment_type,ip_address,environment_name From environments");  // Use select query here 
                                            
									        while($data = mysqli_fetch_array($environment_records))
									        {
									        	

									            echo "<option value='". $data['id'] ."'>" .$data['environment_type'] ." " .$data['environment_name'] ."" .$data['ip_address'] ."</option>";  // displaying data in option menu


									        }
									        // echo'<pre>'; print_r($data); echo '<pre>';	
									    ?>  
								</select>
								<div class="submit-btn">
								<input type="submit" class="save-btn" name="delete_environment" value="Delete Environment">
							</div>
							</form>
						</div>
				
			</div>
	</div>

</body>
</html>

 