// Get list of big images
var mySlides = document.getElementsByClassName("my_slide");
// Get list of small image
var mySmallImage = document.getElementsByClassName("small_image");
// Set visible for the first big image
mySlides[0].style.display = "block";
// First image index
var index = 1;
// Set loop slide for each image to 5s			
var interval = setInterval(function () {
	Next(+1);
}, 5000);
			
/*
  Move to next big Image
  @param {number} n	
*/
function Next(n) {
	index += n;
	Show(index);
}

/*
  Move to prev big Image
  @param {number} n	
*/
function Prev(n) {
	index += n;
	Show(index);
}

/*
  Show Big Image
  @param {number} n image position 
*/
function Show(n) {
	for (i = 0; i < mySlides.length; i++) {
		// Set all big image to invisible
		mySlides[i].style.display = "none";
		// Set all small image to deactive mode, remove border
		mySmallImage[i].classList.remove("active");
	}
	if (n == 0) {
		// current Image is the first Image, If move to prev image, set current Image index to last image
		index = mySlides.length; 
	} else if (n > mySlides.length) {
		// current Image is the last Image, If move to next image, set current Image index to first image
		index = 1;
	} else {
		// set image index = image position
		index = n;
	}
	// Set current Image to visible
	mySlides[index - 1].style.display = "block";
	// Set current small image to active mode, add border
	mySmallImage[index - 1].classList.add("active");
}
