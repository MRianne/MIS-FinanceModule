<?php
include('dbcon.php');

function getTransactions($conn, $req){
	$types = getTransactionTypes($conn);
	$data = array("draw" => intval($req["draw"]));
	$sy = $req['sy'];
	$term = $req['term'];
	$sql = "SELECT * FROM transactions WHERE sy = $sy  AND term = $term";

	$results = $conn->query($sql);

	$data["recordsTotal"] = $results->num_rows;
	$data["recordsFiltered"] = $results->num_rows;

	// search ref
	if($req["columns"][0]["search"]["value"] != ""){
		$search = $req["columns"][0]["search"]["value"];
		$sql .= " AND ref_id LIKE '$search%'";
		$results = $conn->query($sql);
		$data["recordsFiltered"] = $results->num_rows;
	}

	// order by
	$col = $req['columns'][$req['order'][0]['column']]['data'];
	$dir = $req['order'][0]['dir'];
	if($req['order'][0]['column'] == 1)
		$sql .= " ORDER BY sy, term ";
	else if($req['order'][0]['column'] == 2)
		$sql .= " ORDER BY type_id";
	else
		$sql .= " ORDER BY $col";

	$sql .= " $dir";

	$results = $conn->query($sql);
	$transactions = array();
	while($result = $results->fetch_assoc()){
		$row = array(
			'ref_id' => $result['ref_id'],
			'sy_term' => substr($result['sy'], 2, 2).substr($result['sy'], 6). " - ".$result['term'],
			'type' => "not specified",
			'amount' => $result['amount'],
			'remarks' => $result['remarks'],
			'date_added' => $result['date_added']
			);
		if($row["remarks"] == ""){
			$row["remarks"] = "None";
		}
		foreach ($types as $value) {
			if($value["id"] == $result['type_id']){
				$row["type"] = $value["name"];
				break;
			}
		}
		array_push($transactions, $row);
	}
	$data["data"] = $transactions;
	return $data;
}

