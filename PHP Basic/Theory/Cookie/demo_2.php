<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		// Cookie 
		function myCookie() {
			// Get cookie;
			var user = getCookie("user");
			// If not exist
			if (user == "") {
			alert("Cookie is not exist. Will create a new one!");
			// Create cookie
			document.cookie = "user=John Doe; expires=Wed, 30 June 2017 12:30:00 UTC; path=/";
			} else {
				alert("Cookie existed with value: " + getCookie("user"));
				alert("This cookie will be delete!");
				// Delete cookie
				document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
			}
		}
		/**
		  * Return cookie value we want to get
		  * @param {string} cname
		  * @return {string} cookie name 
		*/
		function getCookie(cname) {
		    var name = cname + "=";
		    var decodedCookie = decodeURIComponent(document.cookie);
		    var ca = decodedCookie.split(';');
		    for(var i = 0; i <ca.length; i++) {
		        var c = ca[i];
		        while (c.charAt(0) == ' ') {
		            c = c.substring(1);
		        }
		        if (c.indexOf(name) == 0) {
		            return c.substring(name.length, c.length);
		        }
		    }
		    return "";
		}
	</script>
</head>
<body onload="myCookie()">

</body>
</html>