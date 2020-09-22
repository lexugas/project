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
			$link = 'add-project.php';
		} elseif($_SESSION['type'] == 'admin2'){
			$link = 'add-project.php';
			$style4 = 'display:none';
		}else{
			$link = 'upload-project.php';
			$style3 = 'display:none';
			$style4 = 'display:none';
		}
		$conn = new mysqli('localhost', 'root', '', 'testing');

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
			if (isset($_POST['update'])){
			$id = $_POST['id'];
			$desc = $_POST['desc'];
		    $sql = "UPDATE `accounts` SET `account_desc` = '$desc' WHERE `accounts`.`account_id` = '$id'" ;

		    if ($conn->query($sql) === TRUE) {
		        echo "<script>
		        alert('Record has been Updated!');
		        window.location.href='profile.php';
		        </script>";
		        $_SESSION['desc'] = $desc;
		    } else {
		        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
		    }
		    
		}

			if (isset($_POST['update-contact'])){
			$id = $_POST['id'];
			$contact = $_POST['contact'];
		    $sql = "UPDATE `accounts` SET `account_contactnum` = '$contact' WHERE `accounts`.`account_id` = '$id'" ;

		    if ($conn->query($sql) === TRUE) {
		        echo "<script>
		        alert('Record has been Updated!');
		        window.location.href='profile.php';
		        </script>";
		        $_SESSION['contact'] = $contact;
		    } else {
		        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
		    }
		    
		}
			if (isset($_POST['update-lead'])){
			$id = $_POST['id'];
			$leadership = $_POST['lead'];
		    $sql = "UPDATE `accounts` SET `account_leadershipact` = '$leadership' WHERE `accounts`.`account_id` = '$id'" ;

		    if ($conn->query($sql) === TRUE) {
		        echo "<script>
		        alert('Record has been Updated!');
		        window.location.href='profile.php';
		        </script>";
		        $_SESSION['leadership'] = $leadership;
		    } else {
		        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
		    }
		    
		}
			if (isset($_POST['update-skill'])){
			$id = $_POST['id'];
			$skill = $_POST['skill'];
		    $sql = "UPDATE `accounts` SET `account_skills` = '$skill' WHERE `accounts`.`account_id` = '$id'" ;

		    if ($conn->query($sql) === TRUE) {
		        echo "<script>
		        alert('Record has been Updated!');
		        window.location.href='profile.php';
		        </script>";
		        $_SESSION['skills'] = $skill;
		    } else {
		        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
		    }
		    
		}
		if(isset($_POST["insert-img"]))  
		 {
		    $id = $_POST['id'];
		    $account_img = addslashes(file_get_contents($_FILES["save-image"]["tmp_name"]));  
		    $sql = "UPDATE `accounts` SET `account_picture` = '$account_img' WHERE `accounts`.`account_id` = $id ";

		    if ($conn->query($sql) === TRUE) {
		        echo "<script>
		        alert('Record has been Updated! walad');
		        window.location.href='profile.php';
		        </script>";
		        $img_query = "SELECT `account_picture` FROM accounts WHERE `accounts`.`account_id` = $id ";
				$result = $conn->query($img_query);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        $_SESSION['picture'] = $row['account_picture'];
				    }
				}
		    } else {
		        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
		   } 

		 }  


	}

	?>
<!DOCTYPE html>
<html>
<head>
	<title>CPEP</title>
	<style type="text/css">
		.bord {border:1px solid black;}
		.image{
			  opacity: 1;
			  display: block;
			  width: 100%;
			  height: auto;
			  transition: .5s ease;
			  backface-visibility: hidden;
		}
		.img-edit{
			position: relative;
  			width: 100%;
		}
		.middle {
		  transition: .5s ease;
		  opacity: 0;
		  position: absolute;
		  bottom: 0vw;
		  text-align: center;
		  background-color: black
		}

		.img-edit:hover .middle {
		  opacity: 0.6;
		  cursor: pointer;

		}
	</style>
	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
		<script src="about-scripts.js"></script>
