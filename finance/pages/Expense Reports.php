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

              <div class="container" style="margin-top: 130px;">
                <div class="card-panel">
                    <h4>Expense Report</h4>
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
                      <canvas id="expenseLC" style="width: 640px; height: 400px;"></canvas>
                    </div>
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

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
       (function($){
            $(function(){
                  $(".dropdown-button").dropdown();
                $('.button-collapse').sideNav();
                $('.parallax').parallax();
                $('select').material_select();

                $('.modal-trigger').leanModal();

            }); // end of document ready
        })(jQuery); // end of jQuery name space
    </script>
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../js/pie.js"></script>
    <script src="../js/Chart.min.js"></script>
    <script src="../js/reports.js"></script>

    </body>
</html>
