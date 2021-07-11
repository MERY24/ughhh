var mat = document.forms['form1']['loginid'];
var password = document.forms['form1']['pass'];

var email_error = document.getElementById('email_error');
var pass_error = document.getElementById('pass_error');

mat.addEventListener('textInput', email_Verify);
password.addEventListener('textInput', pass_Verify);

function validated(){
	if (mat.value.length < 1) {
		mat.style.border = "1px solid red";
		email_error.style.display = "block";
		mat.focus();
		return false;
	}
	if (password.value.length < 1) {
		password.style.border = "1px solid red";
		pass_error.style.display = "block";
		password.focus();
		return false;
	}

}
function email_Verify(){
	if (mat.value.length >= 0) {
		mat.style.border = "1px solid silver";
		email_error.style.display = "none";
		return true;

	}
}
function pass_Verify(){
	if (password.value.length >= 0) {
		password.style.border = "1px solid silver";
		pass_error.style.display = "none";
		return true;
	}
}