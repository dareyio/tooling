<?php 
    include('db_conn.php');
    include('logout_popup.php');
    include('insert_environment.php');
    session_start();

if(!isset($_SESSION['sess_user'])) {

header ("Location: login.php");

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Environment</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
     
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
						<li  class="active"><a href="#"><img src="images/environment.png"><span class="menu-title">Environment</span></a></li>
						<li><a href="dev_tools.php"><img src="images/tools.png"><span class="menu-title">Devops Tools</span></a></li>
						<li><a href="analytics.php"><img src="images/analytics.png"><span class="menu-title">Analytics</span></a></li>
						<li><a  onclick="popupOpen();"><img src="images/logout.png"><span class="menu-title">Log Out</span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10 main-content">
				<div class="titles">
					<h4>Environment</h4>
				</div>
				<div class="inner-content">
					<div class="row">
						<div class="accordion-container">
	  						<div class="set">				
								<a href="#" class="tab-a">
								    SIT 
								    <!-- <i class="fa fa-plus"></i> -->
								    <a class="edit" href="edit_environment.php"> Edit</a>
								</a>
								<div class="content">
									<?php
										 $eviron_records = mysqli_query($conn, "SELECT environment_name,ip_address  From environments Where environment_type ='SIT'");  // Use select query here 
										echo "<div class='row content-div '>";
									        while($row = mysqli_fetch_array($eviron_records)){
									        echo "<div class=' col-md-6 environ_div '>";
												
												echo " " . $row["environment_name"]. "</br> ";
												echo " " . $row["ip_address"]. " ";
											echo "</div>";

									        }
    									echo "</div>";
    							
										 	
									?>
								</div>
						 	</div>
							 <div class="set">
							    <a href="#" class="tab-a">
							      UAT 
							      <!-- <i class="fa fa-plus"></i> -->
							      <a class="edit" href="edit_environment.php"> Edit</a>
							    </a>
							    <div class="content">
							     <?php
										 $eviron_records = mysqli_query($conn, "SELECT environment_name,ip_address  From environments Where environment_type ='UAT'");  // Use select query here 
										echo "<div class='row content-div '>";
									        while($row = mysqli_fetch_array($eviron_records)){
									        echo '<div class="col-md-6 environ_div">';
												
												echo " " . $row["environment_name"]. "</br> ";
												echo " " . $row["ip_address"]. " ";
											echo "</div>";

									        }
    									echo "</div>";
    							
										 	
									?>
							    </div>
							</div>
							<div class="set">
							    <a href="#" class="tab-a">
							      Pentest 
							     <!--  <i class="fa fa-plus"></i> -->
							      <a class="edit" href="edit_environment.php"> Edit</a>
							    </a>
							    <div class="content">
							      <?php
										 $eviron_records = mysqli_query($conn, "SELECT environment_name,ip_address  From environments Where environment_type ='Pentest'");  // Use select query here 
										echo "<div class='row content-div '>";
									        while($row = mysqli_fetch_array($eviron_records)){
									        echo "<div class='col-md-6 environ_div '>";
												
												echo " " . $row["environment_name"]. "</br> ";
												echo " " . $row["ip_address"]. " ";
											echo "</div>";

									        }
    									echo "</div>";
    							
										 	
									?>
							    </div>
							</div>
							<div class="set">
							    <a href="#" class="tab-a">
							      Pre Prod
							      <!-- <i class="fa fa-plus"></i>  -->
							      <a class="edit" href="edit_environment.php"> Edit</a>
							    </a>
							    <div class="content">
							      <?php
										 $eviron_records = mysqli_query($conn, "SELECT environment_name,ip_address  From environments Where environment_type ='Pre Prod'");  // Use select query here 
										echo "<div class='row content-div '>";
									        while($row = mysqli_fetch_array($eviron_records)){
									        echo "<div class='col-md-6 environ_div '>";
												
												echo " " . $row["environment_name"]. "</br> ";
												echo " " . $row["ip_address"]. " ";
											echo "</div>";

									        }
    									echo "</div>";
    							
										 	
									?>
							    </div>
							</div>
							<div class="set">
							    <a href="#" class="tab-a">
							      Prod
							      <!-- <i class="fa fa-plus"></i> --> 
							      <a class="edit" href="edit_environment.php"> Edit</a>
							    </a>
							    <div class="content">
							      <?php
										 $eviron_records = mysqli_query($conn, "SELECT environment_name,ip_address  From environments Where environment_type ='Prod'");  // Use select query here 
										echo "<div class='row content-div '>";
									        while($row = mysqli_fetch_array($eviron_records)){
									        echo "<div class='col-md-6 environ_div '>";
												
												echo " " . $row["environment_name"]. "</br> ";
												echo " " . $row["ip_address"]. " ";
											echo "</div>";

									        }
    									echo "</div>";
    							
										 	
									?>
							    </div>
							</div>
							<div class="set">
							    <a href="#" class="tab-a">
							      QA
							      <!-- <i class="fa fa-plus"></i>  -->
							      <a class="edit" href="edit_environment.php"> Edit</a>
							    </a>
							    <div class="content">
							      <?php
										 $eviron_records = mysqli_query($conn, "SELECT environment_name,ip_address  From environments Where environment_type ='QA'");  // Use select query here 
										echo "<div class='row content-div '>";
									        while($row = mysqli_fetch_array($eviron_records)){
									        echo "<div class='col-md-6 environ_div '>";
												
												echo " " . $row["environment_name"]. "</br> ";
												echo " " . $row["ip_address"]. " ";
											echo "</div>";

									        }
    									echo "</div>";
    							
										 	
									?>
							    </div>
							</div>
							
					</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
<script >
	/*accordion js*/
	   jQuery(document).ready(function() {
	   	
  jQuery(".set > a").on("click", function() {
    if (jQuery(this).hasClass("active")) {
      jQuery(this).removeClass("active");
      jQuery(this)
        .siblings(".content")
        .slideUp(200);
      jQuery(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    } else {
      jQuery(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
      jQuery(this)
        .find("i")
        .removeClass("fa-plus")
        .addClass("fa-minus");
      jQuery(".set > a").removeClass("active");
      jQuery(this).addClass("active");
      jQuery(".content").slideUp(200);
      jQuery(this)
        .siblings(".content")
        .slideDown(200);
    }
  });
});
</script>
</body>
</html>

