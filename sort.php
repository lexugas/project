<?php  
 //sort.php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 $output = '';  
 $usertype = $_GET["usertype"]; 
 $date = $_GET["date"]; 
 if($usertype == "All Users")  
 {  
      $order = "";  
 }  
 else  
 {  
      $order = "AND `log_usertype` = '$usertype'";  
 }  
 $query = "SELECT * FROM logs WHERE `log_time` BETWEEN  '".$date." 12:00:00' AND '".$date." 23:30:00'". $order. " ORDER BY log_time DESC";  
 $result = mysqli_query($connect, $query);  
 $output .= '<table class="table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Acount Type</th>
                <th>Username</th>
                <th>Name</th>
                <th>IP</th>
                <th>Action</th>
              </tr>
            </thead>';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '<tr>
                
                <td class="">'.date('Y/m/d',strtotime($row['log_time'])).'<br>'.date('H:i:s',strtotime($row['log_time'])).'
                     </td>
                <td class="">'.$row['log_usertype'].'</td>
                <td class="">'.$row['log_username'].'</td>
                <td class="">'.$row['log_firstname'].' '.$row['log_surname'].'</td>
                <td class="">'.$row['log_IP'].'</td>
                <td class="">'.$row['log_action'].'</td>
               
              </tr>';  
 }    

 $output .= '</table>';  

 echo $output;  
 ?>  