$(document).ready(function() {
	// Change mouse cursor to pointer when hover inside table
	$('table').children('tbody').css('cursor', 'pointer');
	// Add click listener to each table row
	$('table').children('tbody').on('click', 'tr', function() {
		// Get book id from table row and set it to book id text box
		$("#txt-book-id").val(($(this).children('td').eq(0).html()));
		// Get book title from table row and set it to book title text box
		$("#txt-book-title").val(($(this).children('td').eq(1).html()));
		// Get book author from table row and set it to book author text box
		$("#txt-book-author").val(($(this).children('td').eq(2).html()));
	});
	// Add click listener to delete button, and delete record when click
	$('table tbody').on('click', '.btn-delete', function() {
		// Get book id
		var book_id = $(this).attr('id').substring(5, ($(this).attr('id')).length);
		// Send reuqest 
		$.ajax({
			type: "POST",
			url: baseUrl + "/delete",
			data: {book_id: book_id},
			success: function(response) {
				// If susscess
				if (JSON.parse(response).result == '1') {
					alert("Delete successfully!");
					// Reload page
					window.location.href = JSON.parse(response).url;
				} else {
					alert("Delete failed!");
				}
			}
		});
	});
	// Add click listener to insert button, and insert record when click
 	$('#btn-insert').click(function(event) {
 		// Prevent button default action 
 		event.preventDefault();
 		// Set input book id value to ''. Db using auto increment. 
 		$("#txt-book-id").val('');
 		// Get data from form
		var data = $("#book-form").serializeArray();
		// Send request
		$.ajax({
			type: "POST",
			url: baseUrl + "/insert",
			data: data,
			success: function(response) {
				// If succcess
				if (JSON.parse(response).result == '1') {
					alert("Insert successfully!");
					// Reload page
					window.location.href = JSON.parse(response).url;
				} else {
					alert("Insert failed!");
				}
			}
		});
 	});
 	// Add click listener to update button, and update record when click
 	$('#btn-update').click(function(event) {
 		// Prevent button default action 
 		event.preventDefault();
 		// Get data from form
 		var data = $("#book-form").serializeArray();
 		// Send request
		$.ajax({
			type: "POST",
			url: baseUrl + "/update",
			data: data,
			success: function(response) {
				// If succcess
				if (JSON.parse(response).result == '1') {
					alert("Update successfully!");
					// Reload page
					window.location.href = JSON.parse(response).url;
				} else {
					alert("Update failed!");
				}
			}
		});
 	})
});

