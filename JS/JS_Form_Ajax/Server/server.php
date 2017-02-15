<?php header("Access-Control-Allow-Origin: *"); ?>
<?php
	$username = $_POST['username'];
	
	//	mysqli("servername", "username", "password", "dbname"); 
	$conn = new mysqli("mysql.hostinger.vn", "u257267306_test", "gmorunsystemphp", "u257267306_test");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		 
		$get_acc_sql = "SELECT username FROM accounts WHERE username = '$username'";
		$result = $conn->query($get_acc_sql);

		if ($result->num_rows > 0) {
			echo "Failed! Username exist!";
		} else {
			$sql = "INSERT INTO accounts (username) VALUES ('$username')";
			if ($conn->query($sql) === TRUE) {
				echo "Complete";
			} else {
			echo "Failed!";
			}
			$conn->close();
		}
	}	
?>