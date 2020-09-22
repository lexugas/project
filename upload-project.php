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
	echo "<script>alert('Please login first!');
      window.location.href='login.php'
      </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Project</title>
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
            <a class="dropdown-item bg-info text-white" href="project.php?softeng">SOFTWARE ENGINEERING</a>
            <a class="dropdown-item bg-info text-white" href="project.php?microp">MICROPROCCESOR</a>
            <a class="dropdown-item bg-info text-white" href="project.php?pd">PROJECT DESIGN</a>
	        </div>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="profile.php" style="<?php echo $style1; ?>">PROFILE</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="requests.php" style="<?php echo $style3; ?>">REQUESTS</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link btn btn-info" href="#" style="<?php echo $style4; ?>">ADMINS</a>
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
							      <input type="password" class="form-control"  placeholder = "Password">
							    </div>
							</form><br>	
							<center><button type="button" class="btn btn-info" style="border-radius: 50px"> &nbsp; &nbsp;LOGIN &nbsp; &nbsp;</button></center>									           	
			           </div>
			        </div>
			        
			      </div>
			    </div>
			  </div>
<?php 

	// Create connection
$conn = new mysqli('localhost', 'root', '', 'testing');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully<br>";
if (isset($_POST['submit'])){
	$title = $_POST['title'];
	$course = $_POST['course'];
	$abstract = $_POST['abstract'];
	$authornum = $_POST['author-num'];
	$keyword = $_POST['keyword'];
	$rawdate = htmlentities($_POST['date']);
	$date = date('Y-m-d', strtotime($rawdate));
	$cancel = true;
	// echo $authornum;
	$sql = "INSERT INTO docs (docs_title, docs_keyword, docs_abstract, docs_type1, docs_date , docs_status) VALUES ('$title', '$keyword', '$abstract', '$course', '$date', 0)";
	
	$fname = array();
	$lname = array();
	// $fname = array();
	$y = 1;
	$fname[$y] = $_POST['f-author'.$y];
	$lname[$y] = $_POST['l-author'.$y];
	$x = 2;
	$db = mysqli_connect('localhost', 'root', '', 'testing');
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$sql2 = 'SELECT * FROM `authors` WHERE `author_firstname` =  "$fname[$y]" AND `author_surname` = "$lname[$y]" LIMIT 1';
	$user_check_query = "SELECT * FROM accounts WHERE account_username='$username' OR account_email='$email' LIMIT 1";
	  $result = mysqli_query($db, $sql2);
	  $user = mysqli_fetch_assoc($result);
	  
	  if ($user) { // if user exists
	    if ($user['author_firstname'] === $fname[$y] && $user['author_surname'] === $lname[$y]) {
	    	 $sql_author = ";";
	    }
	}else{
	    	 $sql_author = "INSERT INTO authors (author_firstname, author_surname) VALUES ('$fname[$y]', '$lname[$y]');";
	    }
             // $sql_author = "INSERT INTO authors (author_firstname, author_surname) VALUES ('$fname[$y]', '$lname[$y]');";
	while ($authornum >= $x) {
		$fname[$x] = $_POST['f-author'.$x];
		$lname[$x] = $_POST['l-author'.$x];
		// echo "$fname[$x] $lname[$x]<br>";
		// $sql3 = 'SELECT * FROM `authors` WHERE `author_firstname` =  "$fname[$x]" AND `author_surname` = "$lname[$x]" LIMIT 1';
  //           $result3 = $conn->query($sql3);

  //           if ($result3->num_rows > 0) {
  //               // output data of each row

  //               $sql_author .= ";";
                    
  //               }
  //            else {
  //               $sql_author .= "INSERT INTO authors (author_firstname, author_surname) VALUES ('$fname[$x]', '$lname[$x]');";
  //         }

		$sql_author .= "INSERT INTO authors (author_firstname, author_surname) VALUES ('$fname[$x]', '$lname[$x]');";
		$x++;
	}


	
	// echo $sql;
	// echo "<br>";
	// echo $sql_author;
	// echo "<br>";
	// echo $sql_project;

	if ($conn->query($sql) === TRUE) {
	    echo "<script>alert('New record created successfully');</script>";
	} else {
	    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
	    $cancel = false;
	}
	if ($conn->multi_query($sql_author) === TRUE) {
	    echo "<script>alert('New author added successfully');</script>";

	} else {
	    echo "<script>alert('Error: " . $sql_author . "<br>" . $conn->error."');</script>";
	    $cancel = false;
	}
	// INSERT INTO `projects`(`author_id`, `docs_id`) VALUES ((SELECT authors.author_id FROM authors WHERE authors.author_firstname = 'Marilyn' AND authors.author_surname = 'Cabral' ), (SELECT docs.docs_id FROM docs WHERE docs.docs_title = 'Noriel Miles Academy Online Information System'))

	// $sql_select_docs = "SELECT `docs_id` FROM docs WHERE docs_title = '$title'";
	$conn1 = new mysqli('localhost', 'root', '', 'testing');

	// Check connection
	if ($conn1->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

		$sql_project = "INSERT INTO `projects` (`author_id`, `docs_id`) VALUES ((SELECT authors.author_id FROM authors WHERE authors.author_firstname = '$fname[$y]' AND authors.author_surname = '$lname[$y]'), (SELECT docs.docs_id FROM docs WHERE docs.docs_title = '$title'));";
		$x = 2;
		while ($authornum >= $x) {
			$fname[$x] = $_POST['f-author'.$x];
			$lname[$x] = $_POST['l-author'.$x];
			// echo "$fname[$x] $lname[$x]<br>";
			$sql_project .= "INSERT INTO `projects` (`author_id`, `docs_id`) VALUES ((SELECT authors.author_id FROM authors WHERE authors.author_firstname = '$fname[$x]' AND authors.author_surname = '$lname[$x]'), (SELECT docs.docs_id FROM docs WHERE docs.docs_title = '$title'));";

			$x++;
		}
		// echo $sql_project;
	if ($conn1->multi_query($sql_project) === TRUE) {
	    echo "<script>alert('New project added successfully');</script>";

	} else {
	    echo "<script>alert('Error: " . $sql_project . "wa" . $conn1->error."');</script>";
	}
	if ($conn->query($sql) === TRUE && $conn->multi_query($sql_author) === TRUE) {
		# code...

        $action = 'Reqiest a Project '. $title;
        userlog($action, $_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type']);
}
	} $_SESSION['type'],
}


	

 ?>  
 	<form method="POST" action="upload-project.php">
 	<div class="container text-center">
 		<div class="form-group">
		  <label>Project's Title:</label>
		  <input name="title" type="text" class="form-control text-center">
		</div>
		<div class="">
		<label>Course:</label>
		<select name="course">
		  <option style="display: none"></option>
		  <option>Software Engineering</option>
		  <option>Micro Processor</option>
		  <option>Project Design</option>
		</select>
		<label>Date:</label>
		<input type="date" name="date">
		</div>
		<br>
		<div class="form-group">
		  <label>Project's Keyword:</label>
		  <input name="keyword" type="text" class="form-control text-center">
		</div>
		<label>Project's Abstract:</label>
		<textarea class="" name="abstract" style="width: 100%" rows="10" ></textarea><br>
		<label>Number of Authors:</label>
		<select class="1-10" name="author-num">
			<option style="display: none"></option>
		</select>
		<!-- <p id="mySelectOption"></p> -->
		<div id="demo"></div>
		<input type="submit" class="btn btn-info container-fluid m-2" value="submit" name="submit">
	</div>
 	</form>
	
	

</body>
</html>

<script >
$(function(){
    var $select = $(".1-10");
    for (i=1;i<=12;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
})
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.1-10').change(function(){
		// $('#mySelectOption').text($('.1-10').val());
		var text = "";
		var i = 1;
		while ($('.1-10').val() >= i) {
		  text += '<br><label>Author '+i+'</label><br><input type="text" name="f-author'+i+'" placeholder="First Name"></input><input name="l-author'+i+'" type="text" placeholder="Last Name"></input><br>';
		  i++;
		}
		document.getElementById("demo").innerHTML = text;
		console.log('hello');
	});
		

	});

</script>