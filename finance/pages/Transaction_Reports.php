<php>
  <head>
    <meta charset="utf-8">
    <title>Transaction report</title>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/finance.css">
    <link rel="stylesheet" href="../../css/acm.php">
    <link rel="stylesheet" href="../../css/materialize.css">
    <link rel="stylesheet" href= "../datatables/css/bootstrap.css"></link>
    <link rel="stylesheet" href="../datatables/css/dataTables.bootstrap4.min.css"></link>
    <link rel="stylesheet" href="../datatables/css/responsive.bootstrap4.min.css"></link>
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>

    <div class="wrapper">


      <?php $page = 'transaction'; include('navBar.php'); ?>
      <div class="acm-container" style="margin-top: 130px;">
        <div class="row">
          <div class="col s4 left">
            <div class="center" >
              <div class="row">
                <div class="col s7">
                  <select id="searchSY" name="searchSY"></select>
                </div>
                <div class="col s4">
                  <select id="searchTerm" name="searchTerm">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col s6 right">
            <div class="col s7 right">
              <input placeholder="Search by Reference ID" type="text" id = "searchID" name = "searchID">
            </div>
          </div>
        </div>
        <div class="card-panel">
          <center><h3>Transaction Table</h3></center>
          <table class="acm" id = "transactionTable">
            <thead>
              <tr>
                  <th>Reference ID</th>
                  <th>SY - Term</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Remarks</th>
                  <th>Timestamp</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="receipt" class="modal">
      <div class="modal-content">
      </div>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../datatables/js/jquery.dataTables.min.js"></script>
    <script src="../datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../datatables/js/dataTables.responsive.min.js"></script>
    <script src="../datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../js/Chart.min.js"></script>
    <script src="../js/individualReports.js"></script>
    <script type="text/javascript">
      var e = $('#nav-mobile').sidenav();
      var instance = M.Sidenav.getInstance(e);
    </script>
    </body>
    </html>
