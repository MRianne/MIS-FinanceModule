<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";//CHANGE THIS
$mysql_database = "acm";//CHANGE THIS
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");

error_reporting(E_ERROR | E_PARSE);
$conn = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            session_start();
            include("conn.php");
            if (isset($_POST['searchSub'])){
                //searches Student ID
                echo "search";
            }

            if (isset($_POST['sub1'])){
               // echo "insert";
                //inserts transactions  only
            $term_slct = $_POST['term_slct'];
           // $sy_slct = $_POST['sy_slct'];
            $remarks = $_POST['remarks'];
            //$studid = $_POST['studid'];
            $feeDep = $_POST['feeDep'];
            $rnum =  $_POST['rnum'];


            //insert values
            $insert_q = "INSERT INTO expense (amount, term, sy, purpose) VALUES ($feeDep, $term_slct ,2018, $feeDep ,'$remarks')";
            $result = mysqli_query($bd,$insert_q);

            if($result){
               // echo "success";
                echo '<script type="text/javascript">alert("Transaction added")</script>';
                echo '<script>
               window.history.back();
                </script>';
            }
            else{
                echo '<script type="text/javascript">alert("Transaction not added")</script>';
                echo '<script>
                window.history.back();
            </script>';
            }

            }

            ?>


        </body>
    </main>
</html>
