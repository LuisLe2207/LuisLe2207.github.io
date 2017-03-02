<?php
	require 'config.php';
	// Check server request method is POST or not
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Check if post data is exist or not
		if (isset($_POST["BookID"]) && isset($_POST["BookTitle"]) && isset($_POST["BookAuthor"])) {
			$bookID = $_POST["BookID"];
			$bookTitle = $_POST["BookTitle"];
			$bookAuthor= $_POST["BookAuthor"];
			// Error happens
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} else {
				// Everything is ok
				// Query string
				$query = "UPDATE book SET 
				book_title = '".$bookTitle."',
				book_author = '".$bookAuthor."'
				WHERE book_id = '".$bookID."'";
				$result = mysqli_query($conn, $query);
				if ($result) {
					echo "Update Successfully!";
				} else {
					echo "Error";
				}
			}			
		}
	}
?>