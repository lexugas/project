<?php
include ('register-server.php');
$action = 'Logout';
userlog($action, $_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type']);

session_destroy();
$_SESSION['loggedIn'] = false;
echo "<script>
      window.location.href='../project'
      </script>";