<html>
	<head>
        <title>Overall report</title>
        <!-- Our Custom CSS -->
         <link rel="stylesheet" href="../css/finance.css">
        <link rel="stylesheet" href="../../css/acm.php">
        <link rel="stylesheet" href="../../css/materialize.css">
        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>

    </script>
	</head>


    <body >

    <div class="wrapper">
            <?php $page = 'overall'; include('navBar.php'); ?>
              <div class="acm-container">

            <!---overall report--->
                <div class="row pos top-margin">
                <div class="row">
                    <h3 class="acm-text acm-color">Overall report</h3>
                    <div class="col s5">
                        <div class="card-panel">
		                    	<div id="overallPie" style="max-width: 100%; " class="chart">
			                    </div>
		                    </div>
	                   </div>
                </div>
            </div>
            <!---end of overall report--->


            <!---overall report--->
                <div class="row pos top-margin">
                <div class="row">
                    <h3 class="acm-text acm-color">Transaction report</h3>
                    <div class="col s5">
                        <div class="card-panel">
			                    <div id="transactionPie" style="max-width: 100%; " class="chart">
			                    </div>
                    	</div>
                    </div>
                </div>
            </div>
            <!---end of overall report--->

            <!---overall report--->
                <div class="row pos top-margin">
                <div class="row">
                    <h3 class="acm-text acm-color">Expense report</h3>
                    <div class="col s5">
                        <div class="card-panel">
			                    <div id="expensePie" style="max-width: 100%; " class="chart">
			                    </div>
		                    </div>
                    </div>
                </div>
            </div>
            <!---end of overall report--->




              </div>

<!--scripts--->



    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../js/overallPie.js"></script>
		<script src="../js/transactionPieSettings.js"></script>
    <script src="../js/transactionPieValue.js"></script>
    <script src="../js/expensePieSettings.js"></script>
    <script src="../js/expensePieValue.js"></script>
	</body>
</html>


<!--<p><strong>SOURCE :</strong> http://w3lessons.info/2013/06/04/skill-bar-with-jquery-css3/</p>-->
