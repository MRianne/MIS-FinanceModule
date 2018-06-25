if($("#transactionTable").length > 0){
  $.post("../pages/reportsGenerator.php",
	{
		report: "transaction",
	},
  function(data){
      console.log(data);

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
}
