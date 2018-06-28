
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

  if(array_key_exists($row["type_id"],$data["rows"])
      && array_key_exists(date_format($d, "Y-m-d"),$data["rows"][$row["type_id"]])){
    $data["rows"][$row["type_id"]][date_format($d, "Y-m-d")] += floatval($row["amount"]);
  }
  else if(array_key_exists($row["type_id"],$data["rows"])
      && !array_key_exists(date_format($d, "Y-m-d"),$data["rows"][$row["type_id"]])){
    $r = array();
    $data["rows"][$row["type_id"]][date_format($d, "Y-m-d")] = floatval($row["amount"]);
  }
  else{
      $r = array();
      $r[date_format($d, "Y-m-d")] = floatval($row["amount"]);
      $data["rows"][$row["type_id"]] = $r;
  }
}

foreach ($data["rows"] as $key => $value) {
  $d = new DateTime('now', new DateTimeZone('Asia/Manila'));
  if(!array_key_exists(date_format($d, "Y-m-d"),$data["rows"][$key])){
    end($data["rows"][$key]);
    $k = key($data["rows"][$key]);
    $data["rows"][$key][date_format($d, "Y-m-d")] = floatval($data["rows"][$key][$k]);
  }
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>
