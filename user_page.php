<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";
session_start();
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);

if(isset($_SESSION["USERNAME"])){
$name =$_SESSION["USERNAME"];

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


	
}



//$image = $row['image'];

//$image_src = "upload/".$image;


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  
  
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
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
      <a class="navbar-brand" href="#">Blog</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
		
        <li><a href="#">Messages</a></li>
		 
      </ul>
	  
     
     <ul class="nav navbar-nav">
	 <li>
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
	  </li>
	  
     </ul>
	 
	  <ul class="nav navbar-nav navbar-right">
        <li>  <a href="logout.php">Logout
          <span class="glyphicon glyphicon-log-out"></span>
        </a></li>
      </ul>
	  
	  <ul class="nav navbar-nav navbar-right">
        <li><a href="edit.php">
          <span class="glyphicon glyphicon-wrench">Edit</span>
        </a></li>
      </ul>
	  <!--
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>   -->
      
    </div>
  </div>
</nav>



 
<div class="container-fluid">    
  <div class="row">
  
    <div class="col-sm-3 sidenav   text-center">
	
      <div class="well">
        <p><a href="#"><?php echo $name;?></a></p>
        <img src="<?=$row[0]?>" class="img-circle" height="100" width="100" alt="Upload-profile">
      </div>
	  
      <div class="well">
        <p><a href="#">Interests</a></p>
        <p>
          <span class="label label-default">News</span>
          <span class="label label-primary">Reading</span>
          <span class="label label-success">Wondering</span>
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Writing</span>
        </p>
      </div>
   <!--   <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Ey!</strong></p>
        People are looking at your profile. Find out who.
      </div>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>   -->
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
      <h5><span class="glyphicon glyphicon-time"></span><?php echo $time[0];?></h5>
      
	 
      <div class="row">
        <div class="col-sm-3">
          <div class="well text-center">
           
           <img src="<?=$row[0]?>" class="img-circle" height="100" width="100" alt="post-pic">
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
        <p>Upcoming Topic:</p>
        <button class="btn btn-primary">Info</button>
      </div>      
     
    </div>
   
	
	</div>
	</div>

 
</body>


</html>


<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"notification.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 /*
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });

 */
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
