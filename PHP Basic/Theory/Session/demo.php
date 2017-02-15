<?php
session_start();
// Check session if exist
if (!isset($_SESSION["user"])) {
	echo "Session is not exist. Will create a new one!";
	// Create session
	$_SESSION["user"] = "John Doe";
} else {
	echo "Session existed with valaue = " . $_SESSION['user'];
	echo "<br> This session will be delete";
	session_unset(); // Remove session
	session_destroy(); // Destroy session
}