if($("#transactionTable").length > 0){
  $.post("../pages/reportsGenerator.php",
	{
		report: "transaction",
	},
  function(data){
      console.log(data);
	}, "json");
}
