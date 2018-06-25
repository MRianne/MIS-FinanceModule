<php>
    <head>
        <meta charset="utf-8">
        <title>Transaction report</title>
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../css/finance.css">
        <link rel="stylesheet" href="../../css/acm.php">
        <link rel="stylesheet" href="../../css/materialize.css">
        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>

    <div class="wrapper">


       <?php $page = 'transaction'; include('navBar.php'); ?>
              <div class="acm-container" style="margin-top: 130px;">
                <div class="card-panel">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
                      <canvas id="mycanvas" style="width: 640px;
        height: auto;"></canvas>
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

<!--scripts--->

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../js/pie.js"></script>
    <script src="../js/reports.js"></script>
    <script src="../js/Chart.min.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>

    
    </body>
</html>
