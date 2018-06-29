$.post("../dummydata.php",
	{},
  function(data){

    // for(var i in data["rows"]) {
    //   if(!date.includes(data["rows"][i].date_added))
    //     date.push(data["rows"][i].date_added);
		//
    //   if(arr.length > 0 && arr.some( function(a){ return a["type"] == data["rows"][i].type_id;})
    //       && arr["dates"].some( function(a){ return a["dates"] == data["rows"][i].date_added;})) {
    //     for(var a in arr) {
    //       if(arr[a].type == data["rows"][i].type_id){
    //         arr[a].amounts += parseInt(data["rows"][i].amount);
    //         break;
    //       }
    //     }
    //   }
    //   else {
    //     var a = {
    //       'type' : data["rows"][i].type_id,
    //       'dates' : {data["rows"][i].date_added : parseInt(data["rows"][i].amount)}
    //     }
    //     arr.push(a);
    //   }
    // }

    var arr1 = [];
		var arr2 = [];
    var date = [];
    console.log(data);

		for(var i in data["rows"]["1"]) {
			arr1.push(data["rows"]["1"][i]);
			date.push(i);
		}
		for(var i in data["rows"]["2"]) {
			arr2.push(data["rows"]["2"][i]);
			if (!date.some( function(a){ return a == i;}))
				date.push(i);
		}
    console.log(arr1);

    var chartdata = {
      labels: date,
      datasets: [
        {
          label: "Type  1",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(59, 89, 152, 0.75)",
          borderColor: "rgba(59, 89, 152, 1)",
          pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
          pointHoverBorderColor: "rgba(59, 89, 152, 1)",
          data: arr1
        },
				{
          label: "Type  2",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(59, 89, 152, 1.50)",
          borderColor: "rgba(59, 89, 152, 2)",
          pointHoverBackgroundColor: "rgba(59, 89, 152, 2)",
          pointHoverBorderColor: "rgba(59, 89, 152, 2)",
          data: arr2
        }
      ]
    };

    var ctx = $("#mycanvas");

    var LineGraph = new Chart(ctx, {
      type: 'line',
      data: chartdata
    });
}, "json");
