$.ajax({
    type: "POST",
    url: "menu.php",
    //data: "{empid: " + empid + "}",
    //contentType: "application/json; charset=utf-8",
    contentType: "application/text/html; charset=utf-8",
    //dataType: "json",
    dataType: "html",
    success: function(result) {
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
    success: function(result) {
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
    success: function(result) {
        $("#div_loader").html(result);
    }
});


preloader = new $.materialPreloader({
    position: 'top',
    height: '5px',
    col_1: '#159756',
    col_2: '#da4733',
    col_3: '#3b78e7',
    col_4: '#fdba2c',
    fadeIn: 200,
    fadeOut: 200
});
preloader.on();
$(window).load(function() {
    preloader.off();
});
window.onload = function() {
    setTimeout(function() {
        $('body').addClass('loaded');
    }, 1000);
    setTimeout(function() {
        $('.loader').fadeOut('400');
    }, 600);
}