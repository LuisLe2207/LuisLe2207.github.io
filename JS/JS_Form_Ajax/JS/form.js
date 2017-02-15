
function validateForm() {
	event.preventDefault();
	// Get form input value
	var userName = document.forms["my-form"]["username"].value;
	var passWord = document.forms["my-form"]["password"].value;
	var email = document.forms["my-form"]["email"].value;
	var birthday = document.forms["my-form"]["birthday"].value;
	// Declare error variable for each input in form
	var userNameError = document.getElementById("username-error");
	var passWordError = document.getElementById("password-error");
	var emailError = document.getElementById("email-error");
	var error = document.getElementsByClassName("error");
	
	// Declare flag variable to check if all form input value is valid
	var check = false;

	var usernameCheck = checkUserName(userName, userNameError); // Flag variable check username input value
	var passwordCheck = checkPassword(passWord, passWordError); // Flag variable check password input value
	var emailCheck = checkEmail(email, emailError); // Flag variable check email input value
	// If all input value is valid, set check to true
	if ( usernameCheck && passwordCheck && emailCheck) {
		check = true;
	}
	
	if (check) {
		submitForm();
	} 
}

// Clear all textbox
function refreshForm() {
	document.getElementById("my-form").reset();
}
// Submit Form
function submitForm() {
    var myForm = document.forms["my-form"];

	//var action = myForm.getAttribute("action"); //Get Form Action URL
	//var method = myForm.getAttribute("method"); //Get Form Submit Method (Post/Get)

	//Submitting Form Using Ajax

	var data = new FormData(myForm);
	//Send request to server
	var http = new XMLHttpRequest();
	//http.open("POST","Server/server.php",true);
	//http.open(method, action, true);
	//http.withCredentials = true;
	http.onreadystatechange = function() {
		if (http.status == 200 & http.readyState  == 4) {
			alert(http.responseText);
		}
	};
	//http.open(method, action, true);
	http.open("POST","http://formajax.esy.es/server.php",true);
	http.send(data); 

}
/*
  Check username is valid or invalid
  @param {string} userName
  @param {string} userNameError
*/
function checkUserName(userName, userNameError) {
	if (userName == "") {
		userNameError.innerHTML = "Please type your username!"
		return false;
	} else if (userName.length < 8) {
		userNameError.innerHTML  = "Username min length 8 letters"
		return false;
	} else {
		userNameError.innerHTML = "";
		return true;
	}
}
/*
  Check password is valid or invalid
  @param {string} passWord
  @param {string} passWordError
*/
function checkPassword(passWord, passWordError) {
	if (passWord == "") {
		passWordError.innerHTML = "Please type your password!"
		return false;
	} else if (passWord.length < 8) {
		passWordError.innerHTML  = "Password min length 8 letters"
		return false;
	} else {
		passWordError.innerHTML = "";
		return true;
	}
}
/*
  Check email is valid or invalid
  @param {string} email
  @param {string} emailError
*/
function checkEmail(email, emailError) {
	// Email regular expression
	var re = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if (email == "") {
		emailError.innerHTML = "Please type your email!"
		return false;
	} else if (!re.test(email)) {
		emailError.innerHTML  = "Email wrong format!"
		return false;
	} else {
		emailError.innerHTML = "";
		return true;
	}
}