<?php  
  // Create connection
$conn = new mysqli('localhost', 'root', '', 'testing');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	if (isset($_POST['update'])){
	$id = $_POST[$_SESSION['id']];
	$desc = $_POST['desc'];

	$mysqli->query("UPDATE ne SET cont='$cont' WHERE 1") or die($mysqli->error());	
	header("location: index.php");
	exit();


}
?>