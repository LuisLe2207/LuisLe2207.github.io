<!DOCTYPE html>
<html>
<head>
	<title>Domain 2</title>
	<script src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// Get Submit button
			var submit = $("#get-session");
			// Create form data
			var formData = new FormData();
			submit.click(function(event) {
				// prevent default action of submit button
				event.preventDefault();
				// Get data from textbox
				var sessionID = $("#sessionID").val();
				// Check if data is empty or not
				if (sessionID == "") {
					// Empty
					alert("Session ID can't be empty!");
				} else {
					// Not empty
					// Append data to formData
					formData.append("sessionID", sessionID);
					$.ajax({
						type: "POST",  //Method
						url: "server.php",
						processData: false,
	  					contentType: false,
						data: formData,
						success: function(response) {
							alert(response); // Show result
						}
					});
				}
			});
		});	
	</script>
</head>
<body>
	<form id="form">
		Session ID: <input type="text" name="ID" id="sessionID" required="true"></input>
		<br><br><input type="submit" name="Get" id="get-session" value="Get Session"></input>
	</form>
</body>
</html>