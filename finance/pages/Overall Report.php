<!DOCTYPE html>
<html>
	<head>
		   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Overall report</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../css/style4.css">
        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>

		<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../js/Chart.Doughnut.js"></script>
		<script type="text/javascript" src="../js/Chart.js"></script>
		<script type="text/javascript" src="../js/scripts.js"></script>
		<script type="text/javascript" src="../js/script2.js"></script>
		<script type="text/javascript" src="../js/script3.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>

        <div class="wrapper">
        	<?php include("navBar.php"); ?>
            <div class="content">
                <h2 class="text-uppercase" style="padding: 20px;">overall report</h2>
                <div class="container" style="margin:auto;">
                 <div class="row">
                      <div class="col-sm-3">
                          <div class="card1">
                              <h4><b>Transaction Reports</b></h4>
                            <p>subtitle</p>
                            <center><canvas style="margin:auto;" id="mycanvas" width="200" height="200"></canvas></center>
                            <p id="transac-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis volutpat justo blandit, eleifend nunc eget, tristique enim. </p>
         <a href="Transaction Reports.html"><button type="button" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>View Transaction Report</span>
                            </button></a>

                          </div>
                      </div>

                      <div class="col-sm-3">
                          <div class="card1">
                              <h4><b>Overall Reports</b></h4>
                            <p>subtitle</p>
                            <center><canvas style="margin:auto;" id="mycanvas3" width="200" height="200"></canvas></center>
                            <p id="transac-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis volutpat justo blandit, eleifend nunc eget, tristique enim. </p>
         tristique enim. </p>


                          </div>
                      </div>

                      <div class="col-sm-3">
                          <div class="card1">
                              <h4><b>Expense Reports</b></h4>
                            <p>subtitle</p>
                            <center><canvas style="margin:auto;" id="mycanvas2" width="200" height="200"></canvas></center>
                            <p id="transac-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis volutpat justo blandit, eleifend nunc eget, tristique enim. </p>
        tristique enim. </p>
         <a href="Expense Reports.html"><button type="button" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>View Expense Report</span>
                            </button></a>

                          </div>
                      </div>
                    </div>

                </div>




</div>
	</div>
   <!--NAV BAR TRANSACTION p-->
	 

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
