// JavaScript Document

// Validation patterns
var username_pattern = /^[a-z]{1}[\._0-9a-z]{5,}$/i;
var password_pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/; // Min 8 xters at least 1 Ucase A-Z, 1 Lcase a-z, 1 Number and 1 Special xter
var varchar_pattern = /^[-\.\,\(\)\/\'\w\s\\\\]*$/i;
var number_pattern = /^[0-9\.]*$/;
var mobile_pattern = /^((234)[1-9]{1}[0-9]{9}|(0){1}[1-9]{1}[0-9]{9})$/;
var email_pattern = /^[-_a-z0-9]+(\.[-_a-z0-9]+)*@[-a-z0-9]+(\.[-a-z0-9]+)*(\.[a-z]{2,})$/;

// Number Only Function
function numberOnly(evt) {
	// USAGE: onkeypress="return numberOnly(event)"
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	key = String.fromCharCode(key);
	if (key.length == 0) return;
	var regex = /^[0-9\.\b]$/;
	if(!regex.test(key)) {
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
}
