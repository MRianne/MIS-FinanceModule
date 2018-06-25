$(document).ready(function(){
  $.ajax({
    url : "http://localhost/acm/dummydata.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var ref_id = [];
      var amt = [];

      for(var i in data) {
        ref_id.push("ref_id " + data[i].ref_id);
        amt.push(data[i].amount);
      }

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
          }
        ]
      };

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {

    }
  });
});