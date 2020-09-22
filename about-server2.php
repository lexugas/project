<?php
  // Create connection
$conn = new mysqli('localhost', 'root', '', 'testing');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    // sql to delete a record
    $sql = "DELETE FROM cpe_dept WHERE prof_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Record has been Deleted!');
        window.location.href='edit-faculty.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    }


}
if(isset($_POST["insert-img"]))  
 {
    $prof_id = $_POST['prof_id'];

    $prof_img = addslashes(file_get_contents($_FILES["save-image"]["tmp_name"]));  
    $sql = "UPDATE `cpe_dept` SET `prof_img` = '$prof_img' WHERE `cpe_dept`.`prof_id` = $prof_id ";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Record has been Updated!');
        window.location.href='edit-faculty.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    } 

 }  
if (isset($_POST['save'])){
    $prof_full_name = $_POST['prof_full_name'];
    $prof_bio = $_POST['prof_bio'];
    $prof_full_name = ucwords($prof_full_name);
    $prof_full_name = ucwords($prof_full_name);
    $sql = "INSERT INTO `cpe_dept` (`prof_full_name`, `prof_bio`) VALUES ('$prof_full_name', '$prof_bio')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Record has been Added!');
        window.location.href='edit-faculty.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    }

}


if (isset($_POST['update'])) {
    $prof_id = $_POST['prof_id'];
    $prof_full_name = $_POST['prof_full_name'];
    $prof_bio = $_POST['prof_bio'];
    $sql = "UPDATE `cpe_dept` SET `prof_full_name` = '$prof_full_name', `prof_bio` = '$prof_bio' WHERE `cpe_dept`.`prof_id` = $prof_id ";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Record has been Updated!');
        window.location.href='edit-faculty.php';
        </script>";
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error.'")</script>';
    }

   

     
    // if (mysqli_query($conn, $sql)) {
    //   $id = mysqli_insert_id($conn);
    //   $saved_comment = '<div class="col-6 m-auto" style="color:white">
    //   <button type="button" class="btn btn-outline-light float-right edit" data-id="'. $id.'" data-toggle="modal" data-target="#myModal3">edit</button><br>
    //                   <p class="display-cont" style="text-align: left; font-size: 1.8vw; object-fit: contain;">'.$mvcont.'</p>
    //                   </div>';
    //   echo $saved_comment;
    // }else {
    //   echo "Error: ". mysqli_error($conn);
    // }
    // exit();
}