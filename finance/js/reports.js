function transaction(){
	$.post("reportsGenerator.php" ,
      {report: "transaction"},
      function(data){

        console.log(data);
        
      }, "json");
}