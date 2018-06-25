$.post("../dummydata.php",
	{},
  function(data){

    var arr = [];
    var date = [];

    for(var i in data) {
      if(!date.includes(data[i].date_added))
        date.push(data[i].date_added);
      if(arr.length > 0 && arr.some( function(a){ return a["type"] == data[i].type_id;})
          && arr.some( function(a){ return a["date"] == data[i].date_added;})) {
        for(var a in arr) {
          if(arr[a].type == data[i].type_id){
            arr[a].amounts += parseInt(data[i].amount);
            break;
          }
        }
      }
      else {
        var a = {
          'type' : data[i].type_id,
          'date' : data[i].date_added,
          'amounts' : parseInt(data[i].amount)
        }
        arr.push(a);
      }
    }

    console.log(date);
    console.log(arr);

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
          data: arr[0]["amounts"]
        },
        {
          label: "Type  1",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(59, 89, 152, 0.75)",
          borderColor: "rgba(59, 89, 152, 1)",
          pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
          pointHoverBorderColor: "rgba(59, 89, 152, 1)",
          data: arr[1]["amounts"]
        }
      ]
    };

    var ctx = $("#mycanvas");

    var LineGraph = new Chart(ctx, {
      type: 'line',
      data: chartdata
    });
}, "json");
