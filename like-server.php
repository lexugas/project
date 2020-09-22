<?php 
include ('register-server.php');

$conn = mysqli_connect("localhost", "root", "", "testing");  

if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }

if (isset($_GET['like'])) {
  $id = $_GET['id'];
  $title = $_GET['title'];
  $likes = $_GET['likes'];

  $output = '';
  $like_query = "UPDATE docs 
  SET docs_like = docs_like + 1 
  WHERE docs_id = $id;";
  if ($conn->query($like_query) === TRUE) {
    // echo "New record created successfully";
    $likes++;
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
  $account_id = $_SESSION['id'];
  // echo $account_id;
  // $sql_project = "INSERT INTO `projects` (`author_id`, `docs_id`) VALUES ((SELECT authors.author_id FROM authors WHERE authors.author_firstname = '$fname[$y]' AND authors.author_surname = '$lname[$y]'), (SELECT docs.docs_id FROM docs WHERE docs.docs_title = '$title'));";
  // $sql_like = "INSERT INTO `likes` (`account_id`,`docs_id`) VALUES ('$account_id','$id')";
  // $result = mysqli_query($conn, $sql_like);   
  //  if($row = mysqli_fetch_array($result))  
  //  {  
  //       $output .= '
  //           <input type="text" id="like-id" style="display:none" name="like-id" value="$id">
  //           <input type="text" id="title" style="display:none" name="like-title" value="$title">
  //           <button type="submit" id="like" style="$style5" class="btn btn-outline-info" disabled name="like">Liked</button>
  //       ';  
  //  } else {
  //     echo "Error: ". mysqli_error($conn);
  //   }   
    $sql_like = "INSERT INTO `likes` (`account_id`,`docs_id`) VALUES ('$account_id','$id')";
 if ($conn->query($sql_like) === TRUE) {
    // echo "New record created successfully";
    $output .= '
            <input type="text" id="like-id" style="display:none" name="like-id" value="$id">
            <input type="text" id="title" style="display:none" name="like-title" value="$title">
            <button type="submit" id="like" style="$style5" class="btn btn-outline-info" disabled name="like">Liked</button><br>
            '.$likes.' likes
        ';
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}


   echo $output ;


$action = 'Liked '.$title;
userlog($action, $_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type']);
}


// if (isset($_GET['like'])) {
// 	$id = $_GET['like-id'];
//   $title = $_GET['like-title'];
//   $like_query = "UPDATE docs 
//   SET docs_like = docs_like + 1 
//   WHERE docs_id = $id;";
//   if ($conn->query($like_query) === TRUE) {
//     // echo "New record created successfully";
// } else {
//     echo "Error: " . $sql2 . "<br>" . $conn->error;
// }
// 	$account_id = $_SESSION['id'];
// 	// echo $account_id;
// 	// $sql_project = "INSERT INTO `projects` (`author_id`, `docs_id`) VALUES ((SELECT authors.author_id FROM authors WHERE authors.author_firstname = '$fname[$y]' AND authors.author_surname = '$lname[$y]'), (SELECT docs.docs_id FROM docs WHERE docs.docs_title = '$title'));";
// 	$sql_like = "INSERT INTO `likes` (`account_id`,`docs_id`) VALUES ('$account_id','$id')";
// 	if ($conn->query($sql_like) === TRUE) {
//     // echo "New record created successfully";
// } else {
//     echo "Error: " . $sql2 . "<br>" . $conn->error;
// }

// $action = 'Liked '.$title;
// userlog($action, $_SESSION['username'], $_SESSION['firstname'], $_SESSION['surname'], $_SESSION['type']);
// }
// 	 header("location:view.php?view=$id");
//    // echo "<script>window.close();</script>";

// }
