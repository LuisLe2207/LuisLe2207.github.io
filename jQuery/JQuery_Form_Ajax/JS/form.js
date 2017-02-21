$(document).ready(function() {
	// Create calendar using jQuery UI Datepicker
	$( function() {
    		$("#datepicker").datepicker({
      			changeMonth: true, // Whether the month should be rendered as a dropdown instead of text.
      			changeYear: true, // Whether the year should be rendered as a dropdown instead of text. 
            	yearRange: "1900:2020", // option to control which years are made available for selection.
            	// Whether to display dates in other months (non-selectable) at the start or end of the current month.
      			showOtherMonths: true, 
            	// Whether days in other months shown before or after the current month are selectable. 
      			selectOtherMonths: true 
    		});
    		// Format display date in textbox ass day/month/year format. 
      		$( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
  		});
	// Submit button
	$("#btn-submit").click(function(event) {
		event.preventDefault();
		// Get form input value
		var userName = $("#username").val();
		var passWord = $("#password").val();
		var email = $("#email").val();
		var birthday = $("#datepicker").val();
		// Declare error variable for each input in form
		var userName_error = $("#username-error");
		var passWord_error = $("#password-error");
		var email_error = $("#email-error");
		var error = $(".error");
		
		// Declare flag variable to check if all form input value is valid
		var check = false;
		var username_check = checkUserName(userName, userName_error); // Flag variable check username input value
		var password_check = checkPassword(passWord, passWord_error); // Flag variable check password input value
		var email_check = checkEmail(email, email_error); // Flag variable check email input value
		// If all input value is valid, set check to true
		if ( username_check && password_check && email_check) {
			check = true;
		}
		
		if (check) {
			// Send request using ajax with POST method
			$.ajax({
				type: "POST", 
				url: "Server/server.php",
				data: {username: userName},
				success: function(response) {
					alert(response);
				}
			});
		}
	});

	/*
  		Check username is valid or invalid
  		@param {string} userName
  		@param {string} userNameError
	*/
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
	/*
  		Check password is valid or invalid
  		@param {string} passWord
  		@param {string} passWordError
	*/
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
	/*
  		Check email is valid or invalid
 		@param {string} email
  		@param {string} emailError
	*/
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


