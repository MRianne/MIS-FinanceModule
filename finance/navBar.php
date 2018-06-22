
  <!-- Sidebar Holder -->
  <nav id="sidebar">
    <div class="sidebar-header" id="sidebarCollapse">
      <h3>Association of Computing Machinery</h3>
      <h4>Finance Module</h4>
      <strong>ACM</strong>
    </div>

    <ul class="list-unstyled components">
      <li class="active">
        <a href="/acm/homepage.php" aria-expanded="false">
          <i class="glyphicon glyphicon-home"></i>Go Back
        </a>
      </li>
      <!--NAV BAR TRANSACTION-->
      <li>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Transaction </a>
          <div class="collapse" id="collapseExample">
            <a data-toggle="modal" href="#portfolioModal1">New Transaction</a>
            <a data-toggle="modal" href="#portfolioModal2">New Expense</a>
          </div>

        </li>
        <!--NAV BAR TRANSACTION-->

        <li>
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
            Reports</a>
            <div class="collapse" id="collapseExample1">
              <a href="Transaction Reports.php">
                <i class="glyphicon glyphicon-link"></i>
                Transaction Reports
              </a>
              <a href="Expense Reports.php">
                <i class="glyphicon glyphicon-paperclip"></i>
                Expense Reports
              </a>
              <a href="Overall Report.php">
                <i class="glyphicon glyphicon-send"></i>
                Overall Reports
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <!--NAV BAR TRANSACTION p-->
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
        $fsy = trim($sy);

        $insert_q = "INSERT INTO transactions (type_id, amount, term, sy, remarks) VALUES ($type_slct, $feeDep, '$term', '$fsy', '$remarks')";
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
      include('dbcon.php');

      if (isset($_POST['sub1'])){
        //  echo "insert";
        //inserts transactions  only
        $term_slct1 = $_POST['term_slct1'];
        //$sy_slct = $_POST['sy_slct'];
        $remarks = $_POST['remarks'];
        $feeDep = $_POST['feeDep'];

        $term = substr($term_slct1, -2 ,-1);
        $sy = substr($term_slct1, 0, -2);
        $fsy = trim($sy);

        $insert_me = "INSERT INTO expense (amount, term, sy, purpose) VALUES ($feeDep, '$term', '$fsy', '$remarks')";
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
        if ($conn->query($insert_me) === TRUE) {
          echo '<script type="text/javascript">alert("Expense added")</script>';
          echo '<script>
         window.history.back();
          </script>';
        } else {
          echo '<script type="text/javascript">alert("Expense not added")</script>';
          echo '<script>
          window.history.back();
      </script>';
        }
      }
      ?>


      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <!-- Bootstrap Js CDN -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <script type="text/javascript">
          $(document).ready(function () {
              $('#sidebarCollapse').on('click', function () {
                  $('#sidebar').toggleClass('active');
              });
          });
      </script>
