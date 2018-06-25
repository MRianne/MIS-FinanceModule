<?php
//setting header to json
header('Content-Type: application/json');




 
include('dbcon.php');
// run query
$quser=mysqli_query($conn,"select * from `type`");

                    
//query to get data from the table
$query = sprintf("SELECT userid, facebook, twitter, googleplus FROM followers");

//execute query
$result = $mysqli->quser($quser);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//now print the data
print json_encode($data);