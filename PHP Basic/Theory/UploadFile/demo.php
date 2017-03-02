<!DOCTYPE HTML>
<html>
	<head>
		<title>Demo Upload File</title>
		<script type="text/javascript">
			var file = document.getElementById("fileToUpload");
		</script>
	</head>
	<body>
		<!--Remember to declare form method and enctype attribute-->
		<form method="POST" action="#" enctype="multipart/form-data">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" name="btnUpload" value="Upload">
		</form>

		<?php
			// Check if server request method is POST
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Check file upload's name is not null
				if (isset($_FILES["fileToUpload"]["name"]) != null) {
					if ($_FILES["fileToUpload"]["size"] > 5242880) {
							echo "File size is not larger than 5mb!";
						} else {
							// valid file
							$path = "Upload/"; // Path of folder where we want upload file to be saved in.
							$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
							$name = $_FILES['fileToUpload']['name'];
                			$type = $_FILES['fileToUpload']['type']; 
                			$size = $_FILES['fileToUpload']['size'];
                			// Upload and move file to declared path above
                			move_uploaded_file($tmp_name,$path.$name);
                			echo "File uploaded! <br />";
                			echo "File name : ".$name."<br />";
                			echo "File type : ".$type."<br />";
                			echo "File size : ".$size;
						}
				} else {
					echo "Please choose file to upload!";
				}
			}
		?>
	</body>
</html>