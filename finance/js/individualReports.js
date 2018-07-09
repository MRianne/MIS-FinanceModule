if($("#transactionTable").length > 0){
  $.post("../pages/Reports_Generator.php",
	{
		action: "initialize",
	},
  function(data){
    $.each(data["sy"], function( index, value ) {
      if (value == 1)
        $('#searchSY').append($('<option>', {value: index, text : index, selected: "selected"}));
      else
        $('#searchSY').append($('<option>', {value: index, text : index }));
    });
    $('#searchTerm option[value="' + data["term"] + '"]').attr("selected", "selected");
	}, "json");

  $(document).ready(function(){
    var table = $('#transactionTable').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "../pages/Reports_Generator.php",
              "data": function ( data ) {
                  data.table = "transaction";
                  data.sy = $("#searchSY option:selected").val();
                  data.term = $("#searchTerm option:selected").val();
              },
              "dataType": "jsonp"
          },
          "columns": [
              { "data": "ref_id" },
              { "data": "sy_term" },
              { "data": "type" },
              { "data": "amount" },
              { "data": "remarks", "visible": false },
              { "data": "date_added" }
          ],
          "dom": '<"top"l>t<"bottom"p><"clear">'
    });

    $('#searchID').on( 'keyup', function () {
      table
      .columns( 0 )
      .search( this.value )
      .draw();
    });

    $('#searchSY').on( 'change', function () {
      table
      .columns( 1 )
      .search( this.value )
      .draw();
    });

    $('#searchTerm').on( 'change', function () {
      table
      .columns( 1 )
      .search( this.value )
      .draw();
    });

    $('#transactionTable tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        console.log(data);
        var receipt = '<div class="container-fluid">' +
                        '<div class="row">'+
                          '<b>Reference #: ' + data["ref_id"] + ' </b>' +
                        '</div>' +
                        '<div class="row" >'+
                          '<div class="col-md-3" ><b>Date:</b></div>' +
                          '<div class="col-md-9" >' + data["date_added"] + '</div>' +
                        '</div>' +
                        '<div class="row">'+
                          '<div class="col-md-3"><b>Type:</b></div>' +
                          '<div class="col-md-9">' + data["type"] + '</div>' +
                        '</div>' +
                        '<div class="row">'+
                          '<div class="col-md-3"><b>SY - Term:</b></div>' +
                          '<div class="col-md-9">' + data["sy_term"] + '</div>' +
                        '</div>' +
                        '<div class="row">'+
                          '<div class="col-md-3"><b>Amount:</b></div>' +
                          '<div class="col-md-9">' + data["amount"] + '</div>' +
                        '</div>' +
                        '<div class="row" style = "height: 18%">' +
                          '<div class="col-md-3"><b>Remarks:</b></div>' +
                          '<div class="col-md-9" style = "word-wrap: break-word;">' +
                          data["remarks"] + '</div>' +
                        '</div>' +
                        '<div class="row" style = "float:right">' +
                        '<a class="modal-close waves-effect waves-light btn ">Ok</a>' +
                        '</div>' +
                      '</div>';

        $('.modal-content').html(receipt);
        var res = $("#receipt").modal();
        var instance = M.Modal.getInstance(res);
        instance.open();
        $("#receipt").css({"display": "flex",  "height": "60%", "overflow": "auto"});
    } );

  });
}

else if($("#expenseTable").length > 0){
  $.post("../pages/Reports_Generator.php",
	{
		action: "initialize",
	},
  function(data){
    console.log($("#searchSY option:selected").val());
    $.each(data["sy"], function( index, value ) {
      if (value == 1)
        $('#searchSY').append($('<option>', {value: index, text : index, selected: "selected"}));
      else
        $('#searchSY').append($('<option>', {value: index, text : index }));
    });
    $('#searchTerm option[value="' + data["term"] + '"]').attr("selected", "selected");
	}, "json");

  $(document).ready(function(){
    var table = $('#expenseTable').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "../pages/Reports_Generator.php",
              "data": function ( data ) {
                  data.table = "expense";
                  data.sy = $("#searchSY option:selected").val();
                  data.term = $("#searchTerm option:selected").val();
              },
              "dataType": "jsonp"
          },
          "columns": [
              { "data": "ref_id" },
              { "data": "sy_term" },
              { "data": "type" },
              { "data": "amount" },
              { "data": "purpose", "visible": false },
              { "data": "date_added" }
          ],
          "dom": '<"top"l>t<"bottom"p><"clear">'
    });

    $('#searchID').on( 'keyup', function () {
      table
      .columns( 0 )
      .search( this.value )
      .draw();
    });

    $('#searchSY').on( 'change', function () {
      table
      .columns( 1 )
      .search( this.value )
      .draw();
    });

    $('#searchTerm').on( 'change', function () {
      table
      .columns( 1 )
      .search( this.value )
      .draw();
    });

    $('#expenseTable tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        console.log(data);
        var receipt = '<div class="container-fluid">' +
                        '<div class="row">'+
                          '<b>Reference #: ' + data["ref_id"] + ' </b>' +
                        '</div>' +
                        '<div class="row" >'+
                          '<div class="col-md-3" ><b>Date:</b></div>' +
                          '<div class="col-md-9" >' + data["date_added"] + '</div>' +
                        '</div>' +
                        '<div class="row">'+
                          '<div class="col-md-3"><b>Type:</b></div>' +
                          '<div class="col-md-9">' + data["type"] + '</div>' +
                        '</div>' +
                        '<div class="row">'+
                          '<div class="col-md-3"><b>SY - Term:</b></div>' +
                          '<div class="col-md-9">' + data["sy_term"] + '</div>' +
                        '</div>' +
                        '<div class="row">'+
                          '<div class="col-md-3"><b>Amount:</b></div>' +
                          '<div class="col-md-9">' + data["amount"] + '</div>' +
                        '</div>' +
                        '<div class="row" style = "height: 18%">' +
                          '<div class="col-md-3"><b>Remarks:</b></div>' +
                          '<div class="col-md-9" style = "word-wrap: break-word;">' +
                          data["purpose"] + '</div>' +
                        '</div>' +
                        '<div class="row" style = "float:right">' +
                        '<a class="modal-close waves-effect waves-light btn ">Ok</a>' +
                        '</div>' +
                      '</div>';

        $('.modal-content').html(receipt);
        var res = $("#receipt").modal();
        var instance = M.Modal.getInstance(res);
        instance.open();
        $("#receipt").css({"display": "flex",  "height": "60%", "overflow": "auto"});
    } );

  });
}
