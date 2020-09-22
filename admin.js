$(document).ready(function(){
$(document).on('click', '#regad', function(){
	if ($('#fname').val() == '') {
		$("#fname").css({"border": "2px solid red"});
		alert('Fill Up Blank Forms');
		return false;
	}
	if ($('#sname').val() == '') {
		$("#sname").css({"border": "2px solid red"});
		alert('Fill Up Blank Forms');
		return false;
	}
	if ($('#username').val() == '') {
		$("#username").css({"border": "2px solid red"});
		alert('Fill Up Blank Forms');
		return false;
	}
	if ($('#email').val() == '') {
		$("#email").css({"border": "2px solid red"});
		alert('Fill Up Email');
		return false;
	}
	
  });
});