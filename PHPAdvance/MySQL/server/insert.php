<?php
	require 'config.php';
	// Check server request method is POST or not
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Check if post data is exist or not
		if (isset($_POST["BookTitle"]) && isset($_POST["BookAuthor"])) {
			$bookTitle = $_POST["BookTitle"];
			$bookAuthor= $_POST["BookAuthor"];
			// Error happens
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} else {
				// Everything is ok
				// Query string
				$query = "INSERT INTO book values (null, '".$bookTitle."', '".$bookAuthor."')";
				$result = mysqli_query($conn, $query);
				if ($result) {
					echo "Insert completed!";
				} else {
					echo "Error";
				}
			}			
		}
	}
?>