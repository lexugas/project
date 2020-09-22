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
		<form action="register.php" method="POST">
  		<?php include('errors.php'); ?>

		<div class="jumbotron bord col-6 mx-auto rounded py-1" style="font-family: calibri;">
			<div class="display-4 text-center">Register</div>
			<hr>
			<center><label>Student Number</label></center>
			<input type="number" id="studnum" class="form-control form-control text-center" name="studnum" value="<?php echo $studnum; ?>" placeholder="Student Number"><br>
			<center><label>Person</label></center>
		    <div class="input-group mb-3">
		      <input type="text" id="fname" class="form-control"  placeholder="First Name" name="fname">
		      <input type="text" id="sname" class="form-control"  placeholder="Last Name" name="sname">
		    </div>  
		    <center><label>UserName</label></center>
		    <input type="text" id="username" class="form-control form-control text-center" value="<?php echo $username; ?>" name="username" placeholder="UserName"><br>
			<center><label>Email</label></center>
		    <input type="email" id="email" class="form-control form-control text-center" value="<?php echo $email; ?>" name="email" placeholder="Email"><br>
			<center><label>Password</label></center>
		    <input type="password" id="password" class="form-control" name="password" placeholder="password">
			<center><label>Confirm Password</label></center>
		    <input type="password" id="cpassword" class="form-control" name="cpassword" placeholder="confirm password"><br>
		    <input type="submit" id="signup" value="Sign Up" class="btn btn-success btn-block" name="reg_user">
		    <p>
		  		Already a member? <a href="login.php">Sign in</a>
		  	</p>
		</div>
		</form>
	</div>
</body>
</html>
