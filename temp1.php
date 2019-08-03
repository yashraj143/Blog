<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";
session_start();
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);


$flag1 = 0;
$flag2 = 0;
$sql = "select username from login";
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
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
</head>
<body>

<h2>Author Name</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<ul id="myUL">




<?php
	
	                         
$query = mysqli_query($conn,"SELECT id FROM login");
$check = mysqli_fetch_array($query);

//echo $check['id'];
if($check){
	$query2 = mysqli_query($conn,"SELECT id FROM login");
	
while($yas = mysqli_fetch_assoc($query2))
{
    $IDstore[] = $yas['id'];
	//echo $yas['id'];
	
	

if(1){
foreach($IDstore as $id){

$sql = "select username from login where id = $id";


$result = mysqli_query($conn,$sql);



if (!$result ) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}
	
	
while(($row = mysqli_fetch_array($result) )){
	?>
  <li><a href="blogs.php?var=<?php echo $row[0] ?>" target="i2"><?php echo $row[0]?></a></li>
  
  
      
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
  
  
  
</ul>

<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>
