$(document).ready(function(){
$(document).on('click', '#signup', function(){
	if ($('#studnum').val() == '') {
		$("#studnum").css({"border": "2px solid red"});
		alert('Fill Up Student Number');
		return false;
	}
	if ($('#email').val() == '') {
		$("#email").css({"border": "2px solid red"});
		alert('Fill Up Email');
		return false;
	}
	if ($('#password').val() == '') {
		$("#password").css({"border": "2px solid red"});
		alert('Put Password');
		return false;
	}
	if ($('#sname').val() == '') {
		$("#sname").css({"border": "2px solid red"});
		alert('Fill Up Blank Forms');
		return false;
	}
	if ($('#fname').val() == '') {
		$("#fname").css({"border": "2px solid red"});
		alert('Fill Up Blank Forms');
		return false;
	}
	if ($('#password').val() != $('#cpassword').val()) {
		alert('Passwords are not match!!');
		return false;
	}
  });
});
