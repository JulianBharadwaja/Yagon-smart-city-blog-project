<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>
<?php
// DESTROYING EVERY SESSION CREATED
$_SESSION['User_ID'] = null;
$_SESSION['UserName'] = null;
$_SESSION['AdminName'] = null;
session_destroy();
Redirect_to("Login.php");
?>