<html>

<?php

$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";


mysqli_select_db($conn,"blog");
// Form Variable

$fname = $_POST['name'];
$mail = $_POST['email'];
$pass = $_POST['password'];

echo  $fname;
echo $mail;
echo $pass;

//---------------------------------------------------



//$flag=0;
 if($fname!=NULL )
 {  
   // $check = "SELECT userid FROM reg WHERE userid='$use')";
	$result=mysqli_query($conn,"SELECT * FROM login WHERE email='$mail'");
	$result1=mysqli_query($conn,"SELECT * FROM login WHERE username='$fname'");
	
	if($result && $result1){
		
    if(mysqli_num_rows($result1))
    {
		//echo "Username already taken!!!";
	
		//echo '<script type="text/javascript">alert("Username already taken!!!")</script>';
		echo '<script type="text/javascript">
           alert("Username is already Taken!!!");
          window.location.href = "main.php";
             </script>';
	
    }
	else if(mysqli_num_rows($result)){
		//echo "Email registered!!!";
	
		//echo '<script type="text/javascript">alert("Username already taken!!!")</script>';
		echo '<script type="text/javascript">
           alert("Email is already Registred !!!");
          window.location.href = "main.php";
             </script>';
		
		
		
		
		
	}
    else {
		
      //echo '<script type="text/javascript">alert("Invalid Username or Password!!!")</script>';
	$sql = "INSERT INTO login (username, email ,password)   
         VALUES ('$fname','$mail','$pass')";
		 
		 
	   if ($conn->query($sql) === TRUE) {
		   
		    $sql = "CREATE TABLE $fname (
     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
       p_title VARCHAR(50) NOT NULL,
      p_pic VARCHAR(50) NOT NULL,
	  pic_name VARCHAR(50) NOT NULL,
       p_text TEXT(65534),
       p_time VARCHAR(50) NOT NULL,
	   public INT(2) 
         )";
		 if (mysqli_query($conn, $sql)) {
          echo "Table MyGuests created successfully";
        } else {
          echo "Error creating table: " . mysqli_error($conn);
         }
		   
		   echo '<script type="text/javascript">
           alert("Registration  Successfully");
          window.location.href = "main.php";
             </script>';   
	//echo "Login ID : " .$use;}
	}
 }
 }
    else {
      
$sql = "INSERT INTO login (username, email, password)
VALUES ('$fname', '$mail', '$pass')";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">
           alert("Registration  Successfully");
          window.location.href = "main.php";
             </script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
 }
 }
 else{ echo "Not done 2";}
?>

</html>