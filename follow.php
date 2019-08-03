

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

//echo "1";
if(isset($_POST["follower_name"]) && $_POST["follower_mail"] && isset($_SESSION["look"])){
$name =$_POST["follower_name"];
$mail =$_POST["follower_mail"];


$find = $_SESSION["look"]."_f";
$user_notify = $name."_n";
$_SESSION["main"] = $_SESSION["look"];
echo $_SESSION["look"];
echo $find;

//echo "2";

$sql = "select 1 from $find LIMIT 1";

$result = mysqli_query($conn,$sql);
if($result !== FALSE)
{
   //echo IT EXISTS!;
   $already_name = mysqli_query($conn,"SELECT * FROM $find WHERE f_name='$name'");
   $already_mail = mysqli_query($conn,"SELECT * FROM $find WHERE f_mail='$mail'");
   
   if($already_mail || $already_mail){
	   	
    if(mysqli_num_rows($already_name))
    {
		//echo "Username already taken!!!";
	
		//echo '<script type="text/javascript">alert("Username already taken!!!")</script>';
		echo '<script type="text/javascript">
           alert("Username is already subscribed!!!");
          window.location.href = "visit.php";
             </script>';
	
    }
	else if(mysqli_num_rows($already_mail)){
		//echo "Email registered!!!";
	
		//echo '<script type="text/javascript">alert("Username already taken!!!")</script>';
		echo '<script type="text/javascript">
           alert("Email is already subscribed !!!");
          window.location.href = "visit.php";
             </script>';
				
	}
	else{
		
		 $sql4 = "INSERT INTO $find (f_name, f_mail)
            VALUES ('$name', '$mail')";
			
			
			
			

      if (mysqli_query($conn, $sql4)) {
		  
		  
		  $check = "select 1 from $user_notify LIMIT 1";
		  $r_check = mysqli_query($conn,$check);
		  if($r_check!==FALSE){
			  
		  }
		  else{
		  
		   $sql6 = "CREATE TABLE $user_notify (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
               p_title VARCHAR(50) NOT NULL,
                  p_pic VARCHAR(50) NOT NULL,
				  pic_name VARCHAR(50) NOT NULL,
                   p_text TEXT(65534),
                   p_time VARCHAR(50),
                   author VARCHAR(50),
				   status INT(2))";
				   
				   
				   
				   if(mysqli_query($conn,$sql6)){
					   
					   
					   
					   
				   }else{
					   
					   echo "Error in notification table";
				   }
				   
		  }
		  
                        echo '<script type="text/javascript">
                              alert("Subscribed ");
                            window.location.href = "visit.php";
                              </script>';
		  
        }
		else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
		
		
	}
	   
   }
   else{
	   
		 $sql4 = "INSERT INTO $find (f_name, f_mail)
            VALUES ('$name', '$mail')";
			
			
			
			

      if (mysqli_query($conn, $sql4)) {
		  
		  
		  $check = "select 1 from $user_notify LIMIT 1";
		  $r_check = mysqli_query($conn,$check);
		  if($r_check!==FALSE){
			  
		  }
		  else{
		  
		   $sql6 = "CREATE TABLE $user_notify (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
               p_title VARCHAR(50) NOT NULL,
                  p_pic VARCHAR(50) NOT NULL,
				  pic_name VARCHAR(50) NOT NULL,
                   p_text TEXT(65534),
                   p_time VARCHAR(50),
                   author VARCHAR(50))";
				   
				   
				   
				   if(mysqli_query($conn,$sql6)){
					   
					   
					   
					   
				   }else{
					   
					   echo "Error in notification table";
				   }
				   
		  }
		  
                        echo '<script type="text/javascript">
                              alert("Subscribed ");
                            window.location.href = "visit.php";
                              </script>';
		  
        }
		else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
   }
   
		  
   
		 
}
else
{
    //echo error;.
	
	
   $sql2 = "CREATE TABLE $find (
     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
       f_name VARCHAR(50) NOT NULL,
      f_mail VARCHAR(50) NOT NULL)";
	  
	  if (mysqli_query($conn, $sql2)) {
          
		  $already_name = mysqli_query($conn,"SELECT * FROM $find WHERE f_name='$name'");
   $already_mail = mysqli_query($conn,"SELECT * FROM $find WHERE f_mail='$mail'");
   
   if($already_mail || $already_mail){
	   	
    if(mysqli_num_rows($already_name))
    {
		//echo "Username already taken!!!";
	
		//echo '<script type="text/javascript">alert("Username already taken!!!")</script>';
		echo '<script type="text/javascript">
           alert("Username is already subscribed!!!");
          window.location.href = "visit.php";
             </script>';
	
    }
	else if(mysqli_num_rows($already_mail)){
		//echo "Email registered!!!";
	
		//echo '<script type="text/javascript">alert("Username already taken!!!")</script>';
		echo '<script type="text/javascript">
           alert("Email is already subscribed !!!");
          window.location.href = "visit.php";
             </script>';
				
	}
	else{
		
		 $sql4 = "INSERT INTO $find (f_name, f_mail)
            VALUES ('$name', '$mail')";
			
			
			
			

      if (mysqli_query($conn, $sql4)) {
		  
		  
		  $check = "select 1 from $user_notify LIMIT 1";
		  $r_check = mysqli_query($conn,$check);
		  if($r_check!==FALSE){
			  
		  }
		  else{
		  
		   $sql6 = "CREATE TABLE $user_notify (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
               p_title VARCHAR(50) NOT NULL,
                  p_pic VARCHAR(50) NOT NULL,
				  pic_name VARCHAR(50) NOT NULL,
                   p_text TEXT(65534),
                   p_time VARCHAR(50),
                   author VARCHAR(50))";
				   
				   
				   
				   if(mysqli_query($conn,$sql6)){
					   
					   
					   
					   
				   }else{
					   
					   echo "Error in notification table";
				   }
				   
		  }
		  
                        echo '<script type="text/javascript">
                              alert("Subscribed ");
                            window.location.href = "visit.php";
                              </script>';
		  
        }
		else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
		
		
	}
	   
   }
   else{
	   
		 $sql4 = "INSERT INTO $find (f_name, f_mail)
            VALUES ('$name', '$mail')";
			
			
			
			

      if (mysqli_query($conn, $sql4)) {
		  
		  
		  $check = "select 1 from $user_notify LIMIT 1";
		  $r_check = mysqli_query($conn,$check);
		  if($r_check!==FALSE){
			  
		  }
		  else{
		  
		   $sql6 = "CREATE TABLE $user_notify (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
               p_title VARCHAR(50) NOT NULL,
                  p_pic VARCHAR(50) NOT NULL,
				  pic_name VARCHAR(50) NOT NULL,
                   p_text TEXT(65534),
                   p_time VARCHAR(50),
                   author VARCHAR(50))";
				   
				   
				   
				   if(mysqli_query($conn,$sql6)){
					   
					   
					   
					   
				   }else{
					   
					   echo "Error in notification table";
				   }
				   
		  }
		  
                        echo '<script type="text/javascript">
                              alert("Subscribed ");
                            window.location.href = "visit.php";
                              </script>';
		  
        }
		else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
   }
   
		  
        }
		else {
          echo "Error creating table: " . mysqli_error($conn);
         }
	
	
	
	
	
}


}
else{
	
	echo "LOL";
	
}



?>