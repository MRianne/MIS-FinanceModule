<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACM | Finance</title>
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="css/style4.css">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
  <script src="typeahead.min.js"></script>
</head>
<body>
  <div class="wrapper">
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
              <a data-toggle="modal" href="#portfolioModal1">New Profit</a>
              <a data-toggle="modal" href="#portfolioModal2">New Expense</a>
            </div>

          </li>
          <!--NAV BAR TRANSACTION-->

          <li>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
              Reports</a>
              <div class="collapse" id="collapseExample1">
                <a href="pages/Transaction Reports.html">
                  <i class="glyphicon glyphicon-link"></i>
                  Transaction Reports
                </a>
                <a href="pages/Expense Reports.html">
                  <i class="glyphicon glyphicon-paperclip"></i>
                  Expense Reports
                </a>
                <a href="pages/Overall Report.html">
                  <i class="glyphicon glyphicon-send"></i>
                  Overall Reports
                </a>
              </div>
            </li>
          </ul>
        </nav>
          </div>
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
                <form action="transaction.php" role="form" method="POST">
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
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
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
  <!--NAV BAR EXPENSE p-->

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
                  <form action="expense.php" role="form" method="POST">
                    <label for="rnum">Receipt Number</label>
                    <input class="form-control" type="number" id="rNum" name="rnum" placeholder="">
                    <label for="type">Term</label>
                    <select id="term" name="term_slct">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
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



    <!-- jQuery CDN -->
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
    <!--NAV BAR TRANSACTION-->

  </body>

  </html>
