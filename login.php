	<?php include ('register-server.php');
	// if($_SESSION['loggedIn'] == true){
	// 	// $style_logout = "style='display:none;'";
	// 	// $style_login = "style='display:none;'";
	// 	echo "<script>
 //      window.location.href='profile.php'
 //      </script>";
 //      echo "string";
	// }
	if(isset($_SESSION['loggedIn'])){
	if($_SESSION['loggedIn'] == true){
			echo "<script>
   window.location.href='profile.php'
     </script>";
	}
}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<style type="text/css">
		.bord {border:1px solid black;}
	</style>
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->
	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
 		<a class="navbar-brand" href="index.php"><img src="cpeplogo.png"></a>
	</nav> <br>
	<div class="container"><br><br>
		<div class="col-5 mx-auto rounded" style="background-color: #F4F4F4">
		<br><h4 class="text-center font-weight-bold">Log Into your Account</h4><br>
           <div class="container">
           	<form method="POST" action="login.php">
				<?php include ('errors.php');?>
		    <div class="input-group mb-3 input-group-sm">
		      <div class="input-group-prepend">
		        <span class="input-group-text"><img src="user.png"></span>
		      </div>
		      <input type="text" class="form-control" name="username" placeholder="Username">
		    </div>
		    
			<br>
						
		    <div class="input-group mb-3 input-group-sm">
		      <div class="input-group-prepend">
		        <span class="input-group-text"> &nbsp; <img src="pass.png"> &nbsp;</span>
		      </div>
		      <input type="password" name="password" class="form-control"  placeholder = "Password">
		    </div>
			
			<button type="submit" name="loginbtn" class="btn btn-info m-auto p-auto" style="border-radius: 50px">LOGIN</button>
			</form><br>	
				<p>
			  		Not yet a member? <a href="register.php">Sign up</a>
			  	</p>											           	
	      </div>
		</div>
	</div>
</body>
</html>
