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


}

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editing....</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  <script>
  function preview0(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_pic')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	
	 


</script>
  
  <style>
.btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
}

.btn:hover {
    background-color: RoyalBlue;
}

div.pre {
    position: absolute;
    top: 400px;
    right: 420px;
    width: 200px;
    height: 250px;
    border: 0px solid #73AD21;
}


input[type=file]{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}

input[type=text] {
    background-color: #ffff99;
    
	
	width: 25%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
}

textarea{
resize:none;
width:330px;
height:150px;
padding:5px;
margin:20px 0 10px;
border-radius:5px;
border:4px solid #acbfa5
}

</style>



  
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
	  <a class= "navbar-brand" href="user_page.php">
          <span class="glyphicon glyphicon-arrow-left"></span>
        </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#"><?php echo $name;?></a></li>
      
      <li><a href="#profile">Profile</a></li>
      <li><a href="#Post">Post</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
 <div style="height:500px;">
 
<div class="container" id="profie">
  <h3>Profile Upload</h3>
  <hr>
  <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
  <input  type="file" onchange="preview0(this);" name = "file">
   <div class="pre">
  <img src="#" id = "profile_pic" height="200" alt="Image preview..." height ="150px" width='150px'><br><br>
  </diV>
  <input class="btn" type="submit" value="submit">
  </form>
</div>

</div>


<div class="container" id="Post">
  <h3>Post Upload</h3>
  <hr>
  <form action="upload_post.php" method="POST" enctype="multipart/form-data">
  <input type = "Text" name="p_title" required><br>
  <input  type="file" onchange="preview0(this)" name = "file">
   
  <textarea rows="4" cols="50" name="p_text" >...</textarea><br>
  <input class="btn" type="submit" value="submit">
  <form>
</div>

</body>
</html>
