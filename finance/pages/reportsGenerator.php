<?php
include('dbcon.php');

function transactionDESC($conn){
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

function transactionASC($conn){
	$types = getTransactionTypes($conn);
	$sql = "SELECT * FROM transactions ORDER BY date_added ASC";
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

function computeTransactions($transactions = array(), $conn){
	$types = getTransactionTypes($conn);
	$data = array();
	$previousDate = "";

	foreach ($types as $key => $value) {
		$data[$value["name"]]  =array();
	}
	foreach ($transactions as $row) {

	  $d = new DateTime($row['date_added'],new DateTimeZone('Asia/Manila'));

	  if(array_key_exists($row["type"],$data)
	      && array_key_exists(date_format($d, "Y-m-d"),$data[$row["type"]])){
	    $data[$row["type"]][date_format($d, "Y-m-d")] += floatval($row["amount"]);
	  }
	  else{
			if($previousDate != ""){
				$data = _fillTransactionRow($data,$previousDate);
	      $data[$row["type"]][date_format($d, "Y-m-d")] =
	        $data[$row["type"]][$previousDate] + floatval($row["amount"]);
			}
	    else{
				$data[$row["type"]][date_format($d, "Y-m-d")] = floatval($row["amount"]);
			}
			$previousDate = date_format($d, "Y-m-d");
	  }
	}

	if($previousDate != ""){
		$data = _fillTransactionRow($data,$previousDate);
	}

	foreach ($data as $key => $value) {
	  $d = new DateTime('now', new DateTimeZone('Asia/Manila'));
	  if(!array_key_exists(date_format($d, "Y-m-d"),$data[$key])){
	    end($data[$key]);
	    $k = key($data[$key]);
	    $data[$key][date_format($d, "Y-m-d")] = floatval($data[$key][$k]);
	  }
	}

	return $data;
}

function _fillTransactionRow($data, $date){
	foreach($data as $key => $row){
		if(empty($data[$key])){
			$data[$key][$date] = 0;
		}
		else if(!array_key_exists($date,$data[$key])){
			end($data[$key]);
			$data[$key][$date] = $data[$key][key($data[$key])];
		}
	}
	return $data;
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
	$data["table"] = transactionDESC($conn);
	$data["chart"] = computeTransactions(transactionASC($conn), $conn);
	$data["type"] = getTransactionTypes($conn);
	echo json_encode($data);
}
else if(isset($_POST['report']) && $_POST['report'] == "expense"){
	echo json_encode(expense($conn));
}

?>
