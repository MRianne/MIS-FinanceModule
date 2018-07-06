if($("#transactionTable").length > 0){
  $.post("../pages/reportsGenerator.php",
	{
		report: "transaction",
	},
  function(data){
    console.log(data);
    $.each(data["table"], function( index, value ) {
      var row = '<tr>';
      row += '<td>' + value["id"] + '</td>';
      row += '<td>' + value["sy"].substr(2, 2) + value["sy"].substr(6) + ' - ' + value["term"] + '</td>';
      row += '<td>' + value["type"] + '</td>';
      row += '<td>' + value["amount"] + '</td>';
      row += '<td>' + value["date_added"] + '</td>';
      row += '</tr>';
      $("#transactionTable tbody").append(row);
    });

    var table = $('#transactionTable').DataTable({
        "dom": '<"top">t<"bottom"lp><"clear">'
    } );

    $('#searchID').on( 'keyup', function () {
        table
        .columns( 0 )
        .search( this.value )
        .draw();
    } );
	}, "json");
}

else if($("#expenseTable").length > 0){
  $.post("../pages/reportsGenerator.php",
	{
		report: "expense",
	},
  function(data){
      console.log(data);

      $.each(data["table"], function( index, value ) {
        var row = '<tr>';
        row += '<td>' + value["id"] + '</td>';
        row += '<td>' + value["sy"].substr(2, 2) + value["sy"].substr(6) + ' - ' + value["term"] + '</td>';
        row += '<td>' + value["type"] + '</td>';
        row += '<td>' + value["amount"] + '</td>';
        row += '<td>' + value["date_added"] + '</td>';
        row += '</tr>';
        $("#expenseTable tbody").append(row);
      });
	}, "json");
}

function expenseLineChart(){
  var r = 220;
  var g = 75;
  var b = 75;
  var dataCharts = [];
  var date = [];

  $.each(data["type"], function( index, value ) {
    if(data["chart"][value["name"]] != null){

      var arr = [];
      for(var i in data["chart"][value["name"]]) {
        arr.push(data["chart"][value["name"]][i]);
        if(!date.includes(i))
           date.push(i);
      }

      var d = [];
      d["label"] = value["name"];
      d["fill"] = false;
      d["lineTension"] = 0.1;
      d["backgroundColor"] = "rgb(" + r + "," + g + "," + b + ")";
      d["borderColor"] = "rgb(" + r + "," + g + "," + b + ")";
      d["pointHoverBorderColor"] = "rgb(" + r + "," + g + "," + (b - 0.5) + ")";
      d["pointHoverBackgroundColor"] = "rgb(" + r + "," + g + "," + b + ")";
      d["data"] = arr;
      dataCharts.push(d);

      r = r - 40;
      g = g - 20;
      b = b - 30;
    }
  });

  var chartdata = {
    labels: date,
    datasets: dataCharts
  };

  var ctx = $("#expenseLC");

  var LineGraph = new Chart(ctx, {
    type: 'line',
    data: chartdata
  });
}

function transactionLineChart(){
  var r = 180;
  var g = 255;
  var b = 160;
  var dataCharts = [];
  var date = [];

  $.each(data["type"], function( index, value ) {
    if(data["chart"][value["name"]] != null){

      var arr = [];
      for(var i in data["chart"][value["name"]]) {
        arr.push(data["chart"][value["name"]][i]);
        if(!date.includes(i))
           date.push(i);
      }

      var d = [];
      d["label"] = value["name"];
      d["fill"] = false;
      d["lineTension"] = 0.1;
      d["backgroundColor"] = "rgb(" + r + "," + g + "," + b + ")";
      d["borderColor"] = "rgb(" + r + "," + g + "," + b + ")";
      d["pointHoverBorderColor"] = "rgb(" + r + "," + g + "," + (b - 0.5) + ")";
      d["pointHoverBackgroundColor"] = "rgb(" + r + "," + g + "," + b + ")";
      d["data"] = arr;
      dataCharts.push(d);

      r = r - 30;
      g = g - 40;
      b = b - 20;
    }
  });

  var chartdata = {
    labels: date,
    datasets: dataCharts
  };

  var ctx = $("#transactionLC");

  var LineGraph = new Chart(ctx, {
    type: 'line',
    data: chartdata
  });
}
