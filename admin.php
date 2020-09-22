<?php include('admin-server.php') ?>	
	<?php 
	//include ('register-server.php');
	if(!isset($_SESSION['loggedIn'])){		// $style_logout = "style='display:none;'";
		// $style_login = "style='display:none;'";
			echo "<script>alert('Please login first!');
      window.location.href='login.php'
      </script>";
	
	}
	else{
		
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
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Admins</title>
	<style type="text/css">
		.bord {border:1px solid black;}
		
	</style>
	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
		<script src="about-scripts.js"></script>
		<script type="text/javascript" src="admin.js"></script>
</head>
<body>
	<?php 
	include('about-server2.php');
	 ?> 
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
			           <h4 class="text-center font-weight-bold">Log In to your Account</h4><br>
			           <div class="container">
							<form>
							    <div class="input-group mb-3 input-group-sm">
							      <div class="input-group-prepend">
							        <span class="input-group-text"><img src="user.png"></span>
							      </div>
							      <input type="text" class="form-control" placeholder="Username">
							    </div>
							</form><br>
							<form>
							    <div class="input-group mb-3 input-group-sm">
							      <div class="input-group-prepend">
							        <span class="input-group-text"> &nbsp; <img src="pass.png"> &nbsp;</span>
							      </div>
							      <input type="text" class="form-control"  placeholder = "Password">
							    </div>
							</form><br>	
							<center><button type="button" class="btn btn-info" style="border-radius: 50px"> &nbsp; &nbsp;LOGIN &nbsp; &nbsp;</button></center>									           	
			           </div>
			        </div>
			        
			      </div>
			    </div>
			  </div>
			  <br>
			  <div class="container"><br>
				<div class="container bord py-3 rounded" style="background-color: #EBEBEB">
					
					<div data-toggle="modal" data-target="#myModal10">
						<style type="text/css">
							.menuicon {
								  width: 35px;
								  height: 5px;
								  background-color: black;
								  margin: 6px 0;
								}
						</style>
						<div class="menuicon"></div>
						<div class="menuicon"></div>
						<div class="menuicon"></div>
					</div>


					
				<center><span class="display-2" style="font-weight: bold;">Registration of Admins</span></center><hr>
				<div class="container bord rounded" style=" background-color: #E0E0E0;">
					<table class="table">
				    <thead>
				      <tr>
				        <th>Admin's Name</th>
				      	<th>Account type</th>
				      	<th>Status</th>
				      	<th>Action</th>
				      </tr>
				    </thead>
				    <?php 
			  			$sql = "SELECT * FROM accounts WHERE account_type = 'admin2' OR account_type = 'admin1'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								if ($row['account_status'] == 1) {
									$stats = 'Enabled';
									$en = "none";
									$dis = "";
								}else{
									$stats = 'Disabled';
									$dis = "none";
									$en = "";
								}
							
					  echo '<tr>
				        
				        <td class="">'.$row['account_firstname'].'&nbsp;'.$row['account_surname'].'</td>
				        <td class="">'.$row['account_type'].'</td>
				        <td class="">'.$stats.'</td>
				        <td class="">
				        	<a href="admin.php?update='.$row['account_id'].'&name='.$row['account_firstname'].' '.$row['account_surname'].'" class="btn btn-success" role="button" style="Display:'.$en.'" >Enable</a>
				        	<a href="admin.php?disable='.$row['account_id'].'&name='.$row['account_firstname'].' '.$row['account_surname'].'" class="btn btn-danger" role="button" style="Display:'.$dis.'" >Disable</a>
				        </td>
				      </tr>';

							}
						} else {
							echo "<tr><td>0 results</td></tr>";
						}
			  		?>
				  </table>
				</div>

			</div>

			  <br>
			  <div class="jumbotron bord col-6 mx-auto rounded py-1">

			  <form action="admin.php" method="POST">
				          <div class="form-group">
							  <label for="sel1">Admin type</label>
							  <select class="form-control" id="sel1" name="admintype">
							    <option>admin2</option>
							    <option>admin1</option>
							  </select>
							</div>	
				          <center><label>Person</label></center>
						    <div class="input-group mb-3">
						      <input type="text" id="fname" class="form-control"  placeholder="First Name" name="fname">
						      <input type="text" id="sname" class="form-control"  placeholder="Last Name" name="sname">
						    </div>  
						     <center><label>UserName</label></center>
							    <input type="text" id="username" class="form-control form-control text-center" name="username" placeholder="UserName"><br>
								<center><label>Email</label></center>
							    <input type="email" id="email" class="form-control form-control text-center" name="email" placeholder="Email"><br>
							    <input type="submit" id="regad" value="Add" class="btn btn-success btn-block" name="regad">
				          	
					          		
					          	
					          </form>
				        </div>
				      </div>
				    </div>
				  </div>
				    <!-- Modal -->
					  <div class="modal fade" id="myModal10" role="dialog">
					    <div class="modal-dialog modal-sm">
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title">Backup & Restore</h4>
					        </div>
					        <div class="modal-body">
					          <div class="row">
								<div class="col"><a href="export.php" class="btn btn-info" role="button">Backup</a></div>
								<div class="col"><a href="import.php" class="btn btn-info float-right" role="button">Restore</a></div>
							</div><hr>
								<center><a href="usrmgr.php" class="btn btn-success button-lg" role="button">User Manager</a></center><br>
								<center><a href="actlog.php" class="btn btn-success button-lg" role="button">User's Activity Log</a></center>
							
					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					      </div>
					    </div>
					  </div>

	</body>
</html>