function getExpenses($conn, $req){
	$types = getTransactionTypes($conn);
	$data = array("draw" => intval($req["draw"]));
	$sy = $req['sy'];
	$term = $req['term'];
	$sql = "SELECT * FROM expense WHERE sy = $sy  AND term = $term";

	$results = $conn->query($sql);

	$data["recordsTotal"] = $results->num_rows;
	$data["recordsFiltered"] = $results->num_rows;

	// search ref
	if($req["columns"][0]["search"]["value"] != ""){
		$search = $req["columns"][0]["search"]["value"];
		$sql .= " AND ref_id LIKE '$search%'";
		$results = $conn->query($sql);
		$data["recordsFiltered"] = $results->num_rows;
	}

	// order by
	$col = $req['columns'][$req['order'][0]['column']]['data'];
	$dir = $req['order'][0]['dir'];
	if($req['order'][0]['column'] == 1)
		$sql .= " ORDER BY sy, term ";
	else if($req['order'][0]['column'] == 2)
		$sql .= " ORDER BY type_id";
	else
		$sql .= " ORDER BY $col";

	$sql .= " $dir";

	$results = $conn->query($sql);
	$transactions = array();
	while($result = $results->fetch_assoc()){
		$row = array(
			'ref_id' => $result['ref_id'],
			'sy_term' => substr($result['sy'], 2, 2).substr($result['sy'], 6). " - ".$result['term'],
			'type' => "not specified",
			'amount' => $result['amount'],
			'purpose' => $result['purpose'],
			'date_added' => $result['date_added']
			);
		if($row["purpose"] == ""){
			$row["purpose"] = "None";
		}
		foreach ($types as $value) {
			if($value["id"] == $result['type_id']){
				$row["type"] = $value["name"];
				break;
			}
		}
		array_push($transactions, $row);
	}
	$data["data"] = $transactions;
	return $data;
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

// for over all pie chart
function computeOverAll($transaction, $expense){

	if(($transaction["total"] - $expense["total"]) >= 0 ){
		$data["pie"]["remaining"] = $transaction["total"] - $expense["total"];
		$data["status"] = "REMAINING BUDGET:";
	}
	else{
		$data["pie"]["loss"] = abs($transaction["total"] - $expense["total"]);
		$data["status"] = "LOSS:";
	}

	return $data;
}

// for transaction pie chaty
function computeTransactionsPie($conn, $sy, $term){
 	$type = getTransactionTypes($conn);
	$sql = "SELECT * FROM transactions WHERE term = $term and sy = $sy ORDER BY date_added ASC";
	$results = $conn->query($sql);
	$transactions = array();

	while($result = $results->fetch_assoc()){
		$row = array(
			'type' => "not specified",
			'amount' => $result['amount']
			);
		foreach ($type as $value) {
			if($value["id"] == $result['type_id']){
				$row["type"] = $value["name"];
				break;
			}
		}
		array_push($transactions, $row);
	}

	$data["pie"] = initializePieType($type);
	$data["total"] = 0;

	foreach ($transactions as $key => $value) {
		if(array_key_exists($value["type"],$data["pie"]))
			$data["pie"][$value["type"]] += floatval($value["amount"]);
		else
			$data["pie"][$value["type"]] = floatval($value["amount"]);

		$data["total"] += floatval($value["amount"]);
	}

	return $data;
}

//for expense pie chart
function computeExpensesPie($conn, $sy, $term){
	$type = getTransactionTypes($conn);
	$sql = "SELECT * FROM expense WHERE term = $term and sy = $sy ORDER BY date_added ASC";
	$results = $conn->query($sql);
	$expenses = array();

	while($result = $results->fetch_assoc()){
		$row = array(
			'type' => "not specified",
			'amount' => $result['amount']
			);
		foreach ($type as $value) {
			if($value["id"] == $result['type_id']){
				$row["type"] = $value["name"];
				break;
			}
		}
		array_push($expenses, $row);
	}

	$data["pie"] = initializePieType($type);
	$data["total"] = 0;

	foreach ($expenses as $key => $value) {
		if(array_key_exists($value["type"],$data["pie"]))
			$data["pie"][$value["type"]] += floatval($value["amount"]);
		else
			$data["pie"][$value["type"]] = floatval($value["amount"]);

		$data["total"] += floatval($value["amount"]);
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

// for line chart of transaction
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

// for line chart of expense
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

// for line chart
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

// to get current transaction types
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

// get list of sy and term
function _getSYTerm($conn){
	$sql = "SELECT * FROM school_year ORDER BY sy ASC";
	$results = $conn->query($sql);
	// set variable
	$data["term"] = 0;
	$data["sy"] = array();
	while($result = $results->fetch_assoc()){
	  if($result["status"] == 1)
			$data["term"] = $result["term"];

		$data["sy"][$result["sy"]] = $result["status"];
	}

	return $data;
}

if(isset($_REQUEST['table']) && $_REQUEST['table'] == "transaction"){
	// for Transaction_Reports.php
	$jsonp = preg_match('/^[$A-Z_][0-9A-Z_$]*$/i', $_GET['callback']) ?
    $_GET['callback'] :
    false;

	if ( $jsonp )
	    echo $jsonp.'('.json_encode(getTransactions($conn, $_REQUEST)).');';
}
else if(isset($_REQUEST['table']) && $_REQUEST['table'] == "expense"){
	// for Expense_Reports.php
	$jsonp = preg_match('/^[$A-Z_][0-9A-Z_$]*$/i', $_GET['callback']) ?
    $_GET['callback'] :
    false;

	if ( $jsonp )
	    echo $jsonp.'('.json_encode(getExpenses($conn, $_REQUEST)).');';
}
else if(isset($_POST['report']) && $_POST['report'] == "overall"){
	// for Overall_Report.php
	$sy = $_POST['sy'];
	$term = $_POST['term'];
	$data["trasaction"] = computeTransactionsPie($conn, $sy, $term);
	$data["expense"] = computeExpensesPie($conn, $sy, $term);
	$data["overall"] = computeOverAll($data["trasaction"], $data["expense"]);
	echo json_encode($data);
}
else if(isset($_POST['action']) && $_POST['action'] == "initialize"){
	echo json_encode(_getSYTerm($conn));
}
?>
