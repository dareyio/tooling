<?php 
    include('db_conn.php');
    include('logout_popup.php');
     include('insert_tool.php');
   session_start();

if (!(isset($_SESSION['sess_user']) && $_SESSION['sess_user'] != '')) {

header ("Location: login.php");

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Devops Tools</title>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
						<li><a href="environment.php"><img src="images/environment.png"><span class="menu-title">Environment</span></a></li>
						<li class="active"><a href="dev_tools.html"><img src="images/tools.png"><span class="menu-title">Devops Tools</span></a></li>
						<li><a href="analytics.php"><img src="images/analytics.png"><span class="menu-title">Analytics</span></a></li>
						<li><a  onclick="popupOpen();"><img src="images/logout.png"><span class="menu-title">Log Out</span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10 main-content">
				<div class="titles">
					<h4>Devops Tools</h4>
				</div>
				<div class="inner-content">
					<div class="row">
						<div class="accordion-container">
	  						<div class="set">				
								<a href="#" class="tab-a">
								    Continous Integration 
								    <!-- <i class="fa fa-plus"></i>
								    <img src="images/plus.png"> -->
								    <a class="edit" href="edit.php"> Edit</a>
								</a>
								<div class="content">
									<?php
										 if (isset($_POST['save_tool'])) {
											  	// Get image name
											  	$image = $_FILES['img']['name'];
											  // image file directory
											  	$target = "images/".basename($image);

											  }
											  $result = mysqli_query($conn, "SELECT * FROM tools WHERE tool_type='Continous Integration ';");
										
										echo "<div class='img-sec'>";
								           echo "<div class='row'>";
								           while ($row = mysqli_fetch_array($result)) {
                                             $url_new=  $row['url'];
                                             $url_image=  $row['image'];
										    
										      echo "<div class='col-md-3 img_div '>";
										      	 
										      	  print('<a href="'.$url_new.'"><img src="'.$url_image.'"></a>'); 

										      echo "</div>";
										     
										    }
										    echo "</div>";
										 echo "</div>";	
									?>
								</div>
						 	</div>
							 <div class="set">
							    <a href="#" class="tab-a">
							      Cloud 
							      <!-- <i class="fa fa-plus"></i> -->
							      <a class="edit" href="edit.php"> Edit</a>
							    </a>
							    <div class="content">
							      	<?php
										 if (isset($_POST['save_tool'])) {
											  	// Get image name
											  	$image = $_FILES['img']['name'];
											  // image file directory
											  	$target = "images/".basename($image);

											  }
											  $result = mysqli_query($conn, "SELECT * FROM tools WHERE tool_type='Cloud';");
										
										echo "<div class='img-sec'>";
								           echo "<div class='row'>";
								           while ($row = mysqli_fetch_array($result)) {
                                             $url_new=  $row['url'];
                                             $url_image=  $row['image'];
										     
										      echo "<div class='img_div col-md-3'>";
										      	 
										      	  print('<a href="'.$url_new.'"><img src="'.$url_image.'"></a>'); 

										      echo "</div>";
										     
										    }
										 echo "</div>";	
										 echo "</div>";
									?>  
							</div>
						</div>
							<div class="set">
							    <a href="#" class="tab-a">
							      Monitor 
							     <!--  <i class="fa fa-plus"></i> -->
							      <a class="edit" href="edit.php"> Edit</a>
							    </a>
							    <div class="content">
							      	<?php
										 if (isset($_POST['save_tool'])) {
											  	// Get image name
											  	$image = $_FILES['img']['name'];
											  // image file directory
											  	$target = "images/".basename($image);

											  }
											  $result = mysqli_query($conn, "SELECT * FROM tools WHERE tool_type='Monitor';");
										
										echo "<div class='img-sec'>";
								           echo "<div class='row'>";
								           while ($row = mysqli_fetch_array($result)) {
                                             $url_new=  $row['url'];
                                             $url_image=  $row['image'];
										     
										      echo "<div class='img_div col-md-3'>";
										      	 
										      	  print('<a href="'.$url_new.'"><img src="'.$url_image.'"></a>'); 

										      echo "</div>";
										     
										    }
										 echo "</div>";	
										 echo "</div>";
									?> 
							    </div>
							</div>
							<div class="set">
							    <a href="#" class="tab-a">
							      Version Control 
							     <!--  <i class="fa fa-plus"></i>  -->
							      <a class="edit" href="edit.php"> Edit</a>
							    </a>
							    <div class="content">
							     	<?php
										 if (isset($_POST['save_tool'])) {
											  	// Get image name
											  	$image = $_FILES['img']['name'];
											  // image file directory
											  	$target = "images/".basename($image);

											  }
											  $result = mysqli_query($conn, "SELECT * FROM tools WHERE tool_type='Version Control ';");
										
										echo "<div class='img-sec'>";
								           echo "<div class='row'>";
								           while ($row = mysqli_fetch_array($result)) {
                                             $url_new=  $row['url'];
                                             $url_image=  $row['image'];
										     
										      echo "<div class='img_div col-md-3'>";
										      	 
										      	  print('<a href="'.$url_new.'"><img src="'.$url_image.'"></a>'); 

										      echo "</div>";
										     
										    }
										 echo "</div>";	
										 echo "</div>";
									?> 
							    </div>
							</div>
							<div class="set">
							      <a href="#" class="tab-a">
							      IAAC
							     <!--  <i class="fa fa-plus"></i>  -->
							      <a class="edit" href="edit.php"> Edit</a>
							    </a>
							    <div class="content">
							      	<?php
										 if (isset($_POST['save_tool'])) {
											  	// Get image name
											  	$image = $_FILES['img']['name'];
											  // image file directory
											  	$target = "images/".basename($image);

											  }
											  $result = mysqli_query($conn, "SELECT * FROM tools WHERE tool_type='IAAC';");
										
										echo "<div class='img-sec'>";
								           echo "<div class='row'>";
								           while ($row = mysqli_fetch_array($result)) {
                                             $url_new=  $row['url'];
                                             $url_image=  $row['image'];
										     
										      echo "<div class='img_div col-md-3'>";
										      	 
										      	  print('<a href="'.$url_new.'"><img src="'.$url_image.'"></a>'); 

										      echo "</div>";
										     
										    }
										 echo "</div>";	
										 echo "</div>";
									?> 
							    </div>
							</div>
							<div class="set">
							   <a href="#" class="tab-a">
							      SCM
							      <!-- <i class="fa fa-plus"></i> -->
							      <a class="edit" href="edit.php"> Edit</a> 
							    </a>
							    <div class="content">
							      	<?php
										 if (isset($_POST['save_tool'])) {
											  	// Get image name
											  	$image = $_FILES['img']['name'];
											  // image file directory
											  	$target = "images/".basename($image);

											  }
											  $result = mysqli_query($conn, "SELECT * FROM tools WHERE tool_type='SCM';");
										
										echo "<div class='img-sec'>";
								           echo "<div class='row'>";
								           while ($row = mysqli_fetch_array($result)) {
                                             $url_new=  $row['url'];
                                             $url_image=  $row['image'];
										     
										      echo "<div class='img_div col-md-3'>";
										      	 
										      	  print('<a href="'.$url_new.'"><img src="'.$url_image.'"></a>'); 

										      echo "</div>";
										     
										    }
										 echo "</div>";	
										 echo "</div>";
									?> 
							    </div>
							</div>
							<div class="set">
							    <a href="#" class="tab-a">
							      Code Quality
							      <!-- <i class="fa fa-plus"></i> -->
							      <a class="edit" href="edit.php"> Edit</a> 
							    </a>
							    <div class="content">
							      	<?php
										 if (isset($_POST['save_tool'])) {
											  	// Get image name
											  	$image = $_FILES['img']['name'];
											  // image file directory
											  	$target = "images/".basename($image);

											  }
											  $result = mysqli_query($conn, "SELECT * FROM tools WHERE tool_type='Code Quality';");
										
										echo "<div class='img-sec'>";
								           echo "<div class='row'>";
								           while ($row = mysqli_fetch_array($result)) {
                                             $url_new=  $row['url'];
                                             $url_image=  $row['image'];
										     
										      echo "<div class='img_div col-md-3'>";
										      	 
										      	  print('<a href="'.$url_new.'"><img src="'.$url_image.'"></a>'); 

										      echo "</div>";
										     
										    }
										 echo "</div>";	
										 echo "</div>";
									?> 
							    </div>
							</div>
							<div class="set">
							     <a href="#" class="tab-a">
							      Containrization
							      <!-- <i class="fa fa-plus"></i>  -->
							      <a class="edit" href="edit.php"> Edit</a>
							    </a>
							    <div class="content">
							      	<?php
										 if (isset($_POST['save_tool'])) {
											  	// Get image name
											  	$image = $_FILES['img']['name'];
											  // image file directory
											  	$target = "images/".basename($image);

											  }
											  $result = mysqli_query($conn, "SELECT * FROM tools WHERE tool_type='Containrization';");
										
										echo "<div class='img-sec'>";
								           echo "<div class='row'>";
								           while ($row = mysqli_fetch_array($result)) {
                                             $url_new=  $row['url'];
                                             $url_image=  $row['image'];
										     
										      echo "<div class='img_div col-md-3'>";
										      	 
										      	  print('<a href="'.$url_new.'"><img src="'.$url_image.'"></a>'); 

										      echo "</div>";
										     
										    }
										 echo "</div>";
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

