$(document).ready(function() {
var current_image = 1;

slideShow(current_image);

setInterval(function() {
	slideHide(current_image);
	current_image++;
	if (current_image > 4)  {
		current_image = 1;
	}
	slideShow(current_image);

}, 5000);

function slideShow(imageth) {
	$("#Image" + imageth).show();
}
function slideHide(imageth) {
	$("#Image" + imageth).hide();
}

$("#prev").click(function() {
		slideHide(current_image);
		current_image--;
		if (current_image < 1)  {
			current_image = 4;
		}
		slideShow(current_image);
	});

$("#next").click(function() {
		slideHide(current_image);
		current_image++;
		if (current_image > 4)  {
			current_image = 1;
		}
		slideShow(current_image);
	});

$.fn.onClick = function(id) {
		slideHide(current_image);
		slideShow(id);
		current_image = id;
	}
});