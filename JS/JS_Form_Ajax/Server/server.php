<?php header("Access-Control-Allow-Origin: *"); ?>
<?php
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$conn = new mysqli("mysql.hostinger.vn", "u257267306_test", "gmorunsystemphp", "u257267306_test");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} else {
			$selectQuery = sprintf("SELECT username FROM accounts WHERE username = '%s' ", mysqli_real_escape_string($conn, $username));
			$result = $conn->query($selectQuery);

			if ($result->num_rows > 0) {
				echo "Failed! Username exist!";
			} else {
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