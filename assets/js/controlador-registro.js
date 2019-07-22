$(document).ready(function() {


    $('#nombres').on('input', function() {
        var input=$(this);
        var nombres=input.val();
        if(nombres){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#apellidos').on('input', function() {
        var input=$(this);
        var apellidos=input.val();
        if(apellidos){input.removeClass("invalid").addClass("valid");}
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
        console.log(valid)
        if(valid){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#email').on('input', function() {
        var input=$(this);
        var email=input.val();
        if(email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#password').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g);
        if(valid) {input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#password2').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g);
        if(valid && val === $('#password').val()) {
            input.removeClass("invalid").addClass("valid");
        }
        else{input.removeClass("valid").addClass("invalid");}
    });

    $("#submit").click(function(event) {
        
        var form_data=$("#form").serializeArray();
        var error_free=true;
        var mensaje = '';
        console.log(form_data)
        for (var input in form_data){
            var element=$("#"+form_data[input]['name']);
            
            switch (Number(input)) {
                case 0:
                    if (element.val() == ''){
                        mensaje = 'Introduzca su nombre.';
                        error_free = false;
                    }
                    break;
                case 1:
                    if (element.val() == ''){
                        mensaje = 'Introduzca su apellido.';
                        error_free = false;
                    }
                    break;
                case 2:
                    if (!element.val().match(/\d{4}-\d{4}-\d{5}/g)){
                        mensaje = 'Número de identidad incompleto.';
                        error_free = false;
                    }
                    break;
                case 3:
                    if (!element.val().match(/\d{11}/g)){
                        mensaje = 'Número de cuenta incompleto.';
                        error_free = false;
                    }
                    break;
                case 4:
                    if (!element.val().match(/\(504\)\ \d{4}-\d{4}/g)){
                        mensaje = 'Número de teléfono incompleto.';
                        error_free = false;
                    }
                    break;
                case 5:
                    if (!element.val().match(/[a-z]+/g)){
                        mensaje = 'Correo institucional no válido.';
                        error_free = false;
                    }
                    if (element.val() == ''){
                        mensaje = 'Introduzca su correo institucional.';
                        error_free = false;
                    }
                    break;
                case 6:
                    if (element.val() == 0){
                        mensaje = 'Seleccione un género.';
                        error_free = false;
                    }
                    break;
                case 7:
                    if (element.val() == 0){
                        mensaje = 'Seleccione una carrera.';
                        error_free = false;
                    }
                    break;
                case 8:
                    if (!element.val().match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g)){
                        mensaje = 'Introduzca una contraseña de al menos 8 caracteres incluyendo letras mayúsculas, minúsculas, números y caracteres especiales como #?!@$%^&*-.';
                        error_free = false;
                    }
                    if (element.val() == ''){
                        mensaje = 'Introduzca su contraseña.';
                        error_free = false;
                    }
                    break;
                case 9:
                    if (!element.val().match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g)){
                        mensaje = 'Introduzca una contraseña de al menos 8 caracteres, incluyendo letras mayúsculas, minúsculas, números y caracteres especiales como #?!@$%^&*-.';
                        error_free = false;
                    }
                    if (element.val() == ''){
                        mensaje = 'Introduzca de nuevo su contraseña.';
                        error_free = false;
                        break;
                    }
                    if (element.val() !== $('#password').val()){
                        mensaje = 'Las contraseñas deben ser iguales.';
                        error_free = false;
                    }
                    break;
                default:
                    break;
            }
            if (!error_free) break;

        }
        if (!error_free){
            event.preventDefault(); 
            swal({   
                title: "Datos incorrectos",   
                text: mensaje,   
                type: "warning",   
                // showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Modificar datos", 
                closeOnConfirm: false 
            });
        }
        else{
            event.preventDefault();
                
                $.ajax({
                    url:'./assets/ajax/envio_registro.php',
                    method:'POST',
                    data: form_data,
                    success: function(data){
                        console.log(data)
                        swal({   
                            title: "¡Bien hecho!",   
                            text: data,   
                            type: "success",      
                            confirmButtonText: "Ir al login", 
                            closeOnConfirm: false 
                        }, function(){  
                            window.open("./log-in.php","_self")
                        });   
                    }     
                });	
            // });
        }
    });

});