</head>
<body>
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
			  <br>
			<div class="container jumbotron py-3">
				<div class="row"><br>
					<div class="col-3 p-0">
						<?php 
						if ($_SESSION['picture'] == '') {
							$_SESSION['picture'] = file_get_contents('profile.jpg');
						}
						echo '
						<div class = "img-edit">
						<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['picture']).'" class="image" height="auto" width="100%" style="object-fit: contain;">
						<div class = "middle py-3" style="width:100%; font-weight:bold; color:white" data-toggle="modal" data-target="#myModal2" id="edit-pic">change</div>
						</div>';
						?>
						<h1></h1>
						<a href="<?php echo $link ?>" class="btn btn-info btn-block" role="button" name="upload-std">Upload Project</a>
					</div>
					<div class="col-9">
						
						<h1><?php echo $_SESSION['firstname'].'&nbsp;'.$_SESSION['surname']; ?></h1><a href="Change.php" style="margin-top: -50px" class="btn btn-info float-right">Change Password</a>
						<hr>
						<br>
						<label>Email:</label>
						<p><?php echo $_SESSION['email']; ?></p><hr>
						<label>Contact No.:</label><button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal2" id="edit-contact">Edit</button>
						<p id="contact-display"><?php echo $_SESSION['contact']; ?></p><hr>
						<label>OBJECTIVE:</label><button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal2" id="edit-btn">Edit</button>
						<p id="desc-display"><?php echo $_SESSION['desc']; ?></p><hr>
						<label>LEADERSHIP ACTIVITIES:</label><button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal2" id="edit-lead">Edit</button>
						<p id="leadership-display"><?php echo $_SESSION['leadership']; ?></p><hr>
						<label>SKILLS:</label><button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal2" id="edit-skill">Edit</button>
						<p id="desc-display"><?php echo $_SESSION['skills']; ?></p><hr>
<!--  style="border: 2px solid red" -->
					</div>
				</div>
			</div>
			<div class="modal fade" id="myModal2">
			    <div class="modal-dialog">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Edit</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			        	<div id="desc-div">
			        	<form method="POST">
			        		<input type="input" name="id" style="display: none" value="<?php echo $_SESSION['id']; ?>">
				          <textarea maxlength="450" class="form-control" rows="5" id="desc" name="desc" style="text-align: justify;" placeholder="Add Description"></textarea>
				          <button type="submit" name="update" class="btn btn-primary" >Submit</button>
			      		</form>	
			        	</div>
			        	<div id="contact-div">
			        	<form method="POST">
			        		<input type="input" name="id" style="display: none" value="<?php echo $_SESSION['id']; ?>">
				          <input type="input" class="form-control" id="contact" name="contact" style="text-align: justify;" placeholder="Add contact number"><!-- </input> -->
				          <button type="submit" name="update-contact" class="btn btn-primary" >Submit</button>
			      		</form>	
			        	</div>
			        	<div id="lead-div">
			        	<form method="POST">
			        		<input type="input" name="id" style="display: none" value="<?php echo $_SESSION['id']; ?>">
				          <textarea maxlength="450" class="form-control" rows="5" id="lead" name="lead" style="text-align: justify;" placeholder="Add Description"></textarea>
				          <button type="submit" name="update-lead" class="btn btn-primary" >Submit</button>
			      		</form>	
			        	</div>
			        	<div id="skill-div">
			        	<form method="POST">
			        		<input type="input" name="id" style="display: none" value="<?php echo $_SESSION['id']; ?>">
				          <textarea maxlength="450" class="form-control" rows="5" id="skill" name="skill" style="text-align: justify;" placeholder="Add Description"></textarea>
				          <button type="submit" name="update-skill" class="btn btn-primary" >Submit</button>
			      		</form>	
			        	</div>
			        	<div id="pic-div">
					          			<form id="" method="POST"  enctype="multipart/form-data">
					          				<input type="input" name="id" style="display: none" value="<?php echo $_SESSION['id']; ?>">
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
			      </div>
			    </div>
			  </div>
		</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#edit-btn', function(){
			$('#desc-div').show();
			$('#pic-div').hide();
			$('#contact-div').hide();
			$('#lead-div').hide();
			$('#skill-div').hide();
			var desc = $(this).siblings("#desc-display").text();
			$('#desc').val(desc);
// .css({"bacgound-color": "red", "border": "2px solid red"})
		});
		$(document).on('click', '#edit-pic', function(){
			$('#pic-div').show();
			$('#desc-div').hide();
			$('#contact-div').hide();
			$('#lead-div').hide();
			$('#skill-div').hide();
			var desc = $(this).siblings("#desc-display").text();
			$('#desc').val(desc);
// .css({"bacgound-color": "red", "border": "2px solid red"})
		});
		$(document).on('click', '#edit-contact', function(){
			$('#desc-div').hide();
			$('#pic-div').hide();
			$('#contact-div').show();
			$('#lead-div').hide();
			$('#skill-div').hide()
			var desc = $(this).siblings("#contact-display").text();
			$('#contact').val(desc);

		});
		$(document).on('click', '#edit-lead', function(){
			$('#desc-div').hide();
			$('#pic-div').hide();
			$('#contact-div').hide();
			$('#lead-div').show();
			$('#skill-div').hide()
			var desc = $(this).siblings("#lead-display").text();
			$('#lead').val(desc);
		});
		$(document).on('click', '#edit-skill', function(){
			$('#desc-div').hide()
			$('#pic-div').hide();
			$('#contact-div').hide();
			$('#lead-div').hide();
			$('#skill-div').show();
			var desc = $(this).siblings("#skill-display").text();
			$('#desc').val(desc);
		});
	});

</script>