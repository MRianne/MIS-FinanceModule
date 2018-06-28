$.post("../dummydata.php",
	{},
  function(data){

    var arr = [];
    var date = [];
    console.log( data);
    console.log(arr);

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
          data: data["rows"]["1"]
        }
      ]
    };

    var ctx = $("#mycanvas");

    var LineGraph = new Chart(ctx, {
      type: 'line',
      data: chartdata
    });
}, "json");
