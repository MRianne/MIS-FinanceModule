<html>
	<head>
        <title>Add Expense</title>
        <!-- Our Custom CSS -->

        <link rel="stylesheet" href="../css/materialize.css">
        <link rel="stylesheet" href="../css/acm.php">
        <link rel="stylesheet" href="../css/finance.css">

        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>


    <body>
			<?php $page = ''; include('navBar.php'); ?>
    <div class="wrapper">


              <div class="acm-container"  style="margin-top:8vw;">
                <?php
                    include("getBudget.php");
                    ?>
                <div class="card-panel">
                  <div class="row">
                      <div class="row">
                        <div class="col s7">
                          <h3 class="acm-text">Add Expense</h3>
                          <h7 class="acm-sub">Association of Computing Machinery (ACM)</h7>
													<br>
                      </div>
                    </div>
                  <form action="#" role="form" method="POST">
                    <div class="row">
                      <div class="col s12">
                        <label>Term</label>
												<select id="term" name="term_slct1" class="styled-select gray semi-square">
				                  <?php
				                  // run query
				                  $quser=mysqli_query($conn,"select * from `school_year`");
				                  // set variable
				                  $hold=""; $charHold = "";
				                  while($row=mysqli_fetch_array($quser)){
				                    ?> <option value=" <?php echo $row['term'],",",$row['sy']; ?> "> <?php echo $row['term']," Term, SY ",$row['sy'] ?> </option> <?php
				                  }
				                  ?>
				                </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
												<input class="form-control" type="number" id="amt" name="feeDep" min="0" placeholder="Enter Amount..">
                        <label for="amount">Amount</label>
                      </div>

                    </div>
										<div class="row">
											<div class="col s12">

												<label>Type</label>
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
											</div>
										</div>
                    <div class="row">
                      <div class="input-field col s12">
                        <label for="remarks">Remarks</label>
                        <textarea id="remarksArea" class="materialize-textarea" name="remarks" rows="3"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s7 right">

                        <button class="btn waves-effect waves-light right" type="submit" name="sub1">Submit
                        <i class="material-icons right">send</i>
                      </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              </div>


<!--scripts--->
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
    <script>
        $(document).ready(function(){
    $('select').formSelect();
  });
    </script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
    <script src="../js/pie.js"></script>


	</body>
</html>
