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
                    <div class="col s4">
                        <div class="card-panel">
													<h5 class="acm-text acm-color">Overall report</h5>
		                    	<div id="overallPie" style="max-width: 100%; " class="chart"></div>
		                    </div>
	                   </div>
                     <div class="col s4">
                        <div class="card-panel">
													 <h5 class="acm-text acm-color">Transaction report</h5>
	 			                   <div id="transactionPie" style="max-width: 100%; " class="chart"></div>
                     		</div>
                     </div>

                     <div class="col s4">
                         <div class="card-panel">
														<h5 class="acm-text acm-color">Expense report</h5>
	 			                    <div id="expensePie" style="max-width: 100%; " class="chart"></div>
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
    <script src="../js/transactionPie.js"></script>
    <script src="../js/expensePie.js"></script>
	</body>
</html>


<!--<p><strong>SOURCE :</strong> http://w3lessons.info/2013/06/04/skill-bar-with-jquery-css3/</p>-->
