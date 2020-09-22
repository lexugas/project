<?php include('register-server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		.bord {border:1px solid black;}
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
		  -webkit-appearance: none; 
		  margin: 0; 
		}
	</style>
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->
	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="register.js"></script>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
 		<a class="navbar-brand" href="index.php"><img src="cpeplogo.png"></a>
	</nav> <br>
	<div class="container">
		<form action="change.php" method="POST">
  		<?php include('errors.php'); ?>

		<div class="jumbotron bord col-6 mx-auto rounded py-1" style="font-family: calibri;">
			<div class="display-4 text-center">Change your Password</div>
			<hr>
			<center><label>Current Password</label></center>
			<input type="password" class="form-control form-control " name="studnum" placeholder="Current Password"><br>
			
			<center><label>New Password</label></center>
		    <input type="password" id="password" class="form-control" name="password" placeholder="password">
			<center><label>Confirm Password</label></center>
		    <input type="password" id="cpassword" class="form-control" name="cpassword" placeholder="confirm password"><br>
		    <input type="submit" id="signup" value="Change Password" class="btn btn-success btn-block" name="changepass">
		    
<br>
		</div>
		</form>
	</div>
</body>
</html>