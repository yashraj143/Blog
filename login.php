<?php

$con=mysqli_connect("localhost","root","")or
    die("Could not connect: " . mysql_error());
	session_start();
//Select Database
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());
	
if(isset($_POST['uname']) && !empty($_POST['uname'])  && isset($_POST['psw']) && !empty($_POST['psw'])){
  $username=$_POST['uname'];
  $password=$_POST['psw'];
  if($password!=NULL && $username!=NULL)
  {  
    $result=mysqli_query($con,"SELECT * FROM login WHERE username='$username' AND password='$password' ");
	$i1 = mysqli_num_rows($result);
    if($i1)
    {
		$_SESSION["USERNAME"] = $username;
		//echo "Successfully login". $_SESSION["USERNAME"];
	
		header("Location:user_page.php")or
		die("Could not select db: " . mysql_error());
    }
    else {
      echo '<script type="text/javascript">
           alert("Invalid userid or password");
          window.location.href = "main.php";
             </script>';
	  
    }
  }
}
else{
	echo '<script type="text/javascript">
           alert("Enter the userid or password");
          window.location.href = "main.php";
             </script>';
	
	
}
?>
