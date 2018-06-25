<?php
include('dbcon.php');

function transaction($conn){
	$sql = "SELECT * FROM transactions ORDER BY date_added DESC";
	$results = $conn->query($sql);
	$transaction = array();
	while($result = $results->fetch_assoc()){
		$row = array(
			'id' => $result['ref_id'],
			'type' => $result['type_id'],
			'amount' => $result['amount'],
			'term' => $result['term'],
			'sy' => $result['sy'],
			'remarks' => $result['remarks'],
			'date_added' => $result['date_added']
			);
		array_push($transaction, $row);
	}
	return $transaction;
}

if(isset($_POST['report']) && $_POST['report'] == "transaction"){
	echo json_encode(transaction($conn));
}

?>
