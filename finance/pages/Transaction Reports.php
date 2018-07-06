<php>
  <head>
    <meta charset="utf-8">
    <title>Transaction report</title>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/finance.css">
    <link rel="stylesheet" href="../../css/acm.php">
    <link rel="stylesheet" href="../../css/materialize.css">
    <link rel="stylesheet" href="../datatables/css/jquery.dataTables.min.css"></link>
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
                  <select id="searchSY" name="searchSY">
                    <option value="" disabled selected>School Year</option>
                    <option value="schoolYear">20172018</option>
                  </select>
                </div>
                <div class="col s4">
                  <select id="searchTerm" name="searchTerm">
                    <option value="" disabled selected>Term</option>
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
          <table class="acm" id = "transactionTable">
            <thead>
              <tr>
                  <th>Reference ID</th>
                  <th>SY - Term</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Timestamp</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../js/Chart.min.js"></script>
    <script src="../js/individualReports.js"></script>


    </body>
    </html>
