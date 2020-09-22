	<?php session_start();
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
	<title>Edit Faculty</title>
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
	<?php 
	include('about-server2.php');
	 ?> 
	<nav class="navbar  navbar-dark bg-dark">
 		<a class="navbar-brand" href="index.php"><img src="cpeplogo.png"></a>
 		<form class="form-inline my-2 my-lg-0">
			  <a href="logout.php" class="btn btn-dark" role="button" >Log Out</a>
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
	        <a class="nav-link btn btn-info" data-toggle="modal" data-target="#myModal" href="#" >SEARCH</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="about.php">ABOUT</a>
	      </li>
	      <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle btn btn-info" ondblclick="window.location='project.php'" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            PROJECT
          </a>
	        <div class="dropdown-menu bg-info text-white" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item bg-info text-white" href="#">SOFTWARE ENGINEERING</a>
	          <a class="dropdown-item bg-info text-white" href="#">MICROPROCCESOR</a>
	          <a class="dropdown-item bg-info text-white" href="#">PROJECT DESIGN</a>
	        </div>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="profile.php" <?php echo $style1; ?>>PROFILE</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="requests.php" style="<?php echo $style3; ?>">REQUESTS</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="admin.php" style="<?php echo $style4; ?>">ADMINS</a>
	      </li>
	    </ul>

	  </div>
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
			  <div class="container">
				  <h2>No title</h2>
				  <p>Exxample lang to</p>
				  <div class="text-right"><button type="button" data-toggle="modal" data-target="#myModal3" class="btn btn-warning" id="f-add" name="" style="color:white">Add</button></div>       
				  <table class="table">
				    <thead>
				      <tr>
				        <th>image</th>
				      	<th>id_number</th>
				        <th>full name</th>
				        <th>description</th>
				      </tr>
				    </thead><?php 
			  			$sql = "SELECT * FROM cpe_dept";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
							if($row['prof_img'] == ''){
							$row['prof_img'] = file_get_contents('profile.jpg');
						}
					  echo '<tr>
				        <td class="display_img"><img src="data:image/jpeg;base64,'.base64_encode($row['prof_img'] ).'" height="100" width="100"><br><button type="button" class="px-4 py-1 btn-warning" id="fpic" data-toggle="modal" data-target="#myModal3" style="width: 100px;bottom: 3vw">change</button></td>
				      	<td class="display_id">'.$row['prof_id'].'</td>
				        <td class="display_name">'.$row['prof_full_name'].'</td>
				        <td class="display_bio">'.$row['prof_bio'].'</td>
				        <td>
				        	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal3" id="ftext">Edit</button>
				        	<a href="edit-faculty.php?delete='.$row['prof_id'].'" class="btn btn-danger" role="button">delete</a>
				        </td>
				      </tr>';

							}
						} else {
							echo "0 results";
						}
			  		?>
				  </table>
				</div>
				<!-- The Modal -->
				  <div class="modal fade" id="myModal3">
				    <div class="modal-dialog">
				      <div class="modal-content">
				      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Modal Heading</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
				        
				        <!-- Modal body -->
				        <div class="modal-body">
				          <div class="" id="ade"><br>
				          		<form action="about-server2.php" method="POST">
								    <div class="input-group mb-3 input-group-sm">
								      <div class="input-group-prepend">
								      	<input type="hidden" name="prof_id" id="id">
								        <span class="input-group-text">Full Name</span>
								      </div>
								      <input type="text" name="prof_full_name" class="form-control" id="name">
								    </div>
								    <div class="form-group">
								  <label for="comment">Description:</label>
								  <textarea name="prof_bio" class="form-control" rows="5" id="bio"></textarea>
								</div>
								        <input type="submit" id="update" name="update" value="Update" class="btn btn-dark">
								        <input type="submit" id="save" name="save" value="Save" class="btn btn-primary">
								 </form>
				          	</div>
				          	<div id="cpic">
					          			<form id="" action="about-server2.php" method="POST"  enctype="multipart/form-data">
									        <img id="img" src="#" alt="your image" width="250" height="auto" /><br>
									        <input type="file" id="save-image" onchange="readURL(this);ValidateSize(this)" name="save-image" /><br>
								        	<input type="submit" id="insert-img" name="insert-img" value="Save" class="btn btn-primary">
								      	<input type="hidden" name="prof_id" id="img-id">

									    </form>
					          		</div>
					          		<script type="text/javascript">
								        function readURL(input) {
								            if (input.files && input.files[0]) {
								                var reader = new FileReader();

								                reader.onload = function (e) {
								                    $('#img').attr('src', e.target.result);
								                }

								                reader.readAsDataURL(input.files[0]);
								            }
								        }
								    </script>
					          	</div>
				        </div>
				        
				        <!-- Modal footer -->
				        <!-- <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div> -->
				        
				      </div>
				    </div>
				  </div>
	</body>
</html>
