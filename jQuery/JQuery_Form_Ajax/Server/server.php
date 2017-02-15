
<?php
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		//	mysqli("servername", "username", "password", "dbname"); 
		$conn = new mysqli("localhost", "root", "", "form_ajax");
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
	} else {
		echo "Falied!";
	}
?>