<?php
require_once("SysSession.php");
session_start();
// Check if session exist or not
if (isset($_SESSION['demo']) == null) {
	// If not exist
	echo "<p>Session is not exist. Will create a new one!</p>";
	// Create session
	$_SESSION['demo'] = "Hello";
} else {
	// If exist
	echo "Session exist!";
	echo "<p>Session value: " . $_SESSION['demo'] . "</p>";
}