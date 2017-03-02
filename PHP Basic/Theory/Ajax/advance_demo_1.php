<?php
	// Check request data
	if (isset($_REQUEST['data'])) {
		$arr_json = $_REQUEST['data'];
		// Convert request data to back to it's original data type
		$arr = json_decode($arr_json);
		// Check if data type is array
		if (is_array($arr)) {
			echo "Tổng = " . array_sum($arr); 
			echo " Tích = " . array_product($arr);
			// Use this to print only value we want and prevent success function in ajax from printing the whole page
			exit;
		} 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Advance Ajax Demo</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function() {
			// Declare arr and convert it to string
			var arr = JSON.stringify([1, 2, 3, 4, 5]);
			$("#Array").append(arr);
			// Send request to server
			$.ajax({
				type: "POST", // Method
				data: {data: arr}, // Data
				success: function(response) {
					// Show response data 
					$("#Result").append(response);
				}
			});
		});
	</script>
</head>
<body>
	<span id="Array">Giá trị các phần tử trong mảng: </span><br>
	<span id="Result"></span>
</body>
</html>