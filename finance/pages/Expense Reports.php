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

      <div class="acm-container" style="margin-top: 100px;">
        <div class="row">
          <div class="col s4 left">
            <div class="center" >
              <div class="row">
                <form action="#" method="post">
                <div class="col s4">
                  <select id="type1" name="inputTerm">
                    <option value="" disabled selected hidden>Term</option>
                    <?php
                    // run query
                    $quser=mysqli_query($conn,"select * from `school_year`");
                    // set variable
                    while($row=mysqli_fetch_array($quser)){ ?>
                      <option value="<?php echo $row['term'] ?>"> <?php echo $row['term']; ?> </option>

                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col s6">
                  <select id="type2" name="inputSy">
                    <option value="" disabled selected hidden>School Year</option>
                    <?php
                    // run query
                    $quser=mysqli_query($conn,"select * from `school_year`");
                    // set variable
                    while($row=mysqli_fetch_array($quser)){ ?>
                      <option value="<?php echo $row['sy'] ?>"> <?php echo $row['sy']; ?> </option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col s2 right">
                  <button class="btn waves-effect waves-light " type="submit" name="go">Go
                    <i class="material-icons right">Go</i>
                  </button>
                </form>
                </div>
              </div>
            </div>
          </div>
        <form action="#" method="post">
          <div class="col s6 right" >
            <div class="col s3 right">
              <button class="btn waves-effect waves-light " type="submit" name="search">search
                <i class="material-icons right">search</i>
              </button>
            </div>
            <div class="col s7 right">
              <input placeholder="Search by Reference ID" type="text" name="inputSearch">
            </div>
          </div>
          </form>
        </div>
        <?php
        if(isset($_POST['go'])){
          $val_term = $_POST['inputTerm'];
          $val_sy = $_POST['inputSy'];
          $sql = "SELECT * FROM expense where term=$val_term AND sy=$val_sy";
          $result = mysqli_query($conn,$sql);
          $sort='ASC';
          echo'<h5 style="text-align:center;">Filter Result</h5>';
          echo'<table class="acm" id = "transactionTable" style="width:100%;">';
          echo'<th> <a href="Transaction Reports.php?sorting='.$sort.'&field=ref_id"> Reference ID </a></th>
          <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=type_id"> Type </a></th>
          <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=amount"> Amount </a></th>
          <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=term"> Term </a></th>
          <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=sy"> SY </a></th>
          <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=purpose"> purpose </a></th>
          <th><a href="Transaction Reports.php?sorting='.$sort.'&field=date_added"> Date of Transaction </a></th>';
          $typeid=0;
          $typeName="";
          while($row = mysqli_fetch_array($result))
          {
            $typeid = $row['type_id'];
            $sql1 = "SELECT * FROM type where type_id=$typeid";
            $result1 = mysqli_query($conn,$sql1);
            while($row1 = mysqli_fetch_array($result1))
            {
              $typeName = $row1['type_name'];
            }
            echo'<tr><td>'.$row['ref_id'].'</td><td>'.$typeName.'</td><td>'.$row['amount'].'</td><td>'.$row['term'].'</td><td>'.$row['sy'].'</td><td>'.$row['purpose'].'</td><td>'.$row['date_added'].'</td></tr>';
          }
          echo'</table>';
        }
        ?>
      <?php
      if(isset($_POST['search'])){
        $val = $_POST['inputSearch'];
        $sql = "SELECT * FROM expense where ref_id=$val";
        $result = mysqli_query($conn,$sql);
        $sort='ASC';
        echo'<h5 style="text-align:center;">Search Result</h5>';
        echo'<table class="acm" id = "transactionTable" style="width:100%;">';
        echo'<th> <a href="Transaction Reports.php?sorting='.$sort.'&field=ref_id"> Reference ID </a></th>
        <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=type_id"> Type </a></th>
        <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=amount"> Amount </a></th>
        <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=term"> Term </a></th>
        <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=sy"> SY </a></th>
        <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=purpose"> purpose </a></th>
        <th><a href="Transaction Reports.php?sorting='.$sort.'&field=date_added"> Date of Transaction </a></th>';
        $typeid=0;
        $typeName="";
        $typeid=0;
        $typeName="";
        while($row = mysqli_fetch_array($result))
        {
          $typeid = $row['type_id'];
          $sql1 = "SELECT * FROM type where type_id=$typeid";
          $result1 = mysqli_query($conn,$sql1);
          while($row1 = mysqli_fetch_array($result1))
          {
            $typeName = $row1['type_name'];
          }
          echo'<tr><td>'.$row['ref_id'].'</td><td>'.$typeName.'</td><td>'.$row['amount'].'</td><td>'.$row['term'].'</td><td>'.$row['sy'].'</td><td>'.$row['purpose'].'</td><td>'.$row['date_added'].'</td></tr>';
        }
        echo'</table>';
      }
      ?>
        <div class="card-panel" style="overflow:auto">
          <?php
          if(isset($_GET['sorting']))
          {
            if($_GET['sorting']=='ASC')
            {
              $sort='DESC';
            }
            else { $sort='ASC'; }
          }
          if(isset($_GET['field'])){
            if($_GET['field']=='ref_id')
            {
              $field = "ref_id";
            }
            elseif($_GET['field']=='type_id')
            {
              $field = "type_id";
            }
            elseif($_GET['field']=='amount')
            {
              $field="amount";
            }
            elseif($_GET['field']=='term')
            {
              $field="term";
            }
            elseif($_GET['field']=='sy')
            {
              $field="sy";
            }
            elseif($_GET['field']=='purpose')
            {
              $field="purpose";
            }
            elseif($_GET['field']=='date_added')
            {
              $field="date_added";
            }
            $sql = "SELECT * FROM expense ORDER BY $field $sort";
            $result = mysqli_query($conn,$sql);
            echo'<h5 style="text-align:center;">Transaction Table</h5>';
            echo'<table class="acm" id = "transactionTable" style="width:100%;">';
            echo'<th> <a href="Transaction Reports.php?sorting='.$sort.'&field=ref_id"> Reference ID </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=type_id"> Type </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=amount"> Amount </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=term"> Term </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=sy"> SY </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=purpose"> purpose </a></th>
            <th><a href="Transaction Reports.php?sorting='.$sort.'&field=date_added"> Date of Transaction </a></th>';
            $typeid=0;
            $typeName="";
            while($row = mysqli_fetch_array($result))
            {
              $typeid = $row['type_id'];
              $sql1 = "SELECT * FROM type where type_id=$typeid";
              $result1 = mysqli_query($conn,$sql1);
              while($row1 = mysqli_fetch_array($result1))
              {
                $typeName = $row1['type_name'];
              }
              echo'<tr><td>'.$row['ref_id'].'</td><td>'.$typeName.'</td><td>'.$row['amount'].'</td><td>'.$row['term'].'</td><td>'.$row['sy'].'</td><td>'.$row['purpose'].'</td><td>'.$row['date_added'].'</td></tr>';
            }
            echo'</table>';
          }else{
            $sql = "SELECT * FROM expense";
            $result = mysqli_query($conn,$sql);
            $sort='ASC';
            echo'<h5 style="text-align:center;">Transaction Table</h5>';
            echo'<table class="acm" id = "transactionTable" style="width:100%;">';
            echo'<th> <a href="Transaction Reports.php?sorting='.$sort.'&field=ref_id"> Reference ID </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=type_id"> Type </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=amount"> Amount </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=term"> Term </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=sy"> SY </a></th>
            <th> <a href="Transaction Reports.php?sorting='.$sort.'&field=purpose"> purpose </a></th>
            <th><a href="Transaction Reports.php?sorting='.$sort.'&field=date_added"> Date of Transaction </a></th>';
            $typeid=0;
            $typeName="";
            while($row = mysqli_fetch_array($result))
            {
              $typeid = $row['type_id'];
              $sql1 = "SELECT * FROM type where type_id=$typeid";
              $result1 = mysqli_query($conn,$sql1);
              while($row1 = mysqli_fetch_array($result1))
              {
                $typeName = $row1['type_name'];
              }
              echo'<tr><td>'.$row['ref_id'].'</td><td>'.$typeName.'</td><td>'.$row['amount'].'</td><td>'.$row['term'].'</td><td>'.$row['sy'].'</td><td>'.$row['purpose'].'</td><td>'.$row['date_added'].'</td></tr>';
            }
            echo'</table>';
          }
          ?>

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
