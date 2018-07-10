<html>
	<head>
        <title>Overall report</title>
        <!-- Our Custom CSS -->
         <link rel="stylesheet" href="../css/finance.css">
        <link rel="stylesheet" href="../css/acm.php">
        <link rel="stylesheet" href="../css/materialize.css">
        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>


    <body >
			<?php $page = 'overall'; include('navBar.php'); ?>
    	<div class="wrapper">

      <div class="acm-container" id = "main">
          <!---overall report--->
        	<div class="row pos top-margin">
						<div class="row" style = "margin-bottom: 0px">
							<div class="col s6 left">
		            <div class="center" >
		              <div class="row">
		                <div class="col s7">
		                  <select id="searchSY" name="searchSY">
												<?php
													$results = $conn->query("SELECT * FROM school_year ORDER BY sy ASC");
													$data["term"] = 0;
													$data["sy"] = array();
													while($result = $results->fetch_assoc()){
													  if($result["status"] == 1)
															$data["term"] = $result["term"];

														if(!array_key_exists($result["sy"], $data["sy"])){
															if($result["status"] == 1)
																echo "<option value = '".$result['sy']."' selected'>".$result['sy']."</option>";
															else
																echo "<option value = '".$result['sy']."'>".$result['sy']."</option>";
														}

														$data["sy"][$result["sy"]] = 	$result["status"];
													}
												?>
											</select>
		                </div>
		                <div class="col s4">
		                  <select id="searchTerm" name="searchTerm">
		                    <option value="1" <?=($data["term"] == 1)? "selected" : ""; ?>>1</option>
		                    <option value="2" <?=($data["term"] == 2)? "selected" : ""; ?>>2</option>
		                    <option value="3" <?=($data["term"] == 3)? "selected" : ""; ?>>3</option>
		                  </select>
		                </div>
		              </div>
		            </div>
		          </div>
						</div>
            <div class="row">
                <div class="col s4">
                    <div class="card-panel">
											<h6 class="acm-text acm-color">Overall Report</h6>
											<div class="row" id = "overall_legends" style = "margin-bottom: 0px">
												<center>
													<span style="width:10px; height:10px;" id="transaction_legend"></span>
													Remaining Budget
													<span style="width:10px; height:10px;" id="expense_legend"></span>
													Loss
												</center>
											</div>
                    	<div id="overallPie" style="max-width: 100%; max-height: 100%; " class="chart"></div>
                    </div>
                 </div>
                 <div class="col s4">
                    <div class="card-panel">
										 	<h6 class="acm-text acm-color">Transaction Report</h6>
	 										<div class="row" id = "transaction_legends" style = "margin-bottom: 0px">
	 										</div>
		                  <div id="transactionPie" style="max-width: 100%; max-height: 100%; " class="chart"></div>
                 		</div>
                 </div>

                 <div class="col s4">
                     <div class="card-panel">
												<h6 class="acm-text acm-color">Expense Report</h6>
												<div class="row" id = "expense_legends" style = "margin-bottom: 0px">
		 										</div>
			                  <div id="expensePie" style="max-width: 100%; max-height: 100%; " class="chart"></div>
	                 		 </div>
                 </div>
            </div>
          </div>
          <!---end of overall report--->
      </div>
<!--scripts--->



    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/overallReports.js"></script>
		<script src="../js/init.js"></script>
	</body>
</html>


<!--<p><strong>SOURCE :</strong> http://w3lessons.info/2013/06/04/skill-bar-with-jquery-css3/</p>-->
