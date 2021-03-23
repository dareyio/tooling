
<?php 
    include('db_conn.php');
    include('insert.php');
?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>

</head>
<body>
 
<!-- Overlay -->
<div class="row">
<div class="overlay" id="overlay" style="display:none;"></div>

<!-- Popup -->
<div class="popup" id="popup" style="display:none;">
  <div class="popup-inner">
    
    
    <h2>Are you sure you want to log out?</h2>
    <div class="popup-buttons">
        <div class="row">
            <div class="col-md-6 pop_col">
                <input type="button" name="Close" class="popup_btn continue-btn s3-btn-close" onclick="popupClose();" value="No, Continue">
            </div>
            <div class="col-md-6 pop_col">
                <form action="logout.php">
                <input type="submit" name="logout" class="popup_btn logout-btn" value="Yes, Log Out">
            </form>
            </div>
        </div>
    	</div>	
    	
            
    	 	
    
   
  </div>
</div>

 
 <script>
	function popupOpen(){
    document.getElementById("popup").style.display="block";
    document.getElementById("overlay").style.display="block";
	}
// Popup Close
	function popupClose(){
    document.getElementById("popup").style.display="none";
    document.getElementById("overlay").style.display="none";
	}
</script>
</body>
</html>