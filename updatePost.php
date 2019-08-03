
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


if(isset($_SESSION["utable"])){
$name =$_SESSION["utable"];
}

$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);


$q = intval($_GET['q']);

$table= intval($_GET['table']);


if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql = "UPDATE $name SET public = '1'  WHERE id= '$q' " ;
$result = mysqli_query($conn,$sql);


if($result){
	//echo 'DONE';
	
}
else{
	
	echo mysqli_error($conn);
	$m = "hello";
	
	//phpAlert($m);
}
//echo $result['vote'];
//header('REFRESH:0; url:Competition.php');
mysqli_close($conn);
?>











































