<?php 

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("Located at' . $msg . '")

    </script>';
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";
session_start();
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);

if(isset($_GET['name'])){
$name = $_GET['name'];
}
else{
	$name = $_SESSION['main'];
}
$_SESSION["look"] = $name;

$flag1 = 0;
$flag2 = 0;
$sql = "select profile from profile where name ='$name' ";
$result = mysqli_query($conn,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}


$row = mysqli_fetch_array($result);

if(!$row){
	$flag1 = 1;
}


	




//$image = $row['image'];

//$image_src = "upload/".$image;


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
  <script>
 
function validate()
{



var mail = document.myform.follower_mail.value;
  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(mail) == false) 
        {
            window.alert('Invalid Email Address');
            return false;
        }

}


 </script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
  
 <link rel="stylesheet" href="sign_login.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="main.php">Blog</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
        <li> </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
      
    </div>
  </div>
</nav>



 
<div class="container-fluid">    
  <div class="row">
  
    <div class="col-sm-3 sidenav   text-center">
	
      <div class="well">
        <p><a href="#"><?php echo $name; ?></a></p>
        <img src="<?=$row[0]?>" class="img-circle" height="100" width="100" alt="Avatar">
      </div>
	  
      <div class="well">
        <p><a href="#">Interests</a></p>
        <p>
          <span class="label label-default">News</span>
          <span class="label label-primary">W3Schools</span>
          <span class="label label-success">Labels</span>
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Friends</span>
        </p>
      </div>
      
       <p><a onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Folllow</a></p>
      <p><a href="#">Link</a></p>
      
    </div>
 
 
    
    <div class="col-sm-7
	">
    <h4><small>RECENT POSTS</small></h4>
	
	
<?php
	
	                         
$query = mysqli_query($conn,"SELECT id FROM $name");
$check = mysqli_fetch_array($query);

//echo $check['id'];
if($check){
	$query2 = mysqli_query($conn,"SELECT id FROM $name");
	
while($yas = mysqli_fetch_assoc($query2))
{
    $IDstore[] = $yas['id'];
	//echo $yas['id'];
	
	

if(1){
foreach($IDstore as $id){


$sql = "select p_pic from $name where id = $id";
$sql2="select pic_name from $name where id=$id";
$sql3="select p_title from $name where id=$id";
$sql4="select p_text from $name where id=$id";
$sql5="select p_time from $name where id=$id";


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
	
	
	
      <hr>
      <h2><?php echo $title[0];?></h2>
	 
      <div class="row">
        <div class="col-sm-3">
          <div class="well text-center">
           
           <img src="<?=$row[0]?>" class="img-circle" height="100" width="100" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p><?php echo $txt[0];  ?></p>
          </div>
        </div>
      </div>

	  
      <br><br>
      
<?php
}
}	else{
	echo mysqli_error($conn);
	
}
}
}



else{
	echo mysqli_error($conn);
	//echo "error2";
	
}


?>

      <h4>Leave a Comment:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      </div>
 

   <br><br>
   <div class="col-sm-2 well">
      <div class="thumbnail">
        <p> Topic:</p>
        <button class="btn btn-primary">Info</button>
      </div>      
     
    </div>
   
	
	</div>
	</div>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<!-- foloowing Button-->


<div id="id02" class="modal2">
  
  <form name = "myform" class="modal2-content animate" onsubmit="return validate()" action="follow.php" method="post" style = "width:55%; height:61%">
   

    <div class="containe">
	<h1>Follow</h1>
      <p>Enter the Details.</p>
      <hr>
       <span id="s1"><label><b>Username</b></label></span>
      <input type="text" placeholder="Enter Username" name="follower_name" required style = "width:40% ; margin: 10px 0px;"><br>

       <span id="s1"><label><b>Email</b></label></span>
      <input type="mail" placeholder="Enter Email" name="follower_mail" required  style = "width:40% ; margin: 10px 0px;"><br>
        
      
      
    </div>

    
	  <div>
	     <button type="submit" class="signupbtn" value="submit">Follow</button>
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
		
      </div>
    
  </form>
</div>
 
</body>



<script>

var modal2 = document.getElementById('id02');


window.onclick = function(event) {
    if (event.target == modal2 ) {
        
		modal2.style.display = "none";
    }
}
</script>

</html>