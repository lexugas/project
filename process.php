<?php
$errors = array(); 
  ini_set('mysql.connect_timeout',300);
  ini_set('default_socket_timeout',300);
$mysqli = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli));
$update = false;



// function showe($mysqli){
// 	$result = $mysqli->query("SELECT * FROM ne") or die($mysqli->error());
// 	$row = $result->fetch_assoc();
// 	echo $row['cont'];

// if (isset($_POST['update'])){
// 	$id = $_POST['id'];
// 	$cont  = $_POST['cont'];
// 	$cont = ucwords($cont);
// 	header("location: index.php");
// 	$mysqli->query("UPDATE ne SET cont='$cont' WHERE id=$id") or die($mysqli->error());	
// }
// }

//NEWS AND EVENTS
if (isset($_POST['update'])){
	$cont = $_POST['cont'];

	$mysqli->query("UPDATE ne SET cont='$cont' WHERE 1") or die($mysqli->error());	
	header("location: index.php");
	exit();


}
if (isset($_POST['loginbtn'])){
  // $username = $_POST['username'];
  // $password = md5($_POST['password']);
  // $query = "SELECT account_username, account_password from accounts where account_username= ? AND account_password= ? LIMIT 1";
  // // To protect MySQL injection for Security purpose
  // $stmt = mysqli_connect("localhost", "root", "", "testing")->prepare($query);
  // $stmt->bind_param("ss", $username, $password);
  // $stmt->execute();
  // $stmt->bind_result($username, $password);
  // $stmt->store_result();

  // if($stmt->fetch()) //fetching the contents of the row
  //         {
  //           $_SESSION['login_user'] = $username; // Initializing Session
  //           echo "<script>
  //         alert('walad');
  //         </script>";
  //         }
  // else {
  //        $error = "Username or Password is invalid";
  //      }

  exit();


}

if(isset($_POST['upload']))  
 {  
 	if ($_FILES["f1"]["tmp_name"] == '') {
 		echo "<script>
        alert('Please Select Image');
        window.location.href='../project';

        </script>";
 

 	}else{
 		
      $file = addslashes(file_get_contents($_FILES["f1"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name) VALUES ('$file')";  
      if(mysqli_query($mysqli, $query))  
      {  
          echo "<script>
        alert('Image Inserted');
        window.location.href='../project';
        </script>";  
      }  
  }
 }
 if (isset($_GET['delete'])){

 	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM tbl_images WHERE id=$id") or die($mysqli->error());
	echo "<script>
        alert('Image has been deleted');
        

        </script>";
}

//ACHIEVEMENTS

if (isset($_POST['update2'])){
	$cont2 = $_POST['cont2'];

	$mysqli->query("UPDATE achieve SET cont2='$cont2' WHERE 1") or die($mysqli->error());	
	header("location: index.php");
	exit();


}

if(isset($_POST['upload2']))  
 {  
 	if ($_FILES["f2"]["tmp_name"] == '') {
 		echo "<script>
        alert('Please Select Image');
        window.location.href='../project';

        </script>";
 

 	}else{
 		
      $file = addslashes(file_get_contents($_FILES["f2"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images2(name) VALUES ('$file')";  
      if(mysqli_query($mysqli, $query))  
      {  
          echo "<script>
        alert('Image Inserted');
        window.location.href='../project';
        </script>";  
      }  
  }
 }
 if (isset($_GET['delete2'])){

 	$id = $_GET['delete2'];
	$mysqli->query("DELETE FROM tbl_images2 WHERE id=$id") or die($mysqli->error());
	echo "<script>
        alert('Image has been deleted');
        window.location.href='../project';
        

        </script>";
}
//ANNOUNCEMENT

if (isset($_POST['update3'])){
	$cont3 = $_POST['cont3'];

	$mysqli->query("UPDATE ann SET cont3='$cont3' WHERE 1") or die($mysqli->error());	
	header("location: index.php");
	exit();


}

if(isset($_POST['upload3']))  
 {  
 	if ($_FILES["f3"]["tmp_name"] == '') {
 		echo "<script>
        alert('Please Select Image');
        window.location.href='../project';

        </script>";
 

 	}else{
 		
      $file = addslashes(file_get_contents($_FILES["f3"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images3(name) VALUES ('$file')";  
      if(mysqli_query($mysqli, $query))  
      {  
          echo "<script>
        alert('Image Inserted');
        window.location.href='../project';
        </script>";  
      }  
  }
 }
 if (isset($_GET['delete3'])){

 	$id = $_GET['delete3'];
	$mysqli->query("DELETE FROM tbl_images3 WHERE id=$id") or die($mysqli->error());
	echo "<script>
        alert('Image has been deleted');
        window.location.href='../project';
        

        </script>";
}
// LOGIN USER
// if (isset($_POST['loginbtn'])) {
//   $username = mysqli_real_escape_string($db, $_POST['username']);
//   $password = mysqli_real_escape_string($db, $_POST['password']);
//   if (empty($username)) {
//     array_push($errors, "Username is required");
//   }
//   if (empty($password)) {
//     array_push($errors, "Password is required");
//   }

//   if (count($errors) == 0) {
//     $password = md5($password);
//     $query = "SELECT * FROM accounts WHERE account_username='$username' AND account_password='$password'";
//     $results = mysqli_query($db, $query);
//     if (mysqli_num_rows($results) == 1) {
//       $_SESSION['username'] = $username;
//       // $_SESSION['success'] = "You are now logged in";
//       // header('location: index.php');
//       echo "<script>alert('walad sucess');</script>";
//       // header('profile.php');
//       $_SESSION['loggedIn'] = true;
//       header('location: profile.php');

//       // echo "walad";
//     }else {
//       array_push($errors);
//       echo "<script>alert('Wrong username or password');</script>";
//     }
//   }
// } 