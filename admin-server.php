<?php
include ('register-server.php');
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testing');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// REGISTER USER
if (isset($_POST['regad'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = '@dmin1';
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $sname = mysqli_real_escape_string($db, $_POST['sname']);
  $admintype = mysqli_real_escape_string($db, $_POST['admintype']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
 //  if (empty($username)) { array_push($errors, "Username is required"); }
 //  if (empty($email)) { array_push($errors, "Email is required"); }
 //  if (empty($password)) { array_push($errors, "Password is required"); }
 //  if ($password != $cpassword) {
	// array_push($errors, "The two passwords do not match");
 //  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM accounts WHERE account_username='$username' OR account_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['account_username'] === $username) {
    array_push($errors, "Username is already exist");
    }

    if ($user['account_email'] === $email) {
      array_push($errors, "Password is already exist");
    }

    if ($user['account_student_num'] === $studnum) {
      array_push($errors, "Student number is already exist");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	// $query = "INSERT INTO accounts (account_username, account_email, account_passwor, account_firstname, account_surname, accounts_student_num) 
  	// 		  VALUES('$username', '$email', '$password', '$fname', '$sname', '$studnum')";
  	
  // 	echo "<script>alert('walad sucess');</script>";
  // echo $query;
  $conn = new mysqli('localhost', 'root', '', 'testing');
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "INSERT INTO accounts (account_username, account_email, account_password, account_firstname, account_surname, account_type, account_status) 
          VALUES('$username', '$email', '$password', '$fname', '$sname', '$admintype', '1')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Successfully Registered, The temporary password is @dmin1');
    window.location.href='../project';
    </script>";
  } else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
  }

  }
}
if (isset($_GET['disable'])){
    $id = $_GET['disable'];
    $name = $_GET['name'];
$conn = new mysqli('localhost', 'root', '', 'testing');
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
    // sql to delete a record
    $sql = "UPDATE `accounts` SET `account_status`= 0 WHERE `accounts`.`account_id` = $id ";

    if ($conn->query($sql) === TRUE) {
        $action = 'Disabled '. $name;
        userlog($action, $_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type']);
}
        echo "<script>
        alert('The Admin has been Disabled!');
        window.location.href='admin.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    }


}
if (isset($_GET['enable'])){
  $conn = new mysqli('localhost', 'root', '', 'testing');
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
    $id = $_GET['enable'];
    $name = $_GET['name'];

    // sql to update a record
    $sql = "UPDATE `accounts` SET `account_status`= 1 WHERE `accounts`.`account_id` = $id ";

    if ($conn->query($sql) === TRUE) {
        $action = 'Enabled '. $name;
        userlog($action, $_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type']);
}
        echo "<script>
        alert('The Admin has been Enabled');
        window.location.href='admin.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    }


}  

// if (isset($_POST['backup'])) {
// define("BACKUP_PATH", "C:/Users/HP/Downloads/");

// $server_name   = "localhost";
// $username      = "root";
// $password      = "";
// $database_name = "testing";
// $date_string   = date("Ymd");

// $cmd = "C:/xampp/mysql/bin/mysqldump/ --routines -h {$server_name} -u {$username} -p{$password} {$database_name} > " . BACKUP_PATH . "{$date_string}_{$database_name}s.sql";

// exec($cmd);
// echo $cmd;

 // }

//Enter your database information here and the name of the backup file
// $mysqlDatabaseName ='testing';
// $mysqlUserName ='root';
// $mysqlPassword ='';
// $mysqlHostName ='localhost';
// $mysqlExportPath ='C:/Users/HP/Downloads/';

// //Please do not change the following points
// //Export of the database and output of the status
// $command='C:/xampp/mysql/bin/mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
// exec($command,$output=array(),$worked);
// switch($worked){
// case 0:
// echo 'The database <b>' .$mysqlDatabaseName .'</b> was successfully stored in the following path '.getcwd().'/' .$mysqlExportPath .'</b>';
// break;
// case 1:
// echo 'An error occurred when exporting <b>' .$mysqlDatabaseName .'</b> zu '.getcwd().'/' .$mysqlExportPath .'</b>';
// break;
// case 2:
// echo 'An export error has occurred, please check the following information: <br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
// break;
// }