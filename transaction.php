<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";//CHANGE THIS
$mysql_database = "finance";//CHANGE THIS
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");

error_reporting(E_ERROR | E_PARSE);
$conn = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_POST['sub'])){
    //  echo "insert";
    //inserts transactions  only
$type_slct = $_POST['type_slct'];
$term_slct = $_POST['term_slct'];
//$sy_slct = $_POST['sy_slct'];
$remarks = $_POST['remarks'];
$studid = $_POST['studid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$feeDep = $_POST['feeDep'];

$insert_q = "INSERT INTO transactions (type_id,amount,term,sy,remarks) "
                . "VALUES ($type_slct,$feeDep ,$term_slct , 2018, '$remarks')";
            $result = mysqli_query($bd,$insert_q);
if ($result){
  echo '<script type="text/javascript">alert("Transaction added")</script>';
  echo '<script>
    window.history.back();
  </script>';
}
else{
  echo '<script type="text/javascript">alert("Transaction not added")</script>';
  echo '<script>
    window.history.back();
  </script>';
}

  }

?>