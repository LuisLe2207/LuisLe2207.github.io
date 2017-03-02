
<?php
	require 'config.php';
	// Check server request method is POST or not
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Check if post data is exist or not
		if (isset($_REQUEST["BookID"])) {
				$bookID = $_REQUEST["BookID"];
				// Error happens
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} else {
					// Everything is ok
					// Query string
					$query = "DELETE FROM book WHERE book_id = '".$bookID."'";
					$result = mysqli_query($conn, $query);
					if ($result) {
						echo "Delete Successfully!";
					} else {
						echo "Error!";
					}
				}			
			}
	}