<?php
	// Check if server request method is POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Check file upload's name is not null
		if (isset($_FILES["fileToUpload"]["name"]) != null) {
			// valid file
			$path = "Upload/"; // Save path
			$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
			$name = $_FILES['fileToUpload']['name'];
			$fileSize = $_FILES['fileToUpload']['size'];
	        // Upload and move file to save folder
	        move_uploaded_file($tmp_name,$path.$name);
	        $filePath = $path.$name;
	        // Open file and set mode to read only
	        $myfile = fopen($filePath, "r") or die("Unable to open file!");
	        // Read file
			echo fread($myfile, filesize($path.$name));
			// Close file
			fclose($myfile);
			exit;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo Upload file with Progress bar</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var uploadFiles = $("#File")[0]; // Get list file data from upload window
			var file;
			var formData;
  			$("#Upload").click(function(e) {
  				e.preventDefault(); // prevent default action of the button
  				// Check is there any file in list file upload
  				if (uploadFiles.files.length > 0) {
					file = uploadFiles.files; // Get all file data
					formData = new FormData(); // Create new form data to append file
					// // Check file type
					if (file[0].type != "text/plain") {
						alert("File type is invalid. File type must be text file!");
						return;
					} 
					// Check file size
					if (file[0].size > 5242880) {
						alert("File size must not larger than 5mb!");
						return;
					} else {
						/*
							append file to formData
							Note: because we upload only one file, so we use file[0] to get the first file in list
						*/
						formData.append("fileToUpload", file[0]);
						$.ajax({
		  					type: "POST", // Method
		  					data: formData,
		  					// prevent send default data as objects, read more from: http://api.jquery.com/jquery.ajax/
		  					processData: false,
		  					// make jQuery not send any content type header,  read more from: http://api.jquery.com/jquery.ajax/
		  					contentType: false,
		  					success: function(response) {
		  						alert(response);
		  					},
		  					error: function(response) {
		  						//alert(response);
		  					},
		  					// Get upload progress
		  					xhr: function() {
		    					var xhr = new window.XMLHttpRequest();
		    					xhr.upload.addEventListener("progress", function(evt) {
		      					if (evt.lengthComputable) {
		        					var percentComplete = evt.loaded / evt.total;
							        percentComplete = parseInt(percentComplete * 100, 10);
							        console.log(percentComplete);
							        $('#progressBar').attr('value',percentComplete);
							   
		      					}
		    					}, false);
		    					return xhr;
		  					}
		  				});
					}			
				}
  			});
		});
	</script>
</head>
<body>
	<form method="POST" action="" encytpe="multipart/form-data">
		<input type="file" name="File" id="File" multiple">
		<input type="submit" name="Upload" id="Upload" value="Upload"></input>
	</form>
	<progress id="progressBar" value="0" max="100"></progress>
</body>
</html>