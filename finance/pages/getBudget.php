<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";//CHANGE THIS
$mysql_database = "acm";//CHANGE THIS
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");

//error_reporting(E_ALL);
           // ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);
$conn = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}
$flag=0; $sum=0;
//$termm = $_POST['s_term'];
//$syy = $_POST['s_sy'];
$quser=mysqli_query($conn,"select * from `school_year` where status=1");
// set variable
$hold=""; $charHold = "";
while($row=mysqli_fetch_array($quser)){
  $hold = $row['sy'];
  $charHold = substr($hold, -1);
  $hold = substr($hold, 0, -1);
}

$termm = $charHold;
$syy = $hold;
echo $termm, "***", $syy;
$result = mysqli_query($conn,"select * from transactions where term='$termm' && sy='$syy'");
while($row = mysqli_fetch_array($result)) {
    $amnt = $row['amount'];
    $sum = $sum+$amnt;
}
echo "<h3> Total Budget: ".$sum."</h3>";
$dif=0;
$result1 = mysqli_query($conn,"select * from expense where term='$termm' && sy='$syy'");
while($row1  = mysqli_fetch_array($result1)){
    $amnt1 = $row1['amount'];
    $dif = $dif+$amnt1;
}
echo "<h3>Total Expense: ".$dif."</h3>";
echo "<h3>Remaining Budget: ".($sum - $dif)."</h3>";

?>
