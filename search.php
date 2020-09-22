<?php 
  include ('register-server.php');
  if(isset($_SESSION['loggedIn'])){

    if($_SESSION['loggedIn'] == true){
      $style1 = ''; 
      $style2 = 'display:none'; 
    }elseif($_SESSION['loggedIn'] == false){
      $style1 = 'display:none'; 
      $style2 = ''; 

    }
    if($_SESSION['type'] == 'admin1'){
      $style5;
    } elseif($_SESSION['type'] == 'admin2'){
      $style4 = 'display:none';
    }else{
      $style3 = 'display:none';
      $style4 = 'display:none';
    }
  
}else{
  $style1 = 'display:none'; 
  $style2 = ''; 
  $style3 = 'display:none';
  $style4 = 'display:none';
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Projects</title>
  <style type="text/css">
    .bord {border:1px solid black;}
  </style>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="popper.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
  <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="about-scripts.js"></script>
</head>
<body>
  <?php require_once 'process.php';
  include('about-server.php');
  include('about-server2.php');
   ?> 
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="cpeplogo.png"></a>
    <form class="form-inline my-2 my-lg-0">
        <div class="btn-group" role="group" aria-label="Basic example" style="<?php echo $style2; ?>">
        <button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#myModal1" style="border-right: 1.1px solid white">LOGIN</button>
        <a href="register.php" class="btn btn-dark" role="button" style="border-left: 1.1px solid white; color: white;">SIGNUP</a>
      </div>
        <a href="logout.php" class="btn btn-dark" role="button" style="<?php echo $style1; ?>">Log Out</a>

      </form>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link btn btn-info" href="../project">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link btn btn-info" href="about.php">ABOUT</a>
        </li>

        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle btn btn-info" ondblclick="window.location='project.php'" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            PROJECT
          </a>
          <div class="dropdown-menu bg-info text-white" aria-labelledby="navbarDropdown">
            <a class="dropdown-item bg-info text-white" href="project.php?softeng">SOFTWARE ENGINEERING</a>
            <a class="dropdown-item bg-info text-white" href="project.php?microp">MICROPROCCESOR</a>
            <a class="dropdown-item bg-info text-white" href="project.php?pd">PROJECT DESIGN</a>
          </div>
        </li>
        <li class="nav-item active">
          <a class="nav-link btn btn-info" href="profile.php" style="<?php echo $style1; ?>" style="display: block" >PROFILE</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link btn btn-info" href="requests.php" style="<?php echo $style3; ?>">REQUESTS</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link btn btn-info" href="admin.php" style="<?php echo $style4; ?>">ADMINS</a>
        </li>
      </ul>
      

    </div>
    <form class="form-inline float-right" action="search.php" method="GET">
        <input id="searchkey" class="form-control mr-sm-2"  type="text" name="searchkey" value="<?php echo $_GET['searchkey']; ?>" placeholder="Search..." aria-label="Search">
      <select class="form-control mr-sm-2" name="catalog">
        <option class="form-control" value="projects">Projects</option>
        <option class="form-control" value="authors">Authors</option>
      </select>
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit" id="btnsearch" name="btnsearch">Search</button>
        <script type="text/javascript">
          $(document).ready(function(){
              $('#btnsearch').click(function(){  
                var searchkey = $('#searchkey').val().trim();  
               if(searchkey == '')  
               {  
                 return false;  
              }  
           }); 
          });

        </script>
      </form>
  </nav>
  <div class="container">
    <div class=""></div>
  </div>

        
      </div>
      <!-- The Modal -->
        <div class="modal fade" id="myModal1">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
               
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                 <h4 class="text-center font-weight-bold">Log Into your Account</h4><br>
                 <div class="container">
                  <form action="login.php" method="POST">
              <?php include ('errors.php');?>
                  <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><img src="user.png"></span>
                    </div>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="">
                  </div>
              <br>
              
                  <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> &nbsp; <img src="pass.png"> &nbsp;</span>
                    </div>
                    <input type="password" name="password" class="form-control"  placeholder = "Password" value="">
                  </div>
                  <center><button type="submit" name="loginbtn" class="btn btn-info" style="border-radius: 50px"> &nbsp; &nbsp;LOGIN &nbsp; &nbsp;</button></center>  
              </form>
              <br>  
                                          
                 </div>
              </div>
              
            </div>
          </div>
        </div>
        
      </div><br>
        <div class="container jumbotron">
          
        
<?php 
  // Create connection

$db = mysqli_connect('localhost', 'root', '', 'testing');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  // connect to database
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'testing');
// define how many results you want per page
$results_per_page = 10;
// find out the number of results stored in database
$sql='SELECT * FROM docs';
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

