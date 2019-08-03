<?php


	session_start();
	if(isset($_SESSION["USERNAME"])){
		
		unset($_SESSION["USERNAME"]);
		
		
	}
	
    	echo '<script type="text/javascript">
           alert("Sucessfully Logout");
          window.location.href = "main.php";
             </script>';






?>