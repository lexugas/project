<?php
  // Create connection
$conn = new mysqli('localhost', 'root', '', 'testing');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $mvcont = $_POST['mvcont'];
    $sql = "UPDATE mv SET mvcont='{$mvcont}' WHERE id=".$id;
    if (mysqli_query($conn, $sql)) {
      $id = mysqli_insert_id($conn);
      $saved_comment = '<div class="col-6 m-auto" style="color:white">
      <button type="button" class="btn btn-outline-light float-right edit" data-id="'. $id.'" data-toggle="modal" data-target="#myModal3">edit</button><br>
                      <p class="display-cont" style="text-align: left; font-size: 1.8vw; object-fit: contain;">'.$mvcont.'</p>
                      </div>';
      echo $saved_comment;
    }else {
      echo "Error: ". mysqli_error($conn);
    }
    exit();
}








  	
//   	if (mysqli_query($conn, $sql)) {
//   		$id = mysqli_insert_id($conn);
//   		$saved_mvcont = '<button type="button" class="btn btn-outline-dark float-right update_btn" data-id="' . $id . '" data-toggle="modal" data-target="#myModal3">edit</button><br>
// <p class="display-cont" style="text-align: left; font-size: 1.8vw; object-fit: contain;">' . $mvcont . '</p>';
//   	  echo $saved_mvcont;
  	// }else {
  	//   echo "Error: ". mysqli_error($conn);
  	// }
  	// exit();
  


// $mission = ''




  // Retrieve comments from database
  // $sql = "SELECT * FROM mv WHERE id = 1";
  // $result = mysqli_query($conn, $sql);
  // $comments = '<div id="display_area">'; 
  // while ($row = mysqli_fetch_array($result)) {
  // 	$comments .= '<div class="comment_box">
  // 		  <span class="delete" data-id="' . $row['id'] . '" >delete</span>
  // 		  <span class="edit" data-id="' . $row['id'] . '">edit</span>
  // 		  <div class="display_name">'. $row['name'] .'</div>
  // 		  <div class="comment_text">'. $row['comment'] .'</div>
  // 	  </div>';
  // }
  // $comments .= '</div>';
?>

<!-- <button type="button" class="btn btn-outline-dark float-right" data-toggle="modal" data-target="#myModal3">edit</button><br>
<p class="" style="text-align: left; font-size: 1.8vw; object-fit: contain;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->