$.ajax({
    type: "POST",
    url: "menu.php",
    //data: "{empid: " + empid + "}",
    //contentType: "application/json; charset=utf-8",
    contentType: "application/text/html; charset=utf-8",
    //dataType: "json",
    dataType: "html",
    success: function (result) {
        $("#div-menu").html(result);
    }
});


$.ajax({
    type: "POST",
    url: "piePagina.html",
    //data: "{empid: " + empid + "}",
    //contentType: "application/json; charset=utf-8",
    contentType: "application/text/html; charset=utf-8",
    //dataType: "json",
    dataType: "html",
    success: function (result) {
        $("#div-piePagina").html(result);
    }
});

$.ajax({
    type: "POST",
    url: "loader.html",
    //data: "{empid: " + empid + "}",
    //contentType: "application/json; charset=utf-8",
    contentType: "application/text/html; charset=utf-8",
    //dataType: "json",
    dataType: "html",
    success: function (result) {
        $("#div_loader").html(result);
    }
});


