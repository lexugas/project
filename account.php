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
    $style5 = 'display:none';
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
    <nav class="navbar  navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="cpeplogo.png"></a>
        <form class="form-inline my-2 my-lg-0">
          <div class="btn-group" role="group" aria-label="Basic example" style="<?php echo $style2; ?>" >
              <button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#myModal1" style="border-right: 1.1px solid white">LOGIN</button>
              <a href="register.php" class="btn btn-dark" role="button" style="border-left: 1.1px solid white; color: white;">SIGNUP</a>
            </div>
              <a href="logout.php" class="btn btn-dark" role="button" style=" <?php echo $style1; ?> " >Log Out</a>

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
        <input id="searchkey" class="form-control mr-sm-2"  type="text" name="searchkey" placeholder="Search..." aria-label="Search">
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
                <!-- The Modal -->
          <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">SEARCH</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      <div class="jumbotron">
                        <span>Enter your keyword</span>
                        <form class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                        </form> 
                          <form action="/action_page.php">
                            <div class="form-check">
                              <label class="form-check-label" for="radio1">
                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Title
                              </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label" for="radio2">
                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Author
                              </label>
                            </div>
                          </form>            
                      </div>
                    </div>                                  
                  </div>
                </div>
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
              <div class="container jumbotron">
                
              
<?php 


    // Create connection
$conn = new mysqli('localhost', 'root', '', 'testing');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully<br>";
if (isset($_GET['account'])){
$id = $_GET['account'];
$sql = "SELECT * FROM accounts WHERE account_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
    
?>
<div class="row"><br>
          <div class="col-3 p-0">
            <?php 
            if ($row['account_picture'] == '') {
              $row['account_picture'] = file_get_contents('profile.jpg');
            }
            echo '
            <div class = "img-edit">
            <img src="data:image/jpeg;base64,'.base64_encode($row['account_picture']).'" class="image" height="auto" width="100%" style="object-fit: contain;">
            
            </div>';
            ?>
          </div>
          <div class="col-9">
            
            <h1><?php echo $row['account_firstname'].'&nbsp;'.$row['account_surname']; ?></h1>
            <hr>
            <br>
            <label>Email:</label>
            <p><?php echo $row['account_email']; ?></p><hr>
            <label>Contact No.:</label>
            <p id="contact-display"><?php echo $row['account_contactnum']; ?></p><hr>
            <label>OBJECTIVE:</label>
            <p id="desc-display"><?php echo $row['account_desc']; ?></p><hr>
            <label>LEADERSHIP ACTIVITIES:</label>
            <p id="leadership-display"><?php echo $row['account_leadershipact']; ?></p><hr>
            <label>SKILLS:</label>
            <p id="desc-display"><?php echo $row['account_skills']; ?></p><hr>
<!--  style="border: 2px solid red" -->
          </div>
        </div>
        <?php 
          }
} else {
    echo "0 results";
}
}
         ?>
         <a name="back" href="<?php echo $_SERVER['HTTP_REFERER'] ?>">back</a>
      </div>
      
    </body>
</html>
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
