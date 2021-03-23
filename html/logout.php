<?php
session_start();
session_destroy();

unset($_SESSION["sess_user"]);
header("Location:login.php");
?>
