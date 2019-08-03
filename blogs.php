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
  <title></title>
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
  <script>       
  
 function update(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
	  document.getElementById("btn_click"+str).innerHTML = "Done";
    }
  }
  
  
   xmlhttp.open("GET","updatePost.php?q="+str + "&table=" + name,true);
  xmlhttp.send();
}
  
  
  
  
  </script>
</head>





  <div class="col-sm-7
	">
    <h4><small>RECENT POSTS</small></h4>
	
	
<?php

   if(isset($_GET['var'])){
	   
    $var = $_GET['var'];
	$_SESSION["utable"] = $var;
	echo $var;
	$name = $var;
	
	                         
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

$sql0 = "select id from $name where id = $id";
$sql = "select p_pic from $name where id = $id";
$sql2="select pic_name from $name where id=$id";
$sql3="select p_title from $name where id=$id";
$sql4="select p_text from $name where id=$id";
$sql5="select p_time from $name where id=$id";

$sql6="select public from $name where id=$id";



$result0 = mysqli_query($conn,$sql0);
$result = mysqli_query($conn,$sql);
$result2=mysqli_query($conn,$sql2);
$result3=mysqli_query($conn,$sql3);

$result4=mysqli_query($conn,$sql4);

$result5=mysqli_query($conn,$sql5);
$result6=mysqli_query($conn,$sql6);



if (!$result0 || !$result || !$result2 || !$result3 || !$result4 || !$result5 || !$result6) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}
	
	
while(($row0 = mysqli_fetch_array($result0)) && ($row = mysqli_fetch_array($result) )&& ($pic = mysqli_fetch_array($result2)) && ($title = mysqli_fetch_array($result3))&& 
($txt = mysqli_fetch_array($result4)) && ($time = mysqli_fetch_array($result5)) && ($public = mysqli_fetch_array($result6))){
	?>
	
	
	
      <hr>
      <h2><?php echo $title[0];?></h2>
      <h5><span class="glyphicon glyphicon-time"></span><?php echo $time[0];?></h5>
      <h5><span class="label label-danger"></span> <span class="label label-primary"></span></h5><br>
	 
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
      <br>
	  <div id="txtHint">
	  <!--	<p  id= "<?php $row0[0] ?>">  </p>  -->
        <?php
             if($public[0] == 0){
         			echo '<button  id= "btn_click"'.$row0[0].'"  value = "'.$row0[0].'" onclick = "update(this.value)" >Public</button>';
			 }
			 else{
				echo '<button  id= "btn_click"  value = "'.$row0[0].'" onclick = "update(this.value)"   >Done</button>';
			 } ?>
	  
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

   }

?>

</html>