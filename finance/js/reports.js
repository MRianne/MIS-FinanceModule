if($("#transactionTable").length > 0){
  $.post("../pages/reportsGenerator.php",
	{
		report: "transaction",
	},
  function(data){
      console.log(data);
<<<<<<< HEAD

var chartdata = {
        labels: ref_id,
        datasets: [
          {
            label: "amount",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: amt
            console.log("success chart data");
          }
        ]
      };
        var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    }, "json");
=======
      $.each(data, function( index, value ) {
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
>>>>>>> b00f4b18e12a3e2e3f8ac3057a8027ab24087ad8
}
