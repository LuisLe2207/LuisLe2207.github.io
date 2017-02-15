<!DOCTYPE html>
<html>
<head>
	<title>Demo Basic Ajax</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		// When document is ready
		$(document).ready(function() {
			// Get button using ajax
			$("button").click(function() {
				// Show alert when click the button
				alert("Demo Basic Ajax");
			});
		});
	</script>
</head>
<body>
<button>Click me</button>
</body>
</html>