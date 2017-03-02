<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table, th, td {
			border: 1px solid black;
    		border-collapse: collapse;
    		padding: 10px;
    		text-align: center;
    		cursor: pointer;
		}
		input {
			margin-right: 20px;
		}
		.action {
			margin: 20px 0px;
		}
		.content {
			width: 1000px;
			margin: 0 auto;
			text-align: center;
		}
		.data {
			margin: 0 auto;
		}
	</style>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// Load Data from Database
			function LoadData() {
				$.ajax({
					type: "POST",
					url: "server/select.php",
					dataType: 'json',
					success: function(response) {
						// Clear table with class = 'data'
						$(".data").empty();
						// Change data from JSON type to Javascript value
						var result = JSON.parse(JSON.stringify(response));
						// Draw header of the table
						$(".data").append(
							  "<tr>"
							+ "<th>Book ID</th>"
							+ "<th>Book Title</th>"
							+ "<th>Book Author</th>"
							+ "<th>Action</th>"
							);
						// Loop data recieve from response
						$.each(result, function(key, book) {
							// Write data as row
							$(".data").append(
								  "<tr class='book_" + book.book_id + "'>"
								+ "<td>" + book.book_id + "</td>"
								+ "<td>" + book.book_title + "</td>"
								+ "<td>" + book.book_author + "</td>"
								+ "<td><a id='book-" + book.book_id + "' href='#'>Delete</a></td>"
								);
							// Add click listener for each row of data
							$('.book_' + book.book_id).bind('click', function() {
	  								$("#txtBookID").val(book.book_id);
	  								$("#txtBookName").val(book.book_title);
	  								$("#txtBookAuthor").val(book.book_author);
							});
							// Add click listener for Delete Action
							$("#book-" + book.book_id).click(function() {
								// Create new form data
								var formData = new FormData();
								// Add param to form data
								formData.append("BookID", book.book_id);
								// Send request to server without reload page
								$.ajax({
									type: "POST", // Method
									url: "server/delete.php", // action
									data: formData,
									contentType: false,
									processData: false,
									success: function(response) {
										// Alert result
										alert(response);
										// Load data again to refresh table
										LoadData();
									}
								});
							});
						});
					}					
				});
			}
			// Insert Data
			$("#btnInsert").click(function(event) {
				// prevent default action of this event
				event.preventDefault();
				// Get value from textbox
				var bookTitle = $("#txtBookName").val();
				var bookAuthor = $("#txtBookAuthor").val();
				if (bookTitle == "" & bookAuthor == "") {
					alert("Book Title or Book Author can't be empty")
				} else {
					// Create new form data
					var formData = new FormData();
					// Add param to form data
					formData.append("BookTitle", bookTitle);
					formData.append("BookAuthor", bookAuthor);
					// Send request to server without reload page
					$.ajax({
						type: "POST",
						url: 'server/insert.php',
						data: formData,
						contentType: false,
						processData: false,
						success: function(response) {
							// Alert result
							alert(response);
							// Load data again to refresh table
							LoadData();
							$("#my-form")[0].reset();
						}
					});
				}
			});
			// Update data
			$("#btnUpdate").click(function(event) {
				// prevent default action of this event
				event.preventDefault();
				// Get value from textbox
				var bookID = $("#txtBookID").val();
				var bookTitle = $("#txtBookName").val();
				var bookAuthor = $("#txtBookAuthor").val();
				if (bookTitle == "" & bookAuthor == "") {
					alert("Book Title or Book Author can't be empty")
				} else {
					// Create new form data
					var formData = new FormData();
					// Add param to form data
					formData.append("BookID", bookID);
					formData.append("BookTitle", bookTitle);
					formData.append("BookAuthor", bookAuthor);
					// Send request to server without reload page
					$.ajax({
						type: "POST",
						url: 'server/update.php',
						data: formData,
						contentType: false,
						processData: false,
						success: function(response) {
							// Alert result
							alert(response);
							// Load data again to refresh table
							LoadData();
							$("#my-form")[0].reset();
						}
					});
				}
			});
			// Load data at frist 
			LoadData();
		});		
	</script>
</head>
<body>
<div class="content">
	<form id="my-form">
		ID: <input type="text" name="Book_ID" id="txtBookID" disabled="true">
		Book Name: <input type="text" name="BookName" id="txtBookName">
		Book Author: <input type="text" name="BookAuthor" id="txtBookAuthor">
		<div class="action">
			<input type="button" name="Insert" class="btn" id="btnInsert" value="Insert">
			<input type="button" name="Update" class="btn" id="btnUpdate" value="Update">
		</div>
		
	</form>
	<table class="data"></table> 
</div>
</body>
</html>