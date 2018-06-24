/*---------overall page------------*/
//height equivalents
$(".chart").css({'height':($(".bar-equiv").height())+'px'});

//piechart & bar  values
$(function(){
  $("#doughnutChart").drawDoughnutChart([
    { title: "Tokyo",         value : 10,  color: "#B2BB1D" },
    { title: "San Francisco", value:  80,   color: "#72CDF4" },
    { title: "New York",      value:  70,   color: "#781D7E" },
    { title: "London",        value : 50,   color: "#EF4035" },
    { title: "Sydney",        value : 40,   color: "#F59F1A" },
    { title: "Berlin",        value : 20,   color: "#FFD200" }
    /*other color if u wanna add
    { title: "Berlin",        value : 20,   color: "#005596" }*/
  ]);
});

/*---------end values for overall page----*/