<?php
session_start();

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
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $sname = mysqli_real_escape_string($db, $_POST['sname']);
  $studnum = mysqli_real_escape_string($db, $_POST['studnum']);
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

  $sql = "INSERT INTO accounts (account_username, account_email, account_password, account_firstname, account_surname, account_student_num) 
          VALUES('$username', '$email', '$password', '$fname', '$sname', '$studnum')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Successfully Registered, Wait for your account to Validate');
    window.location.href='../project';
    </script>";
  } else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
  }

  }
}
if (isset($_POST['loginbtn'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM accounts WHERE account_username='$username' AND account_password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      // $_SESSION['username'] = $username;
      // $_SESSION['success'] = "n";
      // header('location: index.php');
      //echo "<script>alert('You are now logged in');</script>";
      $row = $results->fetch_assoc();
      if($row['account_status'] == 1 ){
        $_SESSION['loggedIn'] = true;
        $_SESSION['id'] = $row['account_id'];
        $_SESSION['username'] = $row['account_username'];
        $_SESSION['firstname'] = ucwords($row['account_firstname']);
        $_SESSION['surname'] = ucwords($row['account_surname']);
        $_SESSION['desc'] = $row['account_desc'];
        $_SESSION['picture'] = $row['account_picture'];
        $_SESSION['age'] = $row['account_age'];
        $_SESSION['email'] = $row['account_email'];
        $_SESSION['type'] = $row['account_type'];
        $_SESSION['contact'] = $row['account_contactnum'];
        $_SESSION['leadership'] = $row['account_leadershipact'];
        $_SESSION['skills'] = $row['account_skills'];  
        //log process
        $action = 'Logged in';
       userlog($action, $_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type']);
        if($row['account_type'] == 'admin1'){
          echo "<script>window.location.href='profile.php';
            alert('you are admin')
      </script>";

      exit();
       }elseif ($row['account_type'] == 'admin2') {
      # code...
        if ($row['account_password'] == '0b911bfff3f0bf17a64c186b01730d83') {
          echo "<script>window.location.href='profile.php';
            alert('Change your password')
            </script>";
        }else{

        }
    
      }else{
        echo "<script>alert('gg');</script>";
      }
      


      }else{      
        echo "<script>alert('Your account is not yet validated or has been disabled');
      window.location.href='../project'
      </script>";

      }
      // header('profile.php');
      // header("location: profile.php");

    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
} 

if (isset($_POST['changepass'])) {
  $username = $_SESSION['username'];
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    // $query = "INSERT INTO accounts (account_username, account_email, account_passwor, account_firstname, account_surname, accounts_student_num) 
    //      VALUES('$username', '$email', '$password', '$fname', '$sname', '$studnum')";
    
  //  echo "<script>alert('walad sucess');</script>";
  // echo $query;
  $conn = new mysqli('localhost', 'root', '', 'testing');
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "UPDATE `accounts` SET `account_password` = '$password' WHERE `accounts`.`account_username` = '$username'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Successfully Update password');
    window.location.href='../project';
    </script>";
  } else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
  }

  }
}

function userlog($action){
  if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
    # code...
    $IP = $_SERVER["HTTP_CLIENT_IP"];
  }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    # code...
    //check for ip address proxy server
    $IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
  }else{
    $IP = $_SERVER["REMOTE_ADDR"];
  }

  $conn = new mysqli('localhost', 'root', '', 'testing');
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "INSERT INTO logs (log_usertype, log_username, log_firstname, log_surname, log_action, log_IP, log_time) 
          VALUES('".$_SESSION['type']."', '".$_SESSION['username']."', '".$_SESSION['firstname']."', '".$_SESSION['surname']."', '$action', '$IP'  , CURRENT_TIMESTAMP)";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('logs success');
    </script>";
  } else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
  }
}

function ipchecker(){
  // check for ip address shared internet
  if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
    # code...
    $IP = $_SERVER["HTTP_CLIENT_IP"];
  }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    # code...
    //check for ip address proxy server
    $IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
  }else{
    $IP = $_SERVER["REMOTE_ADDR"];
  }
}

