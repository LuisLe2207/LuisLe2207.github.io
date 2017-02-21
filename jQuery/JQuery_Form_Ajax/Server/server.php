<?php header("Access-Control-Allow-Origin: *"); ?>
<?php
if (isset($_POST['username'])) {
		$username = $_POST['username'];
		// create connection
		$conn = new mysqli("mysql.hostinger.vn", "u257267306_test", "gmorunsystemphp", "u257267306_test");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} else {
			// Validate param. Prevent from sql injection
			// Check username if existe
			$selectQuery = sprintf("SELECT username FROM accounts WHERE username = '%s' ", mysqli_real_escape_string($conn, $username));
			$result = $conn->query($selectQuery);
			// If exist
			if ($result->num_rows > 0) {
				echo "Failed! Username exist!";
			} else {
				// Validate param. Prevent from sql injection
				// Insert into database if not exist
				$insertQuery = sprintf("INSERT INTO accounts (username) VALUES ('%s')", mysqli_real_escape_string($conn, $username));
				if ($conn->query($insertQuery)) {
					echo "Complete";
				} else {
				echo "Failed!";
				}
				$conn->close();
			}
		}
	}
?>