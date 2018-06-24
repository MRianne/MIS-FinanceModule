<!DOCTYPE html>
<html>
    <head>

        <title>Transaction Reports</title>

        <title>Overall report</title>
        <!-- Our Custom CSS -->
         <link rel="stylesheet" href="../css/finance.css">
        <link rel="stylesheet" href="../../css/acm.php">
        <link rel="stylesheet" href="../../css/materialize.css">
        <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 

<script>
window.onload = function () {
	
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Transaction Reports"
    },
    axisX:{
        valueFormatString: "DD MMM",
        crosshair: {
            enabled: true,
            snapToDataPoint: true
        }
    },
    axisY: {
        title: "Number of Visits",
        crosshair: {
            enabled: true
        }
    },
    toolTip:{
        shared:true
    },
    legend:{
        cursor:"pointer",
        verticalAlign: "bottom",
        horizontalAlign: "left",
        dockInsidePlotArea: true,
        itemclick: toogleDataSeries
    },
    data: [{
        type: "line",
        showInLegend: true,
        name: "Total Visit",
        markerType: "square",
        xValueFormatString: "DD MMM, YYYY",
        color: "#F08080",
        dataPoints: [
            { x: new Date(2017, 0, 3), y: 650 },
            { x: new Date(2017, 0, 4), y: 700 },
            { x: new Date(2017, 0, 5), y: 710 },
            { x: new Date(2017, 0, 6), y: 658 },
            { x: new Date(2017, 0, 7), y: 734 },
            { x: new Date(2017, 0, 8), y: 963 },
            { x: new Date(2017, 0, 9), y: 847 },
            { x: new Date(2017, 0, 10), y: 853 },
            { x: new Date(2017, 0, 11), y: 869 },
            { x: new Date(2017, 0, 12), y: 943 },
            { x: new Date(2017, 0, 13), y: 970 },
            { x: new Date(2017, 0, 14), y: 869 },
            { x: new Date(2017, 0, 15), y: 890 },
            { x: new Date(2017, 0, 16), y: 930 }
        ]
    },
    {
        type: "line",
        showInLegend: true,
        name: "Unique Visit",
        lineDashType: "dash",
        dataPoints: [
            { x: new Date(2017, 0, 3), y: 510 },
            { x: new Date(2017, 0, 4), y: 560 },
            { x: new Date(2017, 0, 5), y: 540 },
            { x: new Date(2017, 0, 6), y: 558 },
            { x: new Date(2017, 0, 7), y: 544 },
            { x: new Date(2017, 0, 8), y: 693 },
            { x: new Date(2017, 0, 9), y: 657 },
            { x: new Date(2017, 0, 10), y: 663 },
            { x: new Date(2017, 0, 11), y: 639 },
            { x: new Date(2017, 0, 12), y: 673 },
            { x: new Date(2017, 0, 13), y: 660 },
            { x: new Date(2017, 0, 14), y: 562 },
            { x: new Date(2017, 0, 15), y: 643 },
            { x: new Date(2017, 0, 16), y: 570 }
        ]
    }]
});
chart.render();

function toogleDataSeries(e){
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else{
        e.dataSeries.visible = true;
    }
    chart.render();
}

}
</script>
    </head>
    <body>

        <div class="wrapper">
            <?php $page = 'overall'; include('navBar.php'); ?>
            <!-- Page Content Holder -->
            <div id="content">


<div id="chartContainer" style="height: 300px; width: 70%; margin: auto;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                    <div class="table">

                        <div class="row header">
                            <div class="cell">
                                Full Name
                            </div>
                            <div class="cell">
                                Age
                            </div>
                            <div class="cell">
                                Job Title
                            </div>
                            <div class="cell">
                                Location
                            </div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="Full Name">
                                Vincent Williamson
                            </div>
                            <div class="cell" data-title="Age">
                                31
                            </div>
                            <div class="cell" data-title="Job Title">
                                iOS Developer
                            </div>
                            <div class="cell" data-title="Location">
                                Washington
                            </div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="Full Name">
                                Joseph Smith
                            </div>
                            <div class="cell" data-title="Age">
                                27
                            </div>
                            <div class="cell" data-title="Job Title">
                                Project Manager
                            </div>
                            <div class="cell" data-title="Location">
                                Somerville, MA
                            </div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="Full Name">
                                Justin Black
                            </div>
                            <div class="cell" data-title="Age">
                                26
                            </div>
                            <div class="cell" data-title="Job Title">
                                Front-End Developer
                            </div>
                            <div class="cell" data-title="Location">
                                Los Angeles
                            </div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="Full Name">
                                Sean Guzman
                            </div>
                            <div class="cell" data-title="Age">
                                25
                            </div>
                            <div class="cell" data-title="Job Title">
                                Web Designer
                            </div>
                            <div class="cell" data-title="Location">
                                San Francisco
                            </div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="Full Name">
                                Keith Carter
                            </div>
                            <div class="cell" data-title="Age">
                                20
                            </div>
                            <div class="cell" data-title="Job Title">
                                Graphic Designer
                            </div>
                            <div class="cell" data-title="Location">
                                New York, NY
                            </div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="Full Name">
                                Austin Medina
                            </div>
                            <div class="cell" data-title="Age">
                                32
                            </div>
                            <div class="cell" data-title="Job Title">
                                Photographer
                            </div>
                            <div class="cell" data-title="Location">
                                New York
                            </div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="Full Name">
                                Vincent Williamson
                            </div>
                            <div class="cell" data-title="Age">
                                31
                            </div>
                            <div class="cell" data-title="Job Title">
                                iOS Developer
                            </div>
                            <div class="cell" data-title="Location">
                                Washington
                            </div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="Full Name">
                                Joseph Smith
                            </div>
                            <div class="cell" data-title="Age">
                                27
                            </div>
                            <div class="cell" data-title="Job Title">
                                Project Manager
                            </div>
                            <div class="cell" data-title="Location">
                                Somerville, MA
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>

    <?php
    include('modal.php');
    ?>
            </div>

        </div>

    
<!--hiddens--->
   <ul id="addDropdown" class="dropdown-content">
      <li><a href="Add Transaction.html">Add Transaction</a></li>
      <li><a href="Add Expense.html">Add Expense</a></li>
    </ul>
<!--scripts--->


   
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../../js/materialize.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../js/pie.js"></script>

    <script src="../js/values.js"></script>
    </body>
</html>