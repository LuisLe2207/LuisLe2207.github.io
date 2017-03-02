<?php
require_once("SysSession.php");
session_start();
if (isset($_POST["sessionID"])) {
	if (empty($_POST["sessionID"])) {
		echo "Session ID can't be empty";
	} else {
		$sessionID = $_POST["sessionID"];
		if (isset($_SESSION[$sessionID]) == null) {
			echo "Session ID is not exist!";
			return;
		} else {
			$sessionData = $_SESSION[$sessionID];
			echo $sessionData;
		}
	}
} else {
	echo "Falied!";
}