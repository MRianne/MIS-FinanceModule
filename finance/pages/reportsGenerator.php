<?php
include('dbcon.php');

function transaction($conn){
	$types = getTransactionTypes($conn);
	$sql = "SELECT * FROM transactions ORDER BY date_added DESC";
	$results = $conn->query($sql);
	$transactions = array();
	while($result = $results->fetch_assoc()){
		$row = array(
			'id' => $result['ref_id'],
			'type' => "not specified",
			'amount' => $result['amount'],
			'term' => $result['term'],
			'sy' => $result['sy'],
			'remarks' => $result['remarks'],
			'date_added' => $result['date_added']
			);

		foreach ($types as $value) {
			if($value["id"] == $result['type_id']){
				$row["type"] = $value["name"];
				break;
			}
		}

		array_push($transactions, $row);
	}
	return $transactions;
}

function expense($conn){
	$types = getTransactionTypes($conn);
	$sql = "SELECT * FROM expense ORDER BY date_added DESC";
	$results = $conn->query($sql);
	$expenses = array();
	while($result = $results->fetch_assoc()){
		$row = array(
			'id' => $result['ref_id'],
			'type' => "not specified",
			'amount' => $result['amount'],
			'term' => $result['term'],
			'sy' => $result['sy'],
			'purpose' => $result['purpose'],
			'date_added' => $result['date_added']
			);

		foreach ($types as $value) {
			if($value["id"] == $result['type_id']){
				$row["type"] = $value["name"];
				break;
			}
		}

		array_push($expenses, $row);
	}
	return $expenses;
}

function computeOverAll($conn){
	$transaction = transaction($conn);
	$expense = expense($conn);


}

function computeExpense($expense = array(), $conn){
	$data["totalExpense"] = 0;
	$data["parts"] = getTransactionTypes($conn);

	foreach ($data["parts"] as $p) {
		$p["total"] = 0;
		foreach ($expense as $e) {
			if($e["type"] == $p["name"]){
				$p["total"] += $e["amount"];
			}
		}
	}

	$type = array(
			'id' => 0,
			'name' => "not specified",
			'total' => 0
	);

	foreach ($expense as $e) {
		if($e["type"] == "not specified"){
			$type["total"] += $e["amount"];
		}

	}

	array_push($data["parts"], $type);

	
}

function getTransactionTypes($conn){
	$sql = "SELECT * FROM type";
	$results = $conn->query($sql);
	$types = array();
	while($result = $results->fetch_assoc()){
		$row = array(
			'id' => $result['type_id'],
			'name' => $result['type_name']
			);
		array_push($types, $row);
	}
	return $types;
}

if(isset($_POST['report']) && $_POST['report'] == "transaction"){
	echo json_encode(transaction($conn));
}
else if(isset($_POST['report']) && $_POST['report'] == "expense"){
	echo json_encode(expense($conn));
}

?>
