<?php
include('dbcon.php');

function transaction($conn){
	$sql = "SELECT * FROM transactions";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row;
}

if(isset($_POST['report']) && $_POST['report'] == "transaction"){
	echo json_encode(transaction($conn));
}

?>