if (isset($_GET['btnsearch'])){
  $search = mysqli_real_escape_string($db, trim($_GET['searchkey']));
  $catalog = $_GET['catalog'];
  ?>
  <!-- <select class="form-control mr-sm-2" name="course" style="<?php echo $hide;?>">
        <option class="form-control" value="all">All</option>
        <option class="form-control" value="software engineering">Software Engineering</option>
        <option class="form-control" value="micro processor">Micro Processor</option>
        <option class="form-control" value="project design">Project Design</option>
      </select><br> -->
  <?php
  // $course = $_POST['course'];
  // if ($course == 'software engineering') {
  //   $filter = 'docs_type1 = Software Engineering';
  // }elseif ($course == 'micro processor') {
  //   $filter = 'docs_type1 = Micro Processor';
  // }elseif ($course == 'project design') {
  //   $filter = 'docs_type1 = Project Design';
  // }else{
  //   $filter = '';
  // }
  if ($catalog == 'projects') {
    $hide = '';
    $search_query = "SELECT * FROM `docs` WHERE `docs_abstract` LIKE '%$search%' OR `docs_title` LIKE '%$search%' ORDER BY docs_title ASC LIMIT " . $this_page_first_result . "," .  $results_per_page;
      $result1 = $conn->query($search_query);

      if ($result1->num_rows > 0) {
          // output data of each row
          while($row1 = $result1->fetch_assoc()) {
              echo '
              <a href="view.php?view='. $row1["docs_id"].'" style="font-size: 1.5vw;">'.str_replace($search,'<b>'.$search.'</b>', $row1["docs_title"]).'</a><br>
               <p>'.str_replace($search,'<b>'.$search.'</b>', substr($row1["docs_abstract"], 0, 200)). '...</p><br>
              ';

          }
      } else {
          echo "0 results";
      }
    }elseif($catalog == 'authors'){
    $hide = 'display:none;';

    $search_query = "SELECT * FROM `authors` WHERE `author_firstname` LIKE '%$search%' OR `author_surname` LIKE '%$search%' LIMIT 10";
      $result1 = $conn->query($search_query);

      if ($result1->num_rows > 0) {
          // output data of each row
          while($row1 = $result1->fetch_assoc()) {
              echo '
              <a href="#"" style="font-size: 1.5vw;">'.$row1["author_firstname"]. "&nbsp;".  $row1["author_surname"]. '</a><br>
              ';
              $sql1 = "SELECT docs.docs_id, docs.docs_title FROM docs JOIN projects ON projects.docs_id = docs.docs_id JOIN authors on authors.author_id = projects.author_id WHERE authors.author_firstname = '". $row1['author_firstname']."' AND authors.author_surname ='".$row1['author_surname']."'";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                // output data of each row
                echo "&nbsp;&nbsp;&nbsp;";

                while($row1 = $result1->fetch_assoc()) {
                    echo '<a href="view.php?view='. $row1["docs_id"].'">'.$row1["docs_title"].'</a>&nbsp;';
                }
                echo "<br><br>";
            } else {
                echo "0 results";
            }

          }
      } else {
          echo "0 results";
      }
    }
  for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="search.php?searchkey='.$search.'&catalog='.$catalog.'&btnsearch=&page=' . $page . '">' . $page . '</a> ';
  }
}
  
  


// echo "Connected successfully<br>";


// $sql1 = "SELECT authors.author_firstname, authors.author_surname FROM authors JOIN projects ON projects.author_id = authors.author_id JOIN docs on docs.docs_id = projects.docs_id";
// $result1 = $conn->query($sql1);

// if ($result1->num_rows > 0) {
//     // output data of each row
//     while($row1 = $result1->fetch_assoc()) {
//         echo $row1["author_firstname"]. "&nbsp;".  $row1["author_surname"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }

?>
</div>

</body>
</html>

<script >
$(function(){
    var $select = $(".1-10");
    for (i=1;i<=10;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
})
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.1-10').change(function(){
    // $('#mySelectOption').text($('.1-10').val());
    var text = "";
    var i = 1;
    while ($('.1-10').val() >= i) {
      text += '<br><label>Author '+i+'</label><br><input type="text" name="f-author'+i+'" placeholder="First Name"></input><input name="l-author'+i+'" type="text" placeholder="Last Name"></input><br>';
      i++;
    }
    document.getElementById("demo").innerHTML = text;
    console.log('hello');
  });
    

  });

</script>
