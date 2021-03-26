<?php 
    include('db_conn.php');
    include('logout_popup.php');
    
    session_start();

if(!isset($_SESSION['sess_user'])) {

header ("Location: login.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Home</title>

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
						<li class="active"><a href="home.php"><img src="images/dashboard.png"><span class="menu-title">Dashboard</span></a></li>
						<li><a href="environment.php"><img src="images/environment.png"><span class="menu-title">Environment</span></a></li>
						<li><a href="dev_tools.php"><img src="images/tools.png"><span class="menu-title">Devops Tools</span></a></li>
						<li><a href="analytics.php"><img src="images/analytics.png"><span class="menu-title">Analytics</span></a></li>
						<li><a  onclick="popupOpen();"><img src="images/logout.png"><span class="menu-title">Log Out</span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10 main-content">
				<div class="titles">
					<h4>Dashboard</h4>
				</div>
				<div class="inner-content dashboard_home">
					<div class="row">
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-4">
									<div class="box">
										<p class="sub-tiles">Open Issues</p>
										<h4 class="number">26</h4>
									</div>
									
								</div>
								<div class="col-md-4">
									<div class="box">
										<p class="sub-tiles">Average Response Time(sec)</p>
										<h4 class="number">5.7</h4>
									</div>
								</div>
								<div class="col-md-4">
									<div class="box">
										<p class="sub-tiles">Mean Time To Recover</p>
										<h4 class="number">1.2 days</h4>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="box">
										<p class="sub-tiles">Number of Issues Per Day</p>
										<img src="images/2.png">
									</div>
									
								</div>
								<div class="col-md-6">
									<div class="box">
										<p class="sub-tiles">Average Server Response Time(Past 1 Hour)</p>
										<img src="images/3.png">
									</div>
									
								</div>
							</div>
								<div class="row">
								<div class="col-md-6">
									<div class="box">
										<p class="sub-tiles">Number of Errors by Error Code</p>
										<img src="images/4.png">
									</div>
									
								</div>
								<div class="col-md-6">
									<div class="box">
										<p class="sub-tiles">Top 5 Requests By Average Response Time </p>
										<img src="images/1.png">
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="box">
								<p class="sub-tiles">Bugs by state</p>
								<img src="images/active-bug-charts-on-dashboards.png">
							</div>
							<div class="box">
								<p class="sub-tiles">Bugs by state</p>
								<img src="images/report-template-for-google-analytics.png">
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>

