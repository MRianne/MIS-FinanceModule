
<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'acm');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT ref_id, type_id, amount, date_added FROM `transactions`");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data["rows"] = array();
foreach ($result as $row) {
  $d = new DateTime($row['date_added'],new DateTimeZone('Asia/Manila'));
  $row['date_added'] = $d->format('m d y');
  $data["rows"][] = $row;
}

$d = new DateTime('now', new DateTimeZone('Asia/Manila'));
$data["now"] = $d->format('m d y');

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>
