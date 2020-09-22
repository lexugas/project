<?php 
	include ('register-server.php');
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
	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
		<script src="about-scripts.js"></script>
</head>
<body>
	<?php require_once 'process.php';
	include('about-server.php');
	include('about-server2.php');
	 ?> 
	<nav class="navbar  navbar-dark bg-dark">
 		<a class="navbar-brand" href="index.php"><img src="cpeplogo.png"></a>
 		<form class="form-inline my-2 my-lg-0">
	      <div class="btn-group" role="group" aria-label="Basic example" style="<?php echo $style2; ?>" >
			  <button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#myModal1" style="border-right: 1.1px solid white">LOGIN</button>
			  <a href="register.php" class="btn btn-dark" role="button" style="border-left: 1.1px solid white; color: white;">SIGNUP</a>
			</div>
			  <a href="logout.php" class="btn btn-dark" role="button" style=" <?php echo $style1; ?> " >Log Out</a>

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
        <option class="form-control" value="projects">Projects</option>
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
				<!-- The Modal -->
		  <div class="modal fade" id="myModal">
			    <div class="modal-dialog">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">SEARCH</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			          <div class="jumbotron">
			          	<span>Enter your keyword</span>
						<form class="form-inline my-2 my-lg-0">
					      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
					    </form>	
					      <form action="/action_page.php">
						    <div class="form-check">
						      <label class="form-check-label" for="radio1">
						        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Title
						      </label>
						    </div>
						    <div class="form-check">
						      <label class="form-check-label" for="radio2">
						        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Author
						      </label>
						    </div>
						  </form>			 
			          </div>
			        </div>			       			        
			      </div>
			    </div>
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
			  <br>
			  <div class="container-fluid bg-dark">
			  	<div class="row">
				  		<div class="col-6" style="background-color: turquoise">
				  			<br>
				  			<center><span class="" style="text-transform: uppercase; text-align: center; font-size: 10vw;">our mission</span></center>
				  			<br>
				  		</div>		
				  	    	
							
								<?php
								$sql = "SELECT * FROM mv";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								    // output data of each row
								    while($row = $result->fetch_assoc()) {
								        echo '<div class="col-6 m-auto" style="color:white;">
								        <button type="button" class="btn btn-outline-light float-right edit" data-id="'. $row['id'].'" data-toggle="modal" data-target="#myModal3" style="';?><?php echo $style4; ?><?php echo '">edit</button><br>
											<p class="display-cont" style="text-align: left; font-size: 1.8vw; object-fit: contain;">'.$row['mvcont'].'</p>
											</div>';
								    }
								} else {
								    echo "0 results";
								}
								?>
							
							<!-- <div class="bord col-6 m-auto">
						        <button type="button" class="btn btn-outline-dark float-right edit" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#myModal3">edit</button><br>
									<p class="display-cont" style="text-align: left; font-size: 1.8vw; object-fit: contain;"></p>
							</div> -->
							   
				  		<div class="col-6" style="background-color: #BAFBF9"><br>
				  			<center><span class="" style="text-transform: uppercase; text-align: center; font-size: 10vw;">our vision</span></center>
				  			<br></div>		
					</div> 
				

				  

				  <div class="modal fade" id="myModal3">
				    <div class="modal-dialog modal-dialog-centered" id="gr-modal">
				      <div class="modal-content">
				      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Edit the Mission/Vision</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
				        
				        <!-- Modal body -->
				        <div class="modal-body" id="gr-modal2">
				          <textarea maxlength="300" rows="8" cols="50" style="width: 100%" id="mvcont"></textarea>
				          <input type="submit" name="insert" id="update_btn" value="Update" data-dismiss="modal" class="btn btn-success" />
				          <div class="row" id="group2">
				          	<div class=" col-5">
				          		
				          	<div class="col-7"><br>
				          		<form>
								    <div class="input-group mb-3 input-group-sm">
								      <div class="input-group-prepend">

								        <span class="input-group-text">Full Name</span>
								      </div>
								      <input type="text" class="form-control" id="name">
								    </div>
								    <div class="form-group">
								  <label for="comment">Description:</label>
								  <textarea class="form-control" rows="5" id="bio"></textarea>
								</div>
								        <input type="button" name="" id="update_btn2" value="Upload" class="btn btn-dark">
								 </form>

				          	</div>
				          </div>
				        </div>
                         
				      </div>
				    </div>
				  </div> 	
				</div>
			  </div>
			  <br>
			  <div class="bord container jumbotron" id="gr">
			  	<div class="text-right"  style="<?php echo $style4; ?>"><a href="edit-faculty.php" class="btn btn-outline-dark" role="button" >Edit</a></div>
			  	<center><span class=" " style="font-size: 3vw;text-transform: uppercase;">cpe department chair</span><hr></center>
			  		<div class="row justify-content-center">
			  		<?php 
			  			$sql = "SELECT * FROM cpe_dept WHERE prof_id = 1";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								 echo'<center><div class="bord m-2" >
					  			<div class=""><img src="data:image/jpeg;base64,'.base64_encode($row['prof_img'] ).'" height="300" width="300" style="border-radius: 1000px;"><br>
					  			<br>
					  				<span style="text-transform: capitalize; font-size: 2vw;" class="display-name">'.$row['prof_full_name'].'</span><br>
							  		<span style="font-size: 1.5vw;" class="display-bio">'.$row['prof_bio'].'</span>
					  			</div><br>
					  		</div></center>';
							}
						} else {
							echo "0 results";
						}
			  		?>
			  		</div>
			  	<center><span class=" " style="font-size: 3vw;text-transform: uppercase;">cpe faculty</span><hr></center>
			  		<div class="row justify-content-center">
			  			<?php 
			  			$sql = "SELECT * FROM cpe_dept WHERE prof_id NOT IN (1)";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo'<div class="bord col-8 row m-2" style="width: 168px;">
					  			<div class="col-4"><img src="data:image/jpeg;base64,'.base64_encode($row['prof_img'] ).'" height="168" width="168" style="border-radius: 100px;"></div><br>
					  			<div class="col-8"><center><br>
					  				<span style="text-transform: capitalize; font-size: 1.5vw;" class="display-name">'.$row['prof_full_name'].'</span><br>
							  		<span style="font-size: 1vw;" class="display-bio">'.$row['prof_bio'].'</span></center>
					  			</div><br>
					  		</div>';
								}
						} else {
							echo "0 results";
						}
			  		?>
					  		
				  	</div>
			  	<center><span class=" " style="font-size: 3vw;text-transform: uppercase;">our team</span><hr></center>
			  		<div class="row">
			  			<div class="col-2 text-center">
			  				<img src="profile.jpg" width="100%" height="auto" style="border-radius: 1000px;"><br>
			  				<span style="text-transform: capitalize; font-size: 1.8vw;">walad muctar</span><br>
				  			<span style="font-size: 1.2vw;">add bio here...</span>
			  			</div>
			  			<div class="col-2 text-center">
			  				<img src="profile.jpg" width="100%" height="auto" style="border-radius: 1000px;"><br>
			  				<span style="text-transform: capitalize; font-size: 1.8vw;">walad muctar</span><br>
				  			<span style="font-size: 1.2vw;">add bio here...</span>
			  			</div>
			  			<div class="col-2 text-center">
			  				<img src="profile.jpg" width="100%" height="auto" style="border-radius: 1000px;"><br>
			  				<span style="text-transform: capitalize; font-size: 1.8vw;">walad muctar</span><br>
				  			<span style="font-size: 1.2vw;">add bio here...</span>
			  			</div>
			  			<div class="col-2 text-center">
			  				<img src="profile.jpg" width="100%" height="auto" style="border-radius: 1000px;"><br>
			  				<span style="text-transform: capitalize; font-size: 1.8vw;">walad muctar</span><br>
				  			<span style="font-size: 1.2vw;">add bio here...</span>
			  			</div>
			  			<div class="col-2 text-center">
			  				<img src="profile.jpg" width="100%" height="auto" style="border-radius: 1000px;"><br>
			  				<span style="text-transform: capitalize; font-size: 1.8vw;">walad muctar</span><br>
				  			<span style="font-size: 1.2vw;">add bio here...</span>
			  			</div>
			  			<div class="col-2 text-center">
			  				<img src="profile.jpg" width="100%" height="auto" style="border-radius: 1000px;"><br>
			  				<span style="text-transform: capitalize; font-size: 1.8vw;">walad muctar</span><br>
				  			<span style="font-size: 1.2vw;">add bio here...</span>
			  			</div>
			  		</div>
			  </div>
			  <br>
		</body>
</html>


