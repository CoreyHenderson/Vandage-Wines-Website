//////////////////////////////////////////////////////////////
//		JavaScript Form and Input Validation Functions		//		By Corey Henderson
//////////////////////////////////////////////////////////////

// Order form validation.
function validateOrderForm() {
	
	// Checks email isnt empty and makes sure it's a valid email.
	var E = document.forms["orderForm"]["EmailAddress"].value;
	var re = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
	if (E == null || E == "") {
		alert("Email must be filled out");
		return false;
	} else if (!re.test(orderForm.EmailAddress.value)) {
			alert("Invalid email");
			return false;
	}
	// Checks first name isnt empty.
	var F = document.forms["orderForm"]["FName"].value;
	if (F == null || F == "") {
		alert("First name must be filled out");
		return false;
	}
	// Checks last name isnt empty.
	var L = document.forms["orderForm"]["LName"].value;
	if (L == null || L == "") {
		alert("Last name must be filled out");
		return false;
	}
	// Checks address isnt empty.
	var A = document.forms["orderForm"]["Address"].value;
	if (A == null || A == "") {
		alert("Address must be filled out");
		return false;
	}
	// Checks house/unit number isnt empty and makes sure its within a 0-9999 range.
	var UN = document.forms["orderForm"]["houseNumber"].value;
	if (UN == null || UN == "") {
		alert("Street/Unit number must be filled out");
		return false;
	} else if (UN.length > 4) {
		alert("Street/Unit number must be less then 5");
		return false;
	}
	// Checks suburb isnt empty.
	var S = document.forms["orderForm"]["suburb"].value;
	if (S == null || S == "") {
		alert("City/Suburb must be filled out");
		return false;
	}
	// Checks if country has been selected.
	var C = document.forms["orderForm"]["country"].value;
	if (C == "") {
		alert("Your country must be selected");
		return false;
	}
	// Checks if state has been selected.
	var ST = document.forms["orderForm"]["state"].value;
	if (ST == "") {
		alert("Your state/territory must be selected");
		return false;
	}
	// Checks postcode isnt empty and makes sure its either 4 or 5 numbers long (5 numbers for the US).
	var PC = document.forms["orderForm"]["postcode"].value;
	if (PC == null || PC == "") {
		alert("Postcode must be filled out");
		return false;
	} else if (PC.length < 4 || PC.length > 5) {
		alert("Incorrect postcode");
		return false;
	}
	// Checks phone number isnt empty and makes sure its within 8 to 10 numbers long.
	var N = document.forms["orderForm"]["pNumber"].value;
	if (N == "" || N == null) {
		alert("Your phone number must be filled out");
		return false;
	} else if (N.length < 8 || N.length > 10) {
		alert("Your phone number must be within 8-10 numbers long")
		return false;
	}
	
	// Payment Choice.
	var RadioButton = document.getElementById("radio1");
	if (RadioButton.checked == true) {		// Checks if VISA/Mastercard payment is selected instead of paypal or bank transfer.
		
		// Checks Card Name isnt empty.
		var NOC = document.forms["orderForm"]["cardName"].value;
		if (NOC == null || NOC == "") {
			alert("Your name on your card must be filled out");
			return false;
		}
		// Checks Card number isnt empty.
		var CNum = document.forms["orderForm"]["cardNumber"].value;
		if (CNum == null || CNum == "") {
			alert("Your card number must be filled out");
			return false;
		} else if (CNum.length != 16) {
			alert("Your card number is incorrect, please check again")
			return false;
		}
		// Checks expiry date isnt empty and makes sure its 4 numbers long.
		var EXP = document.forms["orderForm"]["expiryDate"].value;
		if (EXP == null || EXP == "") {
			alert("Your expiry date must be filled out");
			return false;
		} else if (EXP.length != 4) {
			alert("Your expiry date must be 4 numbers (The month and the year)");
			return false;
		}
		// Checks CVV entry isnt empty and makes sure its within 3 or 4 numbers long.
		var CVV = document.forms["orderForm"]["CVVCode"].value;
		if (CVV == "" || CVV == null) {
			alert("Your CVV number from the back of your card must be filled out");
			return false;
		} else if (CVV.length > 4 || CVV.length < 3) {
			alert("Your CVV number is incorrect. Please enter the three numbers on the back of your card or the four numbers if the card is from AMEX");
			return false;
		}
	}
	alert("Order Submitted");
	return true;
}

// Contact form validation.
function validateContactForm() {
	// Checks first name isnt empty.
	var F = document.forms["contactForm"]["FirstName"].value;
	if (F == null || F == "") {
		alert("Name must be filled out");
		return false;
	}
	// Checks last name isnt empty.
	var L = document.forms["contactForm"]["LastName"].value;
	if (L == null || L == "") {
		alert("Last name must be filled out");
		return false;
	}
	// Checks phone number
	// Checks phone number isnt empty and makes sure its within 8 to 10 numbers long.
	var P = document.forms["contactForm"]["ContactPhone"].value;
	if (P == "" || P == null) {
		alert("Your phone number must be filled out");
		return false;
	} else if (P.length < 8 || P.length > 10) {
		alert("Your phone number must be within 8-10 numbers long")
		return false;
	}
	// Checks email isnt empty and makes sure it's a valid email.
	var E = document.forms["contactForm"]["EmailAddress"].value;
	var re = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
	if (E == null || E == "") {
		alert("Email must be filled out");
		return false;
	} else if (!re.test(contactForm.EmailAddress.value)) {
		alert("Invalid email");
		return false;
	}
	// Checks the confirmation email isnt empty and makes sure its the same as the first email entered.
	var CE = document.forms["contactForm"]["ConfirmEmail"].value;
	if (CE == null || CE == "") {
		alert("Please confirm your email address.");
		return false;
	} else if (!(CE == E)) {
		alert("Your confirmation email doesn't match your first email");
		return false;
	}
	// Checks the comments section isnt left empty.
	var C = document.forms["contactForm"]["comments"].value;
	if (C == null || C == "") {
		alert("Please tell us you're comment/issue.");
		return false;
	}
	alert("Submitted");
	return true;
}

// 'on press' event validation to allow only numeric input.
// This function was retrieved from: http://stackoverflow.com/questions/469357/html-text-input-allow-only-numeric-input
function validate(evt) {
	theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	key = String.fromCharCode( key );
	var regex = /[0-9]|\+/; // Only allows input from 0-9 and allows '+' input for the phone numbers.
	if( !regex.test(key) ) {
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
}

// 'on press' event validation to allow only letter input.
function alphaOnly(event) {
	var key = event.keyCode;
	return ((key >= 65 && key <= 90) || (key >= 37 && key <= 40) || key == 8 || key == 9 || key == 32);
	// 65 - 90 represents all alpha character inputs, 37 - 40 represents the arrow keys, 8 represents backspace, 9 represents tab and 32 represents space bar.
};