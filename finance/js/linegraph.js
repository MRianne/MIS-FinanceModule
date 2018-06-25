$(document).ready(function(){
  $.ajax({
    url : "http://localhost/acm/dummydata.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var userid = [];
      var student_role = [];
      var admin_role = [];

      for(var i in data) {
        userid.push("userid " + data[i].userid);
        student_role.push(data[i].Student);
        admin_role.push(data[i].Admin);
      }

      var chartdata = {
        labels: userid,
        datasets: [
          {
            label: "Student",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: student_role
          },
          {
            label: "Admin",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(29, 202, 255, 0.75)",
            borderColor: "rgba(29, 202, 255, 1)",
            pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
            pointHoverBorderColor: "rgba(29, 202, 255, 1)",
            data: admin_role
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