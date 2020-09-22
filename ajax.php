<?php

session_start();
  ini_set('mysql.connect_timeout',300);
  ini_set('default_socket_timeout',300);
$mysqli = new mysqli('localhost','root','','testing') or die(mysqli_error($mysqli));
$update = false;



 	if ($_FILES["f1"]["tmp_name"] == '') {
 		echo "<script>
        alert('Please Select Image');

        </script>";
 

 	}else{
 		
      $file = addslashes(file_get_contents($_FILES["f1"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name) VALUES ('$file')";  
      if(mysqli_query($mysqli, $query))  
      {  
          echo "<script>
        alert('Image Inserted');
        </script>";  
      }  
  }
 