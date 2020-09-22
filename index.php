<?php 
	include ('register-server.php');
	require_once 'process.php';
	if(isset($_SESSION['loggedIn'])){

		if($_SESSION['loggedIn'] == true){
			$style1 = '';	
			$style2 = 'display:none';	
		}elseif($_SESSION['loggedIn'] == false){
			$style1 = 'display:none';	
			$style2 = '';	

		}
		if($_SESSION['type'] == 'admin1'){
			$style5;
		} elseif($_SESSION['type'] == 'admin2'){
			$style4 = 'display:none';
		}else{
			$style3 = 'display:none';
			$style4 = 'display:none';
		}
	
}else{
	$style1 = 'display:none';	
	$style2 = '';	
	$style3 = 'display:none';
	$style4 = 'display:none';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CPEP</title>
	<style type="text/css">
		.bord {border:1px solid black;}
	</style>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
 		<a class="navbar-brand" href="index.php"><img src="cpeplogo.png"></a>
 		<form class="form-inline my-2 my-lg-0">
	      <div class="btn-group" role="group" aria-label="Basic example" style="<?php echo $style2; ?>">
			  <button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#myModal1" style="border-right: 1.1px solid white">LOGIN</button>
			  <a href="register.php" class="btn btn-dark" role="button" style="border-left: 1.1px solid white; color: white;">SIGNUP</a>
			</div>
			  <a href="logout.php" class="btn btn-dark" role="button" style="<?php echo $style1; ?>">Log Out</a>

    	</form>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>  
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="../project">HOME <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="about.php">ABOUT</a>
	      </li>

	      <li class="nav-item dropdown active">
	        <a class="nav-link dropdown-toggle btn btn-info" ondblclick="window.location='project.php'" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          PROJECT
	        </a>
	        <div class="dropdown-menu bg-info text-white" aria-labelledby="navbarDropdown">
            <a class="dropdown-item bg-info text-white" href="project.php?softeng">SOFTWARE ENGINEERING</a>
            <a class="dropdown-item bg-info text-white" href="project.php?microp">MICROPROCCESOR</a>
            <a class="dropdown-item bg-info text-white" href="project.php?pd">PROJECT DESIGN</a>
	        </div>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="profile.php" style="<?php echo $style1; ?>" style="display: block" >PROFILE</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="requests.php" style="<?php echo $style3; ?>">REQUESTS</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="admin.php" style="<?php echo $style4; ?>">ADMINS</a>
	      </li>
	    </ul>
	    

	  </div>
	  <form class="form-inline float-right" action="search.php" method="GET">
        <input id="searchkey" class="form-control mr-sm-2"  type="text" name="searchkey" placeholder="Search..." aria-label="Search">
      <select class="form-control mr-sm-2" name="catalog">
        <option type="submit" class="form-control" value="projects">Projects</option>
        <option class="form-control" value="authors">Authors</option>
      </select>
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit" id="btnsearch" name="btnsearch">Search</button>
        <script type="text/javascript">
          $(document).ready(function(){
              $('#btnsearch').click(function(){  
                var searchkey = $('#searchkey').val().trim();  
               if(searchkey == '')  
               {  
                 return false;  
              }  
           }); 
          });

        </script>
      </form>
	</nav>
	<div class="container">
		<div class=""></div>
	</div>

			  
			</div>
			<!-- The Modal -->
			  <div class="modal fade" id="myModal1">
			    <div class="modal-dialog">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			         
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			           <h4 class="text-center font-weight-bold">Log Into your Account</h4><br>
			           <div class="container">
			           	<form action="login.php" method="POST">
							<?php include ('errors.php');?>
							    <div class="input-group mb-3 input-group-sm">
							      <div class="input-group-prepend">
							        <span class="input-group-text"><img src="user.png"></span>
							      </div>
							      <input type="text" class="form-control" name="username" placeholder="Username" value="">
							    </div>
							<br>
							
							    <div class="input-group mb-3 input-group-sm">
							      <div class="input-group-prepend">
							        <span class="input-group-text"> &nbsp; <img src="pass.png"> &nbsp;</span>
							      </div>
							      <input type="password" name="password" class="form-control"  placeholder = "Password" value="">
							    </div>
							    <center><button type="submit" name="loginbtn" class="btn btn-info" style="border-radius: 50px"> &nbsp; &nbsp;LOGIN &nbsp; &nbsp;</button></center>	
							</form>
							<br>	
															           	
			           </div>
			        </div>
			        
			      </div>
			    </div>
			  </div>
			  
			</div>
			<!-- NEWS AND EVENTS -->
			<!-- NEWS AND EVENTS -->
			<!-- NEWS AND EVENTS -->
			<?php 
				$mysqli = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM ne") or die($mysqli->error);
				$row = $result->fetch_assoc();
				// pre_r($result);
			?>
			<div class="container-fluid">
				<div class="row">
				<div class="col-1"></div>
				

				<div class="col-10">
				<div class="container clearfix"><br><h2>Welcome, Students!</h2>
					
				</div>
				<div class="container"  ><!-- style="background-color: #925B5B; height: 450px;" -->
					<div class="row clearfix" style="border: 1.5px solid  #616161;
						border-radius: 3px; background-color: #343a40;">
						<div class="col-4" style="background-color: #343a40; color: white; border-right: 0.7px solid white;">
							<div class="container" style="border-bottom: 3px solid white">
								<div class="row">
								<h4 class="col-10"><br>News & Events</h4>
								<div class="col-2"><br><button name='dit' class=" btn btn-outline-light p-0 " title="Update News/Events" data-toggle="modal" data-target="#myModal2" style="<?php echo $style4; ?>">edit</button></div>
							</div></div>
							<br><p style="font-size: 1.3vw;text-align: justify;display: block;box-sizing: border-box;"><?php echo $row['cont']; ?></p>
						</div>
						<div class="col-8 px-0 py-auto my-auto" style="height: 450px; object-fit: contain; ">
						<div class=" carousel slide" id="myCarousel" data-ride="carousel" style="margin: auto;">
							<div class="carousel-inner" >
							    <div class="carousel-item active">
							      <img  src="cpe.jpg" alt="Los Angeles" width="100%" height="450" style="object-fit: contain; background-color: #343a40;">
							    </div>
							    <?php 
						         	$mysqli1 = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli1));
									$result1 = $mysqli1->query("SELECT * FROM tbl_images") or die($mysqli1->error());
							        while($row1 = mysqli_fetch_array($result1))  
							        {
							        	echo '<div class="carousel-item">';
							        	echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['name'] ).'" height="450" width="100%" style="object-fit: contain; background-color: #343a40;" />';
							        	
							        	echo "</div>";

							        }

						         ?>

							</div>	
							<!-- Left and right controls -->
							  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
							    <span class="carousel-control-prev-icon" style="background-color:black; border-radius:100px;"></span>
							  </a>
							  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
							    <span class="carousel-control-next-icon" style="background-color:black; border-radius:100px;"></span>
							  </a>						
						</div>
						</div>
					</div>
				</div>
				</div>	
				<div class="col-1 px-0"><br><br><br>
					<button name="dit2" class="btn btn-outline-light py-0 px-0 position-relative" data-toggle="modal" data-target="#myModal3" title="edit photo" style="right: 43px;<?php echo $style4; ?>" ><img src="setting.png" width="24" height="24" style="<?php echo $style4; ?>"></button>
				</div>
				</div>
				  <div class="modal fade" id="myModal2">
				    <div class="modal-dialog">
				      <div class="modal-content">
				      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Update News and Events</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <br>
				        </div>
				        <!-- Modal body -->
				        <div class="modal-body">
				        	<form action="process.php" method="POST">
				        	 <div class="form-group">
						      <label for="comment">News/Events:</label>
						      <textarea maxlength="450" class="form-control" rows="5" id="cont" name="cont" style="text-align: justify;"><?php echo $row['cont']; ?></textarea>
						      <button type="submit" name="update" class="btn btn-primary" >Submit</button>
						  	</div>	
				        	</form>
				         
				        </div>
				        
				      </div>
				    </div>
				  </div>
				  <div class="modal fade" id="myModal3">
				    <div class="modal-dialog">
				      <div class="modal-content">
				      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Change Image Shown</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <br>
				        </div>
				        <!-- Modal body -->
				        <div class="modal-body">
							<form name="form1" action="process.php" method="POST" enctype="multipart/form-data">
								<table>
									<tr>
										<td>Select File</td>
										<td><input type="file" name="f1" id="image"></td>
									</tr>
									<tr>
										<td><input type="submit" name="upload" id="insert" value="upload"></td>
									</tr>
								</table>
								 							</form>
				         <?php 
				         	$mysqli = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli));
							$result = $mysqli->query("SELECT * FROM tbl_images") or die($mysqli->error());
							// echo "<table>";
					        	echo '<div class="row">';
							// echo "<tr>";
					        while($row = mysqli_fetch_array($result))  
					        {
					        	echo '<div class="col-3-lg mx-0" style="object-fit; contain">';
					        	echo '<img class="rounded img-thumbnail" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="100" width="100"/>';
					        	echo "</div>";
					        	?><button type="button" class="close position-relative" style="right: 25px; height: 0px" aria-label="Close">
									  <span aria-hidden="true"><a class="delete" href="index.php?delete=<?php echo $row['id']; ?>">&times;</a></span>
									</button><?php
					        	// echo "</td>";

					        }
							// echo "</tr>";
					        	echo "</div>";

					        echo "</table>";

				         ?>
				        </div>
				        
				      </div>
				    </div>
				  </div>
			</div>
			<!-- END -->
			<!-- END -->
			<!-- END -->
			<!-- ACHIEVMENTS -->
			<!-- ACHIEVMENTS -->
			<!-- ACHIEVMENTS -->
			<?php 
				$mysqli = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM achieve") or die($mysqli->error);
				$row = $result->fetch_assoc();
				// pre_r($result);
			?>
			<div class="container-fluid">
				<div class="row">
				<div class="col-1"></div>
				

				<div class="col-10">
				<div class="container clearfix"><br><h2>&nbsp;</h2>
					
				</div>
				<div class="container"  ><!-- style="background-color: #925B5B; height: 450px;" -->
					<div class="row clearfix" style="border: 1.5px solid  #707070;
						border-radius: 3px; background-color:#517780;">
						<div class="col-4" style=" background-color: #517780; color: white; border-right: 0.7px solid white;">
							<div class="container" style="border-bottom: 3px solid white">
								<div class="row">
								<h4 class="col-10"><br>Achievements</h4>
								<div class="col-2"><br><button name='dit' class=" btn btn-outline-light py-0" title="Update Achievements" data-toggle="modal" data-target="#myModal4" style="<?php echo $style4; ?>">edit</button></div>
							</div></div>
							<br><p style="font-size: 1.3vw;text-align: justify;display: block;box-sizing: border-box;"><?php echo $row['cont2']; ?></p>
						</div>
						<div class="col-8 px-0 py-auto my-auto" style="object-fit: contain; height: 450px">
						<div class=" carousel slide" id="myCarousel2" data-ride="carousel" style="margin: auto;">
							<div class="carousel-inner" >
							    <div class="carousel-item active">
							      <img  src="cpe.jpg" alt="Los Angeles" width="100%" height="450" style="object-fit: contain; background-color: #517780;">
							    </div>
							    <?php 
						         	$mysqli1 = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli1));
									$result1 = $mysqli1->query("SELECT * FROM tbl_images2") or die($mysqli1->error());
							        while($row1 = mysqli_fetch_array($result1))  
							        {
							        	echo '<div class="carousel-item">';
							        	echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['name'] ).'" height="450" width="100%" style="object-fit: contain; background-color: #517780;" />';
							        	
							        	echo "</div>";

							        }

						         ?>

							</div>	
							<!-- Left and right controls -->
							  <a class="carousel-control-prev" href="#myCarousel2" data-slide="prev">
							    <span class="carousel-control-prev-icon" style="background-color:black; border-radius:100px;"></span>
							  </a>
							  <a class="carousel-control-next" href="#myCarousel2" data-slide="next">
							    <span class="carousel-control-next-icon" style="background-color:black; border-radius:100px;"></span>
							  </a>						
						</div>
						</div>
					</div>
				</div>
				</div>	
				<div class="col-1 px-0"><br><br><br>
					<button name="dit2" class="btn btn-outline-light py-0 px-0 position-relative" data-toggle="modal" data-target="#myModal5" title="edit photo" style="right: 43px;<?php echo $style4; ?>"><img src="setting.png" width="24" height="24" style="<?php echo $style4; ?>"></button>
				</div>
				</div>
				  <div class="modal fade" id="myModal4">
				    <div class="modal-dialog">
				      <div class="modal-content">
				      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Update Achievements</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <br>
				        </div>
				        <!-- Modal body -->
				        <div class="modal-body">
				        	<form action="process.php" method="POST">
				        	 <div class="form-group">
						      <label for="comment">Achievements:</label>
						      <textarea maxlength="450" class="form-control" rows="5" id="cont2" name="cont2" style="text-align: justify;"><?php echo $row['cont2']; ?></textarea>
						      <button type="submit" name="update2" class="btn btn-primary" >Submit</button>
						  	</div>	
				        	</form>
				         
				        </div>
				        
				      </div>
				    </div>
				  </div>
				  <div class="modal fade" id="myModal5">
				    <div class="modal-dialog">
				      <div class="modal-content">
				      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Change Image Shown</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <br>
				        </div>
				        <!-- Modal body -->
				        <div class="modal-body">
							<form name="form1" action="process.php" method="POST" enctype="multipart/form-data">
								<table>
									<tr>
										<td>Select File</td>
										<td><input type="file" name="f2" id="image"></td>
									</tr>
									<tr>
										<td><input type="submit" name="upload2" id="insert" value="upload"></td>
									</tr>
								</table>
								 							</form>
				         <?php 
				         	$mysqli = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli));
							$result = $mysqli->query("SELECT * FROM tbl_images2") or die($mysqli->error());
							// echo "<table>";
					        	echo '<div class="row">';
							// echo "<tr>";
					        while($row = mysqli_fetch_array($result))  
					        {
					        	echo '<div class="col-3-lg mx-0" style="object-fit; contain">';
					        	echo '<img class="rounded img-thumbnail" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="100" width="100"/>';
					        	echo "</div>";
					        	?><button type="button" class="close position-relative" style="right: 25px; height: 0px" aria-label="Close">
									  <span aria-hidden="true"><a class="delete" href="index.php?delete2=<?php echo $row['id']; ?>">&times;</a></span>
									</button><?php
					        	// echo "</td>";

					        }
							// echo "</tr>";
					        	echo "</div>";

					        echo "</table>";

				         ?>
				        </div>
				        
				      </div>
				    </div>
				  </div>
			</div>
			<!-- END -->
			<!-- END -->
			<!-- END -->
			<!-- ANNOUNCEMENT -->
			<!-- ANNOUNCEMENT -->
			<!-- ANNOUNCEMENT -->
			<?php 
				$mysqli = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM ann") or die($mysqli->error);
				$row = $result->fetch_assoc();
				// pre_r($result);
			?>
			<div class="container-fluid">
				<div class="row">
				<div class="col-1"></div>
				

				<div class="col-10">
				<div class="container clearfix"><br><h2>&nbsp;</h2>
					
				</div>
				<div class="container"  ><!-- style="background-color: #925B5B; height: 450px;" -->
					<div class="row clearfix" style="border: 1.5px solid  #616161;
						border-radius: 3px; background-color: #2E8C9B;">
						<div class="col-4" style="background-color: #2E8C9B; color: white; border-right: 0.7px solid white;">
							<div class="container" style="border-bottom: 3px solid white">
								<div class="row">
								<h4 class="col-10"><br>Announcements</h4>
								<div class="col-2"><br><button name='dit' class=" btn btn-outline-light py-0" title="Update ANNOUNCEMENT" data-toggle="modal" data-target="#myModal6" style="<?php echo $style4; ?>">edit</button></div>
							</div></div>
							<br><p style="font-size: 1.3vw;text-align: justify;display: block;box-sizing: border-box;"><?php echo $row['cont3']; ?></p>
						</div>
						<div class="col-8 px-0 py-auto my-auto" style="height: 450px">
						<div class=" carousel slide" id="myCarousel3" data-ride="carousel" style="margin: auto;">
							<div class="carousel-inner" >
							    <div class="carousel-item active">
							      <img  src="cpe.jpg" alt="Los Angeles" width="100%" height="450" style="object-fit: contain; background-color: #2E8C9B">
							    </div>
							    <?php 
						         	$mysqli1 = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli1));
									$result1 = $mysqli1->query("SELECT * FROM tbl_images3") or die($mysqli1->error());
							        while($row1 = mysqli_fetch_array($result1))  
							        {
							        	echo '<div class="carousel-item">';
							        	echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['name'] ).'" height="450" width="100%" style="object-fit: contain; background-color: #2E8C9B" />';
							        	
							        	echo "</div>";

							        }

						         ?>

							</div>	
							<!-- Left and right controls -->
							  <a class="carousel-control-prev" href="#myCarousel3" data-slide="prev">
							    <span class="carousel-control-prev-icon" style="background-color:black; border-radius:100px;"></span>
							  </a>
							  <a class="carousel-control-next" href="#myCarousel3" data-slide="next">
							    <span class="carousel-control-next-icon" style="background-color:black; border-radius:100px;"></span>
							  </a>						
						</div>
						</div>
					</div>
				</div>
				</div>	
				<div class="col-1 px-0"><br><br><br>
					<button name="dit2" class="btn btn-outline-light py-0 px-0 position-relative" data-toggle="modal" data-target="#myModal7" title="edit photo" style="right: 43px;<?php echo $style4; ?>"><img src="setting.png" width="24" height="24" style="<?php echo $style4; ?>"></button>
				</div>
				</div>
				  <div class="modal fade" id="myModal6">
				    <div class="modal-dialog">
				      <div class="modal-content">
				      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Update News and Events</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <br>
				        </div>
				        <!-- Modal body -->
				        <div class="modal-body">
				        	<form action="process.php" method="POST">
				        	 <div class="form-group">
						      <label for="comment">News/Events:</label>
						      <textarea maxlength="450" class="form-control" rows="5" id="cont3" name="cont3" style="text-align: justify;"><?php echo $row['cont3']; ?></textarea>
						      <button type="submit" name="update3" class="btn btn-primary" >Submit</button>
						  	</div>	
				        	</form>
				         
				        </div>
				        
				      </div>
				    </div>
				  </div>
				  <div class="modal fade" id="myModal7">
				    <div class="modal-dialog">
				      <div class="modal-content">
				      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Change Image Shown</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <br>
				        </div>
				        <!-- Modal body -->
				        <div class="modal-body">
							<form name="form1" action="process.php" method="POST" enctype="multipart/form-data">
								<table>
									<tr>
										<td>Select File</td>
										<td><input type="file" name="f3" id="image"></td>
									</tr>
									<tr>
										<td><input type="submit" name="upload3" id="insert" value="upload"></td>
									</tr>
								</table>
								 							</form>
				         <?php 
				         	$mysqli = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli));
							$result = $mysqli->query("SELECT * FROM tbl_images3") or die($mysqli->error());
							// echo "<table>";
					        	echo '<div class="row">';
							// echo "<tr>";
					        while($row = mysqli_fetch_array($result))  
					        {
					        	echo '<div class="col-3-lg mx-0" style="object-fit; contain">';
					        	echo '<img class="rounded img-thumbnail" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="100" width="100"/>';
					        	echo "</div>";
					        	?><button type="button" class="close position-relative" style="right: 25px; height: 0px" aria-label="Close">
									  <span aria-hidden="true"><a class="delete" href="index.php?delete3=<?php echo $row['id']; ?>">&times;</a></span>
									</button><?php
					        	// echo "</td>";

					        }
							// echo "</tr>";
					        	echo "</div>";

					        echo "</table>";

				         ?>
				        </div>
				        
				      </div>
				    </div>
				  </div>
			</div><br><br><br>
			<!-- END -->
			<!-- END -->
			<!-- END -->

			<div class="container mx-auto jumbotron" style="border: 1.5px solid">
				<center><h4 >Projects</h4><hr style="background-color: black; height: 2px"></center>
				<div class="row">
					<div class="col-5 mx-auto text-white" style="background-color: #1abfd9; border-radius: 20px">
						<h5><br>Most Liked:</h5>
							<?php 
				         	$mysqli6 = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli6));
							$result6 = $mysqli6->query("SELECT * FROM docs ORDER BY docs_like DESC LIMIT 5") or die($mysqli6->error());
							$x = 1;
					        while($row6 = mysqli_fetch_array($result6))  
					        {
					        	
					        	echo '
						              <a style="color:black" href="view.php?view='. $row6["docs_id"].'" style="font-size: 1vw;">'.$x.'.'. $row6["docs_title"].'&nbsp;-&nbsp;'.$row6["docs_type1"].' </a><br>
						              ';

						              $x++;
					        }
							

				         ?>
					<br></div>
					
						<div class="col-5 mx-auto text-white" style="background-color: #1abfd9; border-radius: 20px">
						<h5><br>Most Viewed:</h5>
							<?php 
				         	$mysqli6 = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli6));
							$result6 = $mysqli6->query("SELECT * FROM docs ORDER BY docs_view DESC LIMIT 5") or die($mysqli6->error());
							$x = 1;
					        while($row6 = mysqli_fetch_array($result6))  
					        {
					        	
					        	echo '
						              <a style="color:black" href="view.php?view='. $row6["docs_id"].'" style="font-size: 1vw;">'.$x.'.'. $row6["docs_title"].'&nbsp;-&nbsp;'.$row6["docs_type1"].' </a><br>
						              ';

						              $x++;
					        }
							

				         ?>
					<br></div>
				</div>				
				
			</div>

</body>
</html>
<script>  
$(document).ready(function(){  
    $('#insert').click(function(){  
        var image_name = $('#image').val();  
        if(image_name == '')  
        {  
            alert("Please Select Image");  
            return false;  
        }  
        else  
        {  
            var extension = $('#image').val().split('.').pop().toLowerCase();  
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                    alert('Invalid Image File');  
                    $('#image').val('');  
             		return false;  
            }  
        }  
    }); 
     $('.delete').click(function(){
		var r = confirm("Are you sure??");
		if (r == true) {
		  window.location.href='../project';
		} else {
		  return false;
		}
	});  
});  
</script> 
