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
$term=$sy=0;
while($row=mysqli_fetch_array($quser)){
  $term = $row['term'];
  $sy = $row['sy'];
}

$result = mysqli_query($conn,"select * from transactions where term='$term' AND sy='$sy'");
while($row = mysqli_fetch_array($result)) {
  $amnt = $row['amount'];
  $sum = $sum+$amnt;
}

$dif=0;
$amnt1=0;
$result1 = mysqli_query($conn,"select * from expense where term='$term' AND sy='$sy'");
while($row1  = mysqli_fetch_array($result1)){
  $amnt1 = $row1['amount'];
  $dif = $dif+$amnt1;
}/*
if (mysqli_num_rows($result1) > 0) {
echo 'User name exists in the table.';
} else {
echo 'User name does not exist in the table.';
}*/
?>
<div style="overflow-x:auto;">
  <table style="width:100%">
    <th>
      <td> <b>Total Budget</b> </td>
      <td> <b>Total Expense</b> </td>
      <td> <b>Remaining Budget</b> </td>
    </th>
    <tr>
      <td> <?php echo $sum; ?> </td>
      <td> <?php echo $dif; ?> </td>
      <td> <?php echo ($sum - $dif); ?> </td>
    </tr>
  </table>
</div>
<?php




?>
