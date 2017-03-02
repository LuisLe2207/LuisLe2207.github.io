<?php
if(!isset($_COOKIE["user"])) {
		echo "Cookie is not exist. Will create a new one!";
		/** 
		  * Set cookie
		  * @param key user
		  * @param value John Doe
		  * @param exprie date 1 hour 
		  * @param path If set to '/', the cookie will be available within the entire domain
		*/
		setcookie("user", "John Doe", time() + 3600, "/"); 
	} else {
		echo "Cookie existed with value: " . $_COOKIE["user"];
		echo "<br>This cookie will be delete";
		// To delete cookie, just set expire date to 0
		setcookie("user", "", time() - 3600, "/");  
	}
?>