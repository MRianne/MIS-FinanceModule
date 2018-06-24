
  <!-- Sidebar Holder -->
 
          <nav class="acm-nav acm-bgcolor">
          <div class="nav-wrapper">
            <ul class="right hide-on-med-and-down">
                <li><a <?php echo ($page == 'overall') ? "class='active'" : ""; ?> href="Overall Report.php">Overall Report</a></li>
                <li><a <?php echo ($page == 'transaction') ? "class='active'" : ""; ?>  href="Transaction Reports.php">Transaction Report</a></li>
                <li><a <?php echo ($page == 'expense') ? "class='active'" : ""; ?>  href="Expense Reports.php">Expense Report</a></li>
              <!-- Dropdown Trigger -->
              <li><a class="dropdown-button" href="#!" data-target="addDropdown">Add<i class="material-icons right">add</i></a>

              </li>
            </ul>

            <!--mobile nav-->

            <ul id="nav-mobile" class="sidenav">
                <li><a href="Overall Report.php">Overall Report</a></li>
                <li><a href="Transaction Reports.php">Transaction Report</a></li>
                <li><a href="Expense Reports.php">Expense Report</a></li>
              </ul>
              <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          </div>
        </nav>
             <ul id="addDropdown" class="dropdown-content">
      <li><a href="Add Transaction.php">Add Transaction</a></li>
      <li><a href="Add Expense.php">Add Expense</a></li>
    </ul>
      



      <!--PLEASE DELETE CODE BELOW IF YOURE THROUGH WITH IT-->
      <center>
      <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true" style="width: 100%; margin: auto;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container" style="width: 100%; margin: auto;">
              <div class="row">
                <div style="width: 100%;">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Transaction</h2>
                    <p class="item-intro text-muted">Association for Computing Machinery (ACM)</p>
                    <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">

                    <div class="form">
            <br>
            <form action="#" method="POST">
              <label for="id">Student Id</label>
              <input type="text" id="StuNum" name="studid">
              <label for="name">First Name</label>
              <input type="text" id="fname" name="fname">
              <label for="name">Last Name</label>
              <input type="text" id="lname" name="lname">
              <label for="amount">Payment Fee deposit</label>
              <input class="form-control" type="number" id="pfd" name="feeDep">
              <label for="type">Type</label>
              <select id="type" name="type_slct">
                <?php
                include('dbcon.php');
                // run query
                $quser=mysqli_query($conn,"select * from `type`");
                // set variable
                while($row=mysqli_fetch_array($quser)){
                  ?> <option value=" <?php echo $row['type_id'] ?> "> <?php echo $row['type_name'] ?> </option> <?php
                }
                ?>
              </select>
              <label for="type">Term</label>
              <select id="term" name="term_slct">
                <?php
                // run query
                $quser=mysqli_query($conn,"select * from `school_year`");
                // set variable
                $hold=""; $charHold = "";
                while($row=mysqli_fetch_array($quser)){
                  $hold = $row['sy'];
                  $charHold = substr($hold, -1);
                  $hold = substr($hold, 0, -1);
                  ?> <option value=" <?php echo $row['sy']; ?> "> <?php echo $charHold," Term, SY ",$hold ?> </option> <?php
                }
                ?>
              </select>
              <label for="remarks">Remarks</label>
              <textarea class="form-control" name="remarks" id="remarksArea" rows="3"></textarea>
              <input class="btn btn-primary" name="sub" type="submit" value="Submit">
            </form>
          </div>


          <button class="btn btn-primary" data-dismiss="modal" type="button">
            <i class="fa fa-times"></i>
            Cancel</button>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </center>
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

        $term = substr($term_slct, -2 ,-1);
        $sy = substr($term_slct, 0, -2);


        $insert_q = "INSERT INTO transactions (type_id, amount, term, sy, remarks) VALUES ($type_slct, $feeDep, '$term', '$sy', '$remarks')";
        /*if ($conn->query($insert_q) === TRUE) {
          echo '<script type="text/javascript">alert("Transaction added")</script>';
          echo '<script>
            window.history.back();
          </script>';
        } else {
          echo '<script type="text/javascript">alert("Transaction failed)</script>';
          echo '<script>
            window.history.back();
          </script>';
        }*/
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
      }
      ?>

      <!--NAV BAR EXPENSE p-->
      <center>
      <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true" style="width: 100%; margin: auto;">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl"></div>
      </div>
      </div>
      <div class="container" style="width: 100%; margin: auto;">
      <div class="row">
        <div style="width: 100%;">
          <div class="modal-body">
            <!-- Project Details Go Here -->
            <h2 class="text-uppercase">Expense</h2>
            <p class="item-intro text-muted">Association for Computing Machinery (ACM)</p>
            <?php
            include("getBudget.php");
            ?>
            <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">

            <div class="form">
              <form action="#" role="form" method="POST">
                <label for="type">Term</label>
                <select id="term" name="term_slct1">
                  <?php
                  include("dbcon.php");
                  // run query
                  $quser=mysqli_query($conn,"select * from `school_year`");
                  // set variable
                  $hold=""; $charHold = "";
                  while($row=mysqli_fetch_array($quser)){
                    $hold = $row['sy'];
                    $charHold = substr($hold, -1);
                    $hold = substr($hold, 0, -1);
                    ?> <option value=" <?php echo $row['type_id']; ?> "> <?php echo $charHold," Term, SY ",$hold ?> </option> <?php
                  }
                  ?>
                </select>
                <label for="amount">Amount</label>
                <input class="form-control" type="number" id="amt" name="feeDep" min="0">

                <label for="remarks">Remarks</label>
                <textarea class="form-control" id="remarksArea" name="remarks" rows="3"></textarea>
                <input class="btn btn-primary" type="submit" name="sub1" value="Submit">

              </form>
            </div>


            <button class="btn btn-primary" data-dismiss="modal" type="button">
              <i class="fa fa-times"></i>
              Cancel</button>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      </center>

      <?php
      $mysql_hostname = "localhost";
      $mysql_user = "root";
      $mysql_password = "";//CHANGE THIS
      $mysql_database = "acm";//CHANGE THIS
      $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");

      error_reporting(E_ERROR | E_PARSE);
      $conn = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
                  error_reporting(E_ALL);
                  ini_set('display_errors', 1);
                  include("dbcon.php");
                  if (isset($_POST['searchSub'])){
                      //searches Student ID
                      echo "search";
                  }

                  if (isset($_POST['sub1'])){
                     // echo "insert";
                      //inserts transactions  only
                  $term_slct = $_POST['term_slct1'];
                 // $sy_slct = $_POST['sy_slct'];
                  $remarks = $_POST['remarks'];
                  //$studid = $_POST['studid'];
                  $feeDep = $_POST['feeDep'];

                  $term = substr($term_slct, -2 ,-1);
                  $sy = substr($term_slct, 0, -2);
                  //insert values
                  $insert_me = "INSERT INTO expense (amount, term, sy, purpose) VALUES ($feeDep, '$term', '$sy', '$remarks')";
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
