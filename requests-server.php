<?php

include ('register-server.php');
$conn = new mysqli('localhost', 'root', '', 'testing');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $name = $_GET['name'];

    // sql to delete a record
    $sql = "DELETE FROM accounts WHERE account_id=$id";

    if ($conn->query($sql) === TRUE) {
        $action = 'Deleted the User '. $name;
        userlog($_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type'], $action);
        echo "<script>
        alert('Record has been Deleted!');
        window.location.href='requests.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    }


} 
if (isset($_GET['update'])){
    $id = $_GET['update'];
    $name = $_GET['name'];

    // sql to update a record
    $sql = "UPDATE `accounts` SET `account_status`= 1 WHERE `accounts`.`account_id` = $id ";

    if ($conn->query($sql) === TRUE) {
        $action = 'Approved the User '. $name;
        userlog($_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type'], $action);

        echo "<script>
        alert('the User can now log in!');
        window.location.href='requests.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    }


} 
if (isset($_GET['update1'])){
    $id = $_GET['update1'];
    $name = $_GET['name'];

    // sql to update a record
    $sql = "UPDATE `docs` SET `docs_status`= 1 WHERE `docs`.`docs_id` = $id ";

    if ($conn->query($sql) === TRUE) {
        $action = 'Accepts Project'. $name;
        userlog($_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type'], $action);
        echo "<script>
        alert('the Project has been accepted!');
        window.location.href='requests.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    }


} 

if (isset($_GET['delete2'])){
    $id = $_GET['delete2'];
    $name = $_GET['name'];

    // sql to delete a record
    $sql = "DELETE FROM projects WHERE docs_id=$id;
    DELETE FROM docs WHERE docs_id=$id;";

    // if ($conn->query($sql) === TRUE) {
    //     echo "<script>
    //     alert('Record has been Deleted!');
    //     window.location.href='requests.php';
    //     </script>";
    // } else {
    //     echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    // }
    if ($conn->multi_query($sql) === TRUE) {
        $action = 'Deleted Projejct '. $name;
        userlog($_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type'], $action);
        echo "<script>
        alert('Record has been Deleted!');
        window.location.href='requests.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
 ?>
