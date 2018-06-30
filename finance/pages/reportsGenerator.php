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
	$quser=mysqli_query($conn,"select * from `school_year` where status=1");
	// set variable
	$term=$sy=0;
	while($row=mysqli_fetch_array($quser)){
	  $term = $row['term'];
	  $sy = $row['sy'];
	}

	$sql = "SELECT * FROM transactions WHERE term = $term and sy = $sy ORDER BY date_added ASC";
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

function expenseDESC($conn){
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

function expenseASC($conn){
	$types = getTransactionTypes($conn);
	$sql = "SELECT * FROM expense ORDER BY date_added ASC";
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
	$transaction = transactionASC($conn);
	$expense = expenseASC($conn);
	$type = getTransactionTypes($conn);

	$data["pie"] = array("transaction" => initializePieType($type),
												"expense" => initializePieType($type));
	$data["total"] = 0;

	foreach ($transaction as $key => $value) {
		if(array_key_exists($value["type"],$data["pie"]["transaction"])){
			$data["pie"]["transaction"][$value["type"]] += floatval($value["amount"]);
		}
		else{
			$data["pie"]["transaction"][$value["type"]] = floatval($value["amount"]);
		}

		$data["total"] += floatval($value["amount"]);
	}

	foreach ($expense as $key => $value) {
		if(array_key_exists($value["type"],$data["pie"]["expense"]) &&
				array_key_exists($value["type"],$data["pie"]["transaction"])){
			$data["pie"]["expense"][$value["type"]] += floatval($value["amount"]);
			$data["pie"]["transaction"][$value["type"]] -= floatval($value["amount"]);

			if($data["pie"]["transaction"][$value["type"]] < 0){
				$data["pie"] = accounting($data["pie"], abs($data["pie"]["transaction"][$value["type"]] ));
			}
		}
		else if(array_key_exists($value["type"],$data["pie"]["expense"]) &&
							!array_key_exists($value["type"],$data["pie"]["transaction"])){
			$data["pie"]["expense"][$value["type"]] += floatval($value["amount"]);
			$data["pie"]["transaction"][$value["type"]] = -floatval($value["amount"]);
		}
		else{
			$data["pie"]["expense"][$value["type"]] = floatval($value["amount"]);
			$data["pie"]["transaction"][$value["type"]] = -floatval($value["amount"]);
		}
		$data["total"] -= floatval($value["amount"]);
	}

	return $data;
}

function computeTransactionsPie($conn){
	$transaction = transactionASC($conn);
	$type = getTransactionTypes($conn);

	$data["pie"] = initializePieType($type);
	$data["total"] = 0;

	foreach ($transaction as $key => $value) {
		if(array_key_exists($value["type"],$data["pie"])){
			$data["pie"][$value["type"]] += floatval($value["amount"]);
		}
		else{
			$data["pie"][$value["type"]] = floatval($value["amount"]);
		}

		$data["total"] += floatval($value["amount"]);
	}

	return $data;
}

function computeExpensesPie($conn){
	$expenses = expenseASC($conn);
	$type = getTransactionTypes($conn);

	$data["pie"] = initializePieType($type);
	$data["total"] = 0;

	foreach ($expenses as $key => $value) {
		if(array_key_exists($value["type"],$data["pie"])){
			$data["pie"][$value["type"]] += floatval($value["amount"]);
		}
		else{
			$data["pie"][$value["type"]] = floatval($value["amount"]);
		}

		$data["total"] += floatval($value["amount"]);
	}

	return $data;
}

function accounting($data, $amount){
	foreach ($data["transaction"] as $key => $value) {
		if($amount > 0 && ($data["transaction"][$key] > $amount)){
			$data["transaction"][$key] -= $amount;
			$amount = 0;
		}
		else if($amount > 0 && ($data["transaction"][$key] <= $amount)){
			$amount -= $data["transaction"][$key];
			$data["transaction"][$key] = 0;
		}
	}
	return $data;
}
function initializePieType($type){
	$data = array();
	foreach ($type as $value) {
		$data[$value["name"]] = 0;
	}

	return $data;
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
				$data = _fillRow($data,$previousDate);
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
		$data = _fillRow($data,$previousDate);
	}

	foreach ($data as $key => $value) {
	  $d = new DateTime('now', new DateTimeZone('Asia/Manila'));
		if(empty($data[$key])){
			$data[$key][date_format($d, "Y-m-d")] = 0;
		}
	  else if(!array_key_exists(date_format($d, "Y-m-d"),$data[$key])){
	    end($data[$key]);
	    $k = key($data[$key]);
	    $data[$key][date_format($d, "Y-m-d")] = floatval($data[$key][$k]);
	  }
	}

	return $data;
}

function computeExpenses($expenses = array(), $conn){
	$types = getTransactionTypes($conn);
	$data = array();
	$previousDate = "";

	foreach ($types as $key => $value) {
		$data[$value["name"]]  =array();
	}
	foreach ($expenses as $row) {

	  $d = new DateTime($row['date_added'],new DateTimeZone('Asia/Manila'));

	  if(array_key_exists($row["type"],$data)
	      && array_key_exists(date_format($d, "Y-m-d"),$data[$row["type"]])){
	    $data[$row["type"]][date_format($d, "Y-m-d")] += floatval($row["amount"]);
	  }
	  else{
			if($previousDate != ""){
				$data = _fillRow($data,$previousDate);
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
		$data = _fillRow($data,$previousDate);
	}

	foreach ($data as $key => $value) {
	  $d = new DateTime('now', new DateTimeZone('Asia/Manila'));
		if(empty($data[$key])){
			$data[$key][date_format($d, "Y-m-d")] = 0;
		}
	  else if(!array_key_exists(date_format($d, "Y-m-d"),$data[$key])){
	    end($data[$key]);
	    $k = key($data[$key]);
	    $data[$key][date_format($d, "Y-m-d")] = floatval($data[$key][$k]);
	  }
	}

	return $data;
}

function _fillRow($data, $date){
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
	$data["table"] = expenseDESC($conn);
	$data["chart"] = computeExpenses(expenseASC($conn), $conn);
	$data["type"] = getTransactionTypes($conn);
	echo json_encode($data);
}
else if(isset($_POST['report']) && $_POST['report'] == "overallPie"){
	echo json_encode(computeOverAll($conn));
}
else if(isset($_POST['report']) && $_POST['report'] == "transactionPie"){
	echo json_encode(computeTransactionsPie($conn));
}

else if(isset($_POST['report']) && $_POST['report'] == "expensePie"){
	echo json_encode(computeExpensesPie($conn));
}
?>
