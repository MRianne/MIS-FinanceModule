<html>
	<head>
        <title>Add Expense</title>
        <!-- Our Custom CSS -->

        <link rel="stylesheet" href="../../css/materialize.css">
        <link rel="stylesheet" href="../../css/acm.php">
        <link rel="stylesheet" href="../css/finance.css">
        
        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>


    <body>
    
    <div class="wrapper">
                <?php $page = ''; include('navBar.php'); ?>  
        
              <div class="container">
                <div class="card-panel  pos">
                  <div class="row">
                    <div class="top-margin">
                      <div class="row">
                        <div class="col s12">
                          <h3 class="acm-text">Add Expense</h3>
                          <h5 class="acm-sub">subtitle here</h5>
                        </div>
                        <div class="input-field col s5" style="margin-top: 40px;">
                        
                        </div>
                      </div>
                    </div>
                  <form class="col s12" action="/action_page.php">
                    <div class="row">
                      <div class="col s3 left">
                        <label>Term</label>
                        <select id="type" name="type" class="styled-select gray semi-square">
                          <option value="registration" disabled selected>Current term</option>
                          <option value="firstTerm">1</option>
                          <option value="secondTerm">2</option>
                          <option value="thirdTerm">3</option>
                        </select>
                      </div>  
                    </div>
                    <div class="row">
                      <div class="input-field pos col s6">
                        <input type="text" id="rNum" name="rnum" placeholder="Input receipt num.."  class="validate">
                        <label for="rnum">Receipt Number</label>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                         <input type="text" id="amt" name="amount" placeholder="Input Amount.." class="validate">
                        <label for="amount">Amount</label>
                      </div>
                     
                    </div>
                   
                    <div class="row">
                      <div class="input-field col s12">
                        <label for="remarks">Remarks</label>
                        <textarea id="remarksArea" class="materialize-textarea"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s7 right">
                        
                        <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
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
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../js/pie.js"></script>
    

	</body>
</html>