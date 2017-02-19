$(document).ready(function() {
	var current_image = 1;
	// Show first image
	slideShow(current_image);
	// Auto show image, auto change image after 5s
	setInterval(function() {
		slideHide(current_image);
		current_image++;
		if (current_image > 4)  {
			current_image = 1;
		}
		slideShow(current_image);

	}, 5000);

	/**
	  * Show Image 
	  * @param {number} image position 
	*/
	function slideShow(imageth) {
		$("#image" + imageth).show();
		$("#small_image" + imageth).addClass("active");
	}
	/**
	  * Hide Image 
	  * @param {number} image position 
	*/
	function slideHide(imageth) {
		$("#image" + imageth).hide();
		$("#small_image" + imageth).removeClass("active");
	}
	// Click previous arrow
	$("#prev").click(function() {
		// Hide current image
		slideHide(current_image);
		// Move current image position to previous position
		current_image--;
		// Set current position to last posiiton
		if (current_image < 1)  {
			current_image = 4;
		}
		// Show image
		slideShow(current_image);
	});
	// Click next arrow
	$("#next").click(function() {
		slideHide(current_image);
		// Move current image position to next position
		current_image++;
		// Set current position to first posiiton
		if (current_image > 4)  {
			current_image = 1;
		}
		// Show image
		slideShow(current_image);
	});
	
	/** click on small image
	  * @param {number} image position 
	*/
	$.fn.onClick = function(imageth) {
		slideHide(current_image);
		slideShow(imageth);
		current_image = imageth;
	}
});