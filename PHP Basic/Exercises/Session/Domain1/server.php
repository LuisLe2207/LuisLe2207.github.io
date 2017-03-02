<?php
require_once("SysSession.php");
session_start();
// Check sessionID and sessionData is exist or not
if (isset($_POST["sessionID"]) && isset($_POST["sessionData"])) {
	// Declare sessionID & sessionData
	$sessionID = $_POST["sessionID"];
	$sessionData = $_POST["sessionData"];
	// Create session with $sessionID & $sessionData
	$_SESSION[$sessionID] = $sessionData;
	echo "Completed!";
} else {
	echo "Falied!";
}