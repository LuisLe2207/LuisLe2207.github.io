// When page first load, set calandar to invisible
document.getElementById("calendar-panel").style.display = "none";
// Set month select cell colspan
document.getElementById("my-th").colSpan = 2;

function showCalendar() {
	document.getElementById("calendar-panel").style.display = "block";
}

function hideCalendar() {
	document.getElementById("calendar-panel").style.display = "none";
}

// These are day's lable arranged asc
var cal_days_lable = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
// These are month's lable arranged asc
var cal_months_lable = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
// These are days in month
var cal_days_in_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

// Global variable
var cal_panel = document.getElementById("calendar-panel");
var cal_input = document.getElementById("txt-calendar");
var months = document.getElementById("month");
var years = document.getElementById("year");
var cal_current_date = new Date();	
var selected_month = cal_current_date.getMonth();
var selected_year = cal_current_date.getFullYear();

// Declare variable to store table
var cal_table = document.getElementById("calendar");

// Create calendar
function init() {
	drawDayLable();
	setMonths();
	setYears();
	drawCalendar();
}

init();
// draw day lable such as Mon, Tue, Wed, ...
function drawDayLable() {
	for (var i = 0; i < 1; i++) {
		var tr = cal_table.insertRow();
		for (var j = 0; j < 7; j ++) {
			var td = tr.insertCell();
			td.appendChild(document.createTextNode(cal_days_lable[j]));
			td.id = "day-lable";
		}
	}
	cal_panel.appendChild(cal_table);
}

// Clear calendar to draw it again
function clearCalendar() {
	for (var i = cal_table.rows.length - 1; i > 0; i --) {
		cal_table.deleteRow(i);
	}
}
// Set months list for select tag
function setMonths() {
	for (var i = 0; i < cal_months_lable.length; i++) {
		months.options.add(new Option(cal_months_lable[i], i));
	}
	months.value = selected_month;
}
// Set years list for select tag
function setYears() {
	for (var i = 1900; i < 2026; i++) {
		years.options.add(new Option(i, i));
	}
	years.value = selected_year;
}
// draw calendar by month selected
function getMonth() {
	selected_month = months.options[months.selectedIndex].value;
	clearCalendar();
	drawDayLable();
	drawCalendar(selected_month, selected_year);
}
// draw calendar by year selected
function getYear() {
	selected_year = years.options[years.selectedIndex].value;
	clearCalendar();
	drawDayLable();
	drawCalendar(selected_month, selected_year);
}
// Move to next month
function nextM() {
	curr_month = months.options[months.selectedIndex].value;
	selected_month = parseInt(curr_month);
	selected_month++;
	if (selected_month == 12) {
		selected_month = 0;
		selected_year +=1;
	}
	setMonths();
	setYears();
	console.log(months.value + "/" + years.value);
	clearCalendar();
	drawDayLable();
	drawCalendar(selected_month, selected_year);
}
// move to previous month
function prevM() {
	curr_month = months.options[months.selectedIndex].value;
	selected_month = parseInt(curr_month);
	selected_month--;
	if (selected_month < 0) {
		selected_month = 11;
		selected_year -=1;
	}
	setMonths();
	setYears();
	console.log(months.value + "/" + years.value);
	clearCalendar();
	drawDayLable();
	drawCalendar(selected_month, selected_year);
}
// move to next year
function nextY() {
	curr_year = years.options[years.selectedIndex].value;
	selected_year = parseInt(curr_year);
	selected_year++;
	if (selected_year == 2025) {
		selected_year = cal_current_date.getFullYear();
	}
	setMonths();
	setYears();
	console.log(months.value + "/" + years.value);
	clearCalendar();
	drawDayLable();
	drawCalendar(selected_month, selected_year);
}// move to previous year
function prevY() {
	curr_year = years.options[years.selectedIndex].value;
	selected_year = parseInt(curr_year);
	selected_year--;
	if (selected_year < 1900) {
		selected_year = cal_current_date.getFullYear();
	}
	setMonths();
	setYears();
	console.log(months.value + "/" + years.value);
	clearCalendar();
	drawDayLable();
	drawCalendar(selected_month, selected_year);
}
/* 
 Set select day when click and set it to textbox
 @param {number} day
 @param {number} month
 @param {numeber} year
*/
function getSelectedDate(day, month, year) {
	var selected_date = day + "/" + (parseInt(month) + 1) + "/" + year;
	
	cal_input.value = selected_date;
	hideCalendar();
}

function drawCalendar(month, year) {
	this.month = (isNaN(month) || month == null) ? cal_current_date.getMonth() : month;
	this.year  = (isNaN(year) || year == null) ? cal_current_date.getFullYear() : year;
	
	var prevMonth = this.month - 1;
	var nextMonth = this.month + 1;
	
	// Find today date
	var firstDay = new Date(this.year, this.month, 1);
	var startingDay = firstDay.getDay();
	var monthLength = cal_days_in_month[this.month];
	
	// Check leap year 
	if (this.month == 1) { // February only!
		if ((this.year % 4 == 0 && this.year % 100 != 0) || this.year % 400 == 0){
			monthLength = 29;
		}
	}
	// set prev month back to last month 
	if (prevMonth < 0) {
		prevMonth = 11;
	}
	// set next month to first month
	if (nextMonth == 12) {
		nextMonth = 0;
	}
	
	var prevMonthLength = cal_days_in_month[prevMonth];
	var day = 1;
	var count = 1; // flag variable to check end of month 
	var tmpStaringDay = startingDay;
	var inMonth = true; // flag variable to check is in month
	// this loop is for is weeks (rows)
	for (var i = 0; i < 6; i++) {
		// this loop is for weekdays (cells)
		var tr = cal_table.insertRow();
		for (var j = 0; j <= 6; j++) { 
			var td = tr.insertCell();
			if (j < startingDay && i == 0) {
				var prevDay = prevMonthLength - tmpStaringDay + 1
				td.appendChild(document.createTextNode(prevDay));
				td.style.background = "grey";
				td.setAttribute("onClick", "getSelectedDate("+prevDay+", "+(this.month-1)+", "+this.year+")");
				tmpStaringDay--;
			}
			if (i > 0 || j >= startingDay) {
				// set in days in month background color
				td.appendChild(document.createTextNode(day));
				td.setAttribute("onClick", "getSelectedDate("+day+", "+this.month+", "+this.year+")");
				td.className = "day";
				td.style.background = "green";
				day++;
				count++;
				// set today background color
				if ((day === cal_current_date.getDate() + 1) && this.month === cal_current_date.getMonth() && this.year === cal_current_date.getFullYear()) {
					td.style.background = "yellow";
				}
				// If day draw to last day of month, set day back to 1 
				if (day > monthLength) {
					day = 1;
					this.month += 1;
				}
				// 	check if end month, set boolean inMonth = false		
				if (count > monthLength+ 1) {
					inMonth = false;
				}
				/* If current month is larger than December, 
				   set it back to January, also move current year
				   to next year
				*/ 
				if (this.month > 11) {
					this.month = 0;
					this.year += 1;
				}
			}
			//change dates background color if not in current month
			if (!inMonth) {
					td.style.background = "grey";
			}		
		}	
	}	
}




