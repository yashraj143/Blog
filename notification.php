<?php
//fetch.php;
session_start();
if(isset($_SESSION["USERNAME"])){
$name =$_SESSION["USERNAME"];

$user_n = $name."_n";

if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE $user_n SET status=1 WHERE status=0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM $user_n ORDER BY p_time DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong><a href="visit.php?name='.$row["author"].'">'.$row["author"].'</a></strong><br />
     <small><em>'.$row["p_title"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM $user_n WHERE status=0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}

}
?>
