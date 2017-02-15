$(document).ready(function() {
	$( function() {
    		$("#datepicker").datepicker({
      			changeMonth: true,
      			changeYear: true,
      			showOtherMonths: true,
      			selectOtherMonths: true
    		});
      		$( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
  		});
	// Submit button
	$("#btnSubmit").click(function(event) {
		var userName = $("#username").val();
		var passWord = $("#password").val();
		var email = $("#email").val();
		var birthday = $("#datepicker").val();
		
		var userName_error = $("#username_error");
		var passWord_error = $("#password_error");
		var email_error = $("#email_error");
		var error = $(".error");
		
		
		var check = false;
		var username_check = checkUserName(userName, userName_error);
		var password_check = checkPassword(passWord, passWord_error);
		var email_check = checkEmail(email, email_error);
		
		if ( username_check && password_check && email_check) {
			check = true;
		}
		event.preventDefault();
		
		if (!check) {
			//event.preventDefault();
		} else {
			$.ajax({
				type: "POST",
				url: "Server/server.php",
				data: {username: userName},
				success: function(response) {
					alert(response);
				}
			});
			console.log(userName);
		}
	});

	$("#btnRefresh").click(function() {
		$("#myForm").reset();
	});

	function checkUserName(userName, userName_error) {
		if (userName == "") {
			userName_error.html("Please type your username!");
			return false;
		} else if (userName.length < 8) {
			userName_error.html("Username min length 8 letters");
			return false;
		} else {
			userName_error.html("");
			return true;
		}
	}
	function checkPassword(passWord, passWord_error) {
		if (passWord == "") {
			passWord_error.html("Please type your password!");
			return false;
		} else if (passWord.length < 8) {
			passWord_error.html("Password min length 8 letters"); 
			return false;
		} else {
			passWord_error.html("");
			return true;
		}
	}

	function checkEmail(email, email_error) {
		// Email regular expression
		var re = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if (email == "") {
			email_error.html("Please type your email!");
			return false;
		} else if (!re.test(email)) {
			email_error.html("Email wrong format!");
			return false;
		} else {
			email_error.html("");
			return true;
		}
	}
});


