<?php
	require 'config.php';
	// Check server request method is POST or not
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Error happens
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} else {
			// Everything is ok
			// Query string
			$query = "SELECT * FROM book";									
			$result = mysqli_query($conn, $query);
			// Create an array to store query result
			$arr = array();
			while ($row = mysqli_fetch_array($result)) {
				// Add to arr 
				$arr[] = $row;
			}
			// Decode arr of result to json format
			echo json_encode($arr);
		}	
	}