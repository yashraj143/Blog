<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";
session_start();
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
 <link rel="stylesheet" href="sign_login.css">
 <link rel="stylesheet" href="search_author_style.css">
 <script>
 
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
 </script>
 
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Explore Your Knowledge</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Blog</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
       <!-- <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li> -->
		  
		  <li><a href="#"  onclick="openNav()"><span class="glyphicon glyphicon-search"></span> Search Author</a></li>
      </ul>
	 
      <ul class="nav navbar-nav navbar-right">
	       <li><a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-user"></span> Make an Account</a></li>
	      <li><a href="#" onclick="document.getElementById('id02').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
 <?php
  
 $flag1 = 0;
$flag2 = 0;
$sql0 = "select username from login";
$result0 = mysqli_query($conn,$sql0);

if (!$result0) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$public = '1';
//$row = mysqli_fetch_array($result);
	
while($yas = mysqli_fetch_assoc($result0))
{
    $IDstore[] = $yas['username'];
	// echo $yas['username'];
	
foreach($IDstore as $id){

$sql = "select p_pic from $id where public = $public";
$sql2="select pic_name from $id where public=$public";
$sql3="select p_title from $id where public=$public";
$sql4="select p_text from $id where public=$public";
$sql5="select p_time from $id where public=$public";


$result = mysqli_query($conn,$sql);
$result2=mysqli_query($conn,$sql2);
$result3=mysqli_query($conn,$sql3);

$result4=mysqli_query($conn,$sql4);

$result5=mysqli_query($conn,$sql5);



if (!$result || !$result2 || !$result3 || !$result4 || !$result5) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}
	
	
while(($row = mysqli_fetch_array($result) )&& ($pic = mysqli_fetch_array($result2)) && ($title = mysqli_fetch_array($result3))&& ($txt = mysqli_fetch_array($result4)) && ($time = mysqli_fetch_array($result5))){
	?>
  
  
  
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $title[0];?></div>
        <div class="panel-body"><img src="<?=$row[0]?>" class="img-responsive" style="width:100%;height:250px" alt="Image"></div>
        <div class="panel-footer" style="height:200px;overflow-y: scroll"><?php echo $txt[0];  ?></div>
      </div>
	   <div class="panel panel-success">
        <div class="panel-heading"><a href="visit.php?name=<?php echo $id ?>"><?php echo $id; ?></a></div>
      </div>
    </div>
    
	
	<?php
	
}
}


	
	
	
	?>
 
 
 
 
  </div>
</div>

<br>

<br><br>















































<footer class="container-fluid text-center">
  <p>Online Write Copyright</p>  
  <form class="form-inline">Get Benefit:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Subscibe</button>
  </form>
</footer>



<!--SignUp model-->


<div id="id01" class="modal1">
  
  <form name = "myform" class="modal1-content animate" onsubmit="return validate()" action="signup.php" method = "post" style = "width:50%; height:90%" >
   

    <div class="containe">
	   <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
	  
      <span id="s1"><label><b>Username</b></label></span>
      <input type="text" placeholder="Enter Name" name="name" required><br>
	  
      <span id="s1"><label><b>Email</b></label></span>
      <input type="text" placeholder="Enter Email" name="email" onblur="validateEmail(this);" required><br>

      <span id="s1"><label><b>Password</b></label></span>
      <input type="password" placeholder="Enter Password" name="password" required><br>

      <span id="s1"><label><b>Repeat-Password</b></label></span>
      <input type="password" placeholder="Repeat Password" name="repeatpwd" required><br>
      
      

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        
		<div>
		<button type="submit" class="signupbtn" value= "submit">Sign Up</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        
      </div>
      
    </div> 
    
  </form>
</div>

<!-- Login Button-->


<div id="id02" class="modal2">
  
  <form class="modal2-content animate" action="login.php" method="post" style = "width:55%; height:61%">
   

    <div class="containe">
	<h1>Login</h1>
      <p>Enter the Details.</p>
      <hr>
       <span id="s1"><label><b>Username</b></label></span>
      <input type="text" placeholder="Enter Username" name="uname" required style = "width:40% ; margin: 10px 0px;"><br>

       <span id="s1"><label><b>Password</b></label></span>
      <input type="password" placeholder="Enter Password" name="psw" required  style = "width:40% ; margin: 10px 0px;"><br>
        
      
      
    </div>

    
	  <div>
	     <button type="submit" class="signupbtn" value="submit">Login</button>
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
		
      <span class="forget">Forgot <a href="#">password?</a></span>
      </div>
    
  </form>
</div>


<!-- Search Author -->

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <div class="container">
   <br />
   <h2 align="center">Read Following Author</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Name or Email" class="form-control" />
	 
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
  </div>
</div>


</body>
<script>

 

var modal1 = document.getElementById('id01');
var modal2 = document.getElementById('id02');


window.onclick = function(event) {
    if (event.target == modal1 || event.target == modal2 ) {
        modal1.style.display = "none";
		modal2.style.display = "none";
    }
}



$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search_author.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

</script>
</html>