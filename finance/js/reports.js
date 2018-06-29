if($("#transactionTable").length > 0){
  $.post("../pages/reportsGenerator.php",
	{
		report: "transaction",
	},
  function(data){
    console.log(data);
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

    var ctx = $("#mycanvas");

    var LineGraph = new Chart(ctx, {
      type: 'line',
      data: chartdata
    });

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
	}, "json");
}

else if($("#expenseTable").length > 0){
  $.post("../pages/reportsGenerator.php",
	{
		report: "expense",
	},
  function(data){
      console.log(data);
      $.each(data, function( index, value ) {
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
