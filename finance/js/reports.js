if($("#transactionTable").length > 0){
  $.post("../pages/reportsGenerator.php",
	{
		report: "transaction",
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
