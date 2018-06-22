<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Transaction Reports</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../css/style4.css">
        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>

<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

<style>
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
    </head>
    <body>

        <div class="wrapper">
            <?php include("navBar.php"); ?>

            <!-- Page Content Holder -->
            <div id="content" style="width:100%;">
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Reference ID.." title="Type in a name">
              <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                  <th style="text-align:center;">Reference ID</th>
                  <th style="text-align:center;">Type ID</th>
                  <th style="text-align:center;">Amount</th>
                  <th style="text-align:center;">Term</th>
                  <th style="text-align:center;">SY</th>
                  <th style="text-align:center;">Remarks</th>
                  <th style="text-align:center;">Date</th>
                </thead>
                  <tbody>
                    <?php
                    include('dbcon.php');
                      $quser=mysqli_query($conn,"select * from `transactions`");
                      while($urow=mysqli_fetch_array($quser)){
                        ?>
                          <tr>
                            <td style="text-align:center;"><?php echo $urow['ref_id']; ?></td>
                            <td style="text-align:center;"><?php echo $urow['type_id']; ?></td>
                            <td style="text-align:center;"><?php echo $urow['amount']; ?></td>
                            <td style="text-align:center;"><?php echo $urow['term']; ?></td>
                            <td style="text-align:center;"><?php echo $urow['sy']; ?></td>
                            <td style="text-align:center;"><?php echo $urow['remarks']; ?></td>
                            <td style="text-align:center;"><?php echo $urow['date_added']; ?></td>
                          </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="text-align:center;">Reference ID</th>
                      <th style="text-align:center;">Type ID</th>
                      <th style="text-align:center;">Amount</th>
                      <th style="text-align:center;">Term</th>
                      <th style="text-align:center;">SY</th>
                      <th style="text-align:center;">Remarks</th>
                      <th style="text-align:center;">Date</th>
                    </tr>
                  </tfoot>
              </table>

          </div>




        <!-- Page level plugin JavaScript-->
        <script src="/acm/finance/vendor/datatables/jquery.dataTables.js"></script>
        <script src="/acm/finance/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for this page-->
        <script src="/acm/finance/js/sb-admin-datatables.min.js"></script>
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

         <script>
          function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[0];
              if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }
            }
          }
          </script>
    </body>
</html>
