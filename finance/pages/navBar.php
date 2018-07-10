
<!-- Sidebar Holder -->

<nav class="acm-body acm-bgcolor">
  <div class="nav-wrapper">
    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a <?php echo ($page == 'overall') ? "class='active'" : ""; ?> href="Overall_Report.php">Overall Report</a></li>
      <li><a <?php echo ($page == 'transaction') ? "class='active'" : ""; ?>  href="Transaction_Reports.php">Transaction Report</a></li>
      <li><a <?php echo ($page == 'expense') ? "class='active'" : ""; ?>  href="Expense_Reports.php">Expense Report</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-target="addDropdown">Add<i class="material-icons right">add</i></a>

      </li>
    </ul>

    <!--mobile nav-->
  </div>
</nav>

<ul id="addDropdown" class="dropdown-content">
  <li><a href="Add_Transaction.php">Add Transaction</a></li>
  <li><a href="Add_Expense.php">Add Expense</a></li>
</ul>


<!-- PHP FOR ADD TRANSACTION -->

<?php
include('dbcon.php');

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
  $result_explode = explode(',', $_POST['term_slct']);
  $term = $result_explode[0];
  $sy = $result_explode[1];
  $insert_q = "INSERT INTO transactions (type_id, amount, term, sy, remarks) VALUES ($type_slct, $feeDep, $term, $sy, '$remarks')";
  if ($conn->query($insert_q) === TRUE) {
    echo '<script type="text/javascript">alert("Transaction added")</script>';
    echo '<script>
    window.history.back();
    </script>';
  } else {
    echo '<script type="text/javascript">alert("Transaction not added")</script>';
    echo '<script>
    window.history.back();
    </script>';
  }
  if($type_slct==2){
    $sql = "UPDATE accounts SET status=1 WHERE idno=$studid";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
      echo '<script type="text/javascript">alert("Transaction not added")</script>';
      echo '<script>
      window.history.back();
      </script>';
    }
  }

}
?>

<!-- ADD EXPENSE -->

<?php
include("dbcon.php");
if (isset($_POST['searchSub'])){
  //searches Student ID
  echo "search";
}

if (isset($_POST['sub1'])){
  // echo "insert";
  //inserts transactions  only
  $type_slct = $_POST['type_slct'];
  $term_slct = $_POST['term_slct1'];
  // $sy_slct = $_POST['sy_slct'];
  $remarks = $_POST['remarks'];
  //$studid = $_POST['studid'];
  $feeDep = $_POST['feeDep'];
  $result_explode = explode(',', $_POST['term_slct1']);
  $term = $result_explode[0];
  $sy = $result_explode[1];
  //insert values
  $insert_me = "INSERT INTO expense (type_id, amount, term, sy, purpose) VALUES ($type_slct, $feeDep, $term, $sy, '$remarks')";
  if ($conn->query($insert_me) === TRUE) {
    echo '<script type="text/javascript">alert("Expense added")</script>';
    echo '<script>
    window.history.back();
    </script>';
  } else {
    echo '<script type="text/javascript">alert("Expense failed)</script>';
    echo '<script>
    window.history.back();
    </script>';
  }

}

?>
