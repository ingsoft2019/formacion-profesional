$(document).ready(function() {
    // $("#numero-cuenta").on("keypress keyup blur",function (event) {
    //     if ($(this).val().length >= 11){
    //         // console.log($(this).val().length);
    //         event.preventDefault();
    //         return;
    //     }
    //     //this.value = this.value.replace(/[^0-9\.]/g,'');
    //     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
    //     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    //         event.preventDefault();
    //     }
    // });

    // $("#numero-identidad").on("keypress keyup blur",function (event) {
    //     if ($(this).val().length >= 13){
    //         // console.log($(this).val().length);
    //         event.preventDefault();
    //         return;
    //     }
    //     //this.value = this.value.replace(/[^0-9\.]/g,'');
    //     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
    //     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    //         event.preventDefault();
    //     }
    // });

    // $("#telefono").on("keypress keyup blur",function (event) {
    //     if ($(this).val().length >= 8){
    //         // console.log($(this).val().length);
    //         event.preventDefault();
    //         return;
    //     }
    //     //this.value = this.value.replace(/[^0-9\.]/g,'');
    //     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
    //     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    //         event.preventDefault();
    //     }
    // });

    $('#nombres').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#apellidos').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#numero-identidad').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/\d{4}-\d{4}-\d{5}/g)
        if(valid){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#numero-cuenta').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/\d{11}/g)
        if(valid){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#telefono').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/\(504\)\ \d{4}-\d{4}/g)
        if(valid){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#email').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#password').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name.length >= 8){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#password2').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name.length >= 8){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $("#submit").click(function(event) {
        
        var form_data=$("#form").serializeArray();
        var error_free=true;
        console.log(form_data)
        for (var input in form_data){
            if(input == 6 || input == 7) {
                if (form_data[input]['value'] != 0){
                    error_free = false;
                    break;
                } else{
                    continue;
                }
            }
            var element=$("#"+form_data[input]['name']);
            var valid=element.hasClass("valid");
            if (!valid){ error_free=false; break;}
            else{error_element.removeClass("error_show").addClass("error");}
        }
        if (!error_free){
            console.log("ERROR!!")
            event.preventDefault(); 
        }
        else{
            alert('No errors: Form will be submitted');
        }
    });

});

