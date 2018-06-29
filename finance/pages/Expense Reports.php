<html>
    <head>
        <meta charset="utf-8">
        <title>Expense report</title>
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../css/finance.css">
        <link rel="stylesheet" href="../../css/acm.php">
        <link rel="stylesheet" href="../../css/materialize.css">
        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>

    <div class="wrapper">

      <?php $page = 'expense'; include('navBar.php'); ?>

              <div class="acm-container" style="margin-top: 130px;">
                <div class="row pos">
                  <div class="col s4 left under">
                    <div class="center" >
                  <div class="row">
                    <div class="col s7">
                      <select id="type" name="type">
                          <option value="registration" disabled selected>School Year</option>
                          <option value="schoolYear">20172018</option>
                        </select>
                    </div>
                    <div class="col s4">
                      <select id="type" name="type">
                          <option value="registration" disabled selected>Term</option>
                          <option value="firstTerm">1</option>
                          <option value="secondTerm">2</option>
                          <option value="thirdTerm">3</option>
                        </select>
                    </div>
                  </div>
                  </div>
                </div>

                   <div class="col s6 right">
                     
                    <div class="col s3 right">
                      <button class="btn waves-effect waves-light " type="submit" name="action">search
                        <i class="material-icons right">search</i>
                      </button>
                    </div>
                    <div class="col s7 right">
                     <input placeholder="Search" type="text">
                    </div>
                        
                  </div>

                </div>
                <div class="card-panel">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
                <div class="card-panel">
                <table class="acm" id = "expenseTable">
                    <thead>
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

<!--scripts--->

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../js/pie.js"></script>
    <script src="../js/reports.js"></script>

    </body>
</html>
