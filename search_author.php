<?php

$connect = mysqli_connect("localhost", "root", "", "blog");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM login 
  WHERE username LIKE '%".$search."%'
  OR email LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM login ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" id="ans">
   <table class="table table bordered">
    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td><a href="visit.php?name='.$row["username"].'">'.$row["username"].'</a></td>
    <td><a href="visit.php?name='.$row["username"].'">'.$row["email"].'</a></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>