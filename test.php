
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
	
			        
<?php 

	// Create connection
$conn = new mysqli('localhost', 'root', '', 'testing');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully<br>";
if (isset($_POST['submit'])){
	$authornum = $_POST['author-num'];
	// echo $authornum;
	// $sql = "INSERT INTO docs (docs_title, docs_abstract, docs_type1) VALUES ('$title', '$abstract', '$course')";

	
	$fname = array();
	$lname = array();
	// $fname = array();
	$y = 1;
	$fname[$y] = $_POST['f-author'.$y];
	$lname[$y] = $_POST['l-author'.$y];
	$x = 2;
	$sql_author = "INSERT INTO authors (author_firstname, author_surname) VALUES ('$fname[$y]', '$lname[$y]');";
	while ($authornum >= $x) {
		$fname[$x] = $_POST['f-author'.$x];
		$lname[$x] = $_POST['l-author'.$x];
		// echo "$fname[$x] $lname[$x]<br>";
		$sql_author .= "INSERT INTO authors (author_firstname, author_surname) VALUES ('$fname[$x]', '$lname[$x]');";
		$x++;
	}
	// echo $sql_author;


	// $sql_select_docs = "SELECT `docs_id` FROM docs WHERE docs_title = '$title'";
	// $sql_project = "INSERT INTO `projects` (`project_id`, `author_id`, `docs_id`) VALUES (NULL, (SELECT author_id FROM authors WHERE author_firstname = '$fname[$y]' AND author_surname = '$lname[$y]'), ($sql_select_docs);";
	// while ($authornum >= $x) {
	// 	$fname[$x] = $_POST['f-author'.$x];
	// 	$lname[$x] = $_POST['l-author'.$x];
	// 	// echo "$fname[$x] $lname[$x]<br>";
	// 	$sql_project .= "INSERT INTO `projects` (`project_id`, `author_id`, `docs_id`) VALUES (NULL, (SELECT author_id FROM authors WHERE author_firstname = '$fname[$x]' AND author_surname = '$lname[$x]'), ($sql_select_docs);";

	// 	$x++;
	// }


	// if ($conn->query($sql) === TRUE) {
	//     echo "<script>alert('New record created successfully');</script>";
	// } else {
	//     echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
	// }
	if ($conn->multi_query($sql_author) === TRUE) {
	    echo "<script>alert('New author added successfully');</script>";

	} else {
	    echo "<script>alert('Error: " . $sql_author . "<br>" . $conn->error."');</script>";
	}
	// if ($conn->multi_query($sql_project) === TRUE) {
	//     echo "<script>alert('New record created successfully');</script>";

	// } else {
	//     echo "<script>alert('Error: " . $sql_project . "" . $conn->error."');</script>";
	// }


}

 ?>  
 	<form method="POST" action="test.php">
 	<div class="container text-center">
 		<br>
 		<br>
 		<br>
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
    for (i=1;i<=10;i++){
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