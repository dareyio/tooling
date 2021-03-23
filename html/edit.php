<?php 
    include('db_conn.php');
    include('logout_popup.php');
    include('insert_tool.php');
    include('delete.php');
    session_start();

if (!(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] != '')) {

header ("Location: login.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
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
					<h4>Add The Tool</h4>
				</div>
				<div class="inner-content">

					<div class="edit-form">
						<form action="dev_tools.php"  method="POST" enctype="multipart/form-data">
							<select id="tool_type" name="tools" required>
							    <option value="Continous Integration">Continous Integration</option>
							    <option value="Cloud">Cloud</option>
							    <option value="Monitor">Monitor</option>
							    <option value="Version Control">Version Control</option>
							    <option value="IAAC">IAAC</option>
							    <option value="SCM">SCM</option>
							    <option value="Code Quality">Code Quality</option>
							    <option value="Containrization">Containrization</option>
							</select>
							<input type="text" name="tool_name" placeholder="Enter Name of the Tool" required>
							<input type="url" name="tool_url" placeholder="https://example.com"  pattern="https://.*" size="30" required >
							 <p>Please select the image of the tool</p>
							 <input type="file" id="img" name="img" accept="image/*" required>
							 <div class="submit-btn">
								<input type="submit" class="save-btn" name="save_tool" value="Save Tool">
							</div>
						</form>
					</div>
					<div class="edit-form delete-form">
							<form action="edit.php"  method="POST" enctype="multipart/form-data">
								<select name="tool_select" id="tool_select">
									    <option disabled selected>-- Select City --</option>
									    <?php
									        
									        $tool_records = mysqli_query($conn, "SELECT  tool_name From tools");  // Use select query here 

									        while($data = mysqli_fetch_array($tool_records))
									        {
									        	

									            echo "<option value='". $data['tool_name'] ."'>" .$data['tool_name'] ."</option>";  // displaying data in option menu


									        }	
									    ?>  
								</select>
								<div class="submit-btn">
								<input type="submit" class="save-btn" name="delete_tool" value="Delete Tool">
							</div>
							</form>
						</div>
			</div>
	</div>

</body>
</html>

