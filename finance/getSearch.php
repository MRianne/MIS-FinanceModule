<?php 
$key=$_GET['key'];
$array = array();
$con=mysqli_connect("localhost","root","","finance");
$query=mysqli_query($con, "select * from academia where idno LIKE '%$key%'");
while($row=mysqli_fetch_assoc($query))
{
  $array[] = $row['idno'];
}
echo json_encode($array);
mysqli_close($con);                               
 ?>