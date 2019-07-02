$(document).ready(function() {
    $('.carreras').select2();

    $("#numero-cuenta").on("keypress keyup blur",function (event) {
        if ($(this).val().length >= 11){
            // console.log($(this).val().length);
            event.preventDefault();
            return;
        }
        //this.value = this.value.replace(/[^0-9\.]/g,'');
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $("#numero-identidad").on("keypress keyup blur",function (event) {
        if ($(this).val().length >= 13){
            // console.log($(this).val().length);
            event.preventDefault();
            return;
        }
        //this.value = this.value.replace(/[^0-9\.]/g,'');
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

});

