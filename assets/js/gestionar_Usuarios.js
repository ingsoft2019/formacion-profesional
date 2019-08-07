var funcion_actual_orientador = 0;

$(document).ready(function() {
    $("tbody").click(function(event) {
        if (event.target.className == "material-icons remove_button") {
            removeUser(event.target.attributes[1].nodeValue);
        }
        if (event.target.className == "material-icons info_button") {
            get_perfil(event.target.attributes[1].nodeValue);
            show_modal_info();
            //console.log($('#slc_funcion_orientador').val());
        }
    });

    $("#btn_eliminarUsuario").click(function(event) {
        removeUser(event.target.getAttribute('data-id'));
    });

    $("#btn_cancelar_cambios").click(function(event) {
        $('#user_modal_information').closeModal();
    });

    $("#btn_guardar_cambios").click(function(event) {
        actualizar_funcion_orientador(event.target.getAttribute('data-id'));
    });

    $('#slc_funcion_orientador').change(function() {
        setTimeout(function() {
            //console.log($('#slc_funcion_orientador').val());
            //console.log(funcion_actual_orientador);
            $('#btn_guardar_cambios').show();
            if ($('#slc_funcion_orientador').val() == null) {
                $('#btn_guardar_cambios').hide();
            } else if (jQuery.compare($('#slc_funcion_orientador').val(), funcion_actual_orientador)) {
                $('#btn_guardar_cambios').hide();
            } else {
                $('#btn_guardar_cambios').show();
            }
        }, 300);
    });

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

    $('#identidad').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/\d{4}-\d{4}-\d{5}/g)
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
        var email=input.val();
        if(email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    

    $("#btn_crearUsuario").click(function(event) {
        
        var form_data_g=$("#form_g").serializeArray();
        var error_free=true;
        var mensaje = '';
        console.log(form_data_g)
        //if(form_data_g.length<8){
            for (var input in form_data_g){
                var element=$("#"+form_data_g[input]['name']);
                    switch (Number(input)) {
                        case 0:
                            if (!element.val().match(/\d{4}-\d{4}-\d{5}/g)){
                                mensaje = 'Número de identidad incompleto.';
                                error_free = false;
                            }
                            break;
                        case 1:
                            if (!element.val().match(/\(504\)\ \d{4}-\d{4}/g)){
                                mensaje = 'Número de teléfono incompleto.';
                                error_free = false;
                            }
                            break;
                        case 2:
                            if (element.val() == ''){
                                mensaje = 'Introduzca el nombre.';
                                error_free = false;
                            }
                            break;
                        case 3:
                            if (element.val() == ''){
                                mensaje = 'Introduzca su apellido.';
                                error_free = false;
                            }
                            break;
                        
                        case 4:
                            if (!element.val().match(/[a-z]+/g)){
                                mensaje = 'Correo institucional no válido.';
                                error_free = false;
                            }
                            if (element.val() == ''){
                                mensaje = 'Introduzca su correo institucional.';
                                error_free = false;
                            }
                            break;
                        case 5:
                                if (element.val() == ''){
                                    mensaje = 'Genere la contraseña por defecto.';
                                    error_free = false;
                                }
                                break;
                        case 6:
                                if (element.val() == 0){
                                    mensaje = 'Seleccione un Cargo.';
                                    error_free = false;
                                }
                                break;
                        case 7:
                            if (element.val() == 0){
                                mensaje = 'Seleccione un género.';
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
                    title: "Datos incompletos",   
                    text: mensaje,   
                    type: "warning",   
                    // showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Modificar datos", 
                    closeOnConfirm: true 
                });
            }
            else{
                event.preventDefault();
                    
                    $.ajax({
                        url:'./assets/ajax/envio_registro_G.php',
                        method:'POST',
                        data: form_data_g,
                        success: function(data){
                            console.log(data)
                            if(data.match(/Alguien/g)){
                                swal({   
                                    title: "Datos incorrectos",   
                                    text: data,   
                                    type: "error",      
                                    confirmButtonText: "Modificar datos", 
                                    closeOnConfirm: true 
                                })
                            }
                            if(data.match(/Datos/g)){
                                swal({   
                                    title: "Atencion",   
                                    text: data,   
                                    type: "warning",   
                                    confirmButtonColor: "#DD6B55",   
                                    confirmButtonText: "Completar datos", 
                                    closeOnConfirm: true 
                                })
                            }else{
                                swal({   
                                    title: "¡Bien hecho!",   
                                    text: data,   
                                    type: "success",      
                                    confirmButtonText: "Ok", 
                                    closeOnConfirm: true
                                }, function(){  
                                    window.open("./gestionar_Usuarios.php","_self")
                                });
                            }   
                        }     
                    });	
            }
    });
    

});

$("#btn_generarPass").click(function(e) {
    var listado = Array ("Asdf-4567","QeiE@3043","LLaj#2145","Gsmd*12qw","pQ12-Pr6r",
    "Tlk7-145a","Cd12*21tr");

    aleatorio = Math.floor(Math.random()*(listado.length));
    var celda = listado[aleatorio];

    $("#password").prop({'value': celda});
    e.preventDefault();
});

$("#btn_cancelarNuevo").click(function() {
    $("#mdl_nuevoUsuario").hide();
});
function render_lista_usuarios() {
    //FUNCION AJAX PARA CARGAR TODOS LOS USUARIOS
}

//funcion para remover visualmente al usuario Falta agregar AJAX para eliminarlo de la base de datos.
const removeUser = (id) => {
    swal({
        title: "¿Seguro que desea eliminar a " + $('#' + id).find("td").eq(1).html() + "?",
        text: "Los cambios se guardarán permanentemente.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2196F3",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm) {
        if (isConfirm) {
            const user = $(`.user_row[id=${id}]`);
            user.hide("slow", function() { $(this).remove(); })
            swal("Completo", "Usuario eliminado.", "success");
            $("#user_modal_information").closeModal();
            $.ajax({
                url: './assets/ajax/gestion_perfiles.php?accion=delete',
                method: 'POST',
                data: "id=" + id,
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                }

            });
        } else {
            swal("Cancelado", "Acción cancelada.", "error");
        }
    });
};

function show_modal_info() {
    $('#user_modal_information').openModal();
    setTimeout(function() {
        //console.log($('#slc_funcion_orientador').val());
        funcion_actual_orientador = $('#slc_funcion_orientador').val();
    }, 500);
}

function actualizar_funcion_orientador(id) {
    parametros = "id=" + id + "&" +
        "funcion=" + $('#slc_funcion_orientador').val();
    $.ajax({
        url: './assets/ajax/gestion_perfiles.php?accion=update',
        method: 'POST',
        data: parametros,
        dataType: 'json',
        success: function(data) {
            swal("Completo", "Datos actualizados", "success");
            //console.log(data.funcion);
            //console.log($("#slc_funcion_orientador option:selected").text());
            funcion_actual_orientador = $('#slc_funcion_orientador').val();
            get_perfil(id);
            const user = $(`.user_row[id=${id}]`);
            user.find(".lbl_tipo_usuario").text($('#slc_funcion_orientador option:selected').toArray().map(item => item.text).join());
        }
    });
}

function get_perfil(id) {
    $.ajax({
        url: './assets/ajax/gestion_perfiles.php',
        method: 'POST',
        data: "id=" + id,
        dataType: 'json',
        success: function(data) {
            // console.log(data)
            $(".Identidad").html(data["Identidad"]);
            $(".NombreC").html(data["Nombre"] + "<br>" + data["Apellidos"]);
            $(".Carrera").html(data["Carrera"]);
            $(".Correo").html(data["Correo"]);
            $(".Celular").html(data["Celular"]);
            $('#btn_guardar_cambios').attr("data-id", data["ID"]);

            if (data.Cuenta) {
                $(".Cuenta").parent().show();
                $(".Cuenta").html(data["Cuenta"]);
            } else {
                $(".Cuenta").parent().hide();
            }

            if (data.Carrera) {
                $(".Carrera").parent().show();
                $(".Carrera").html(data["Carrera"]);
            } else {
                $(".Carrera").parent().hide();
            }

            if (data.TipoUsuario !== 'Estudiante') {
                //$('#btn_guardar_cambios').show();
                $('#btn_guardar_cambios').hide();
                $(".tipo").show();
                $.ajax({
                    url: './assets/ajax/gestion_perfiles.php?tipos=d',
                    method: 'POST',
                    data: "id=" + id,
                    dataType: 'json',
                    success: function(data) {
                        let tipos = [];
                        for (let d of data) {
                            tipos.push(parseInt(d.tipos));
                        }
                        $('#slc_funcion_orientador').val(tipos);
                        $('#slc_funcion_orientador').material_select();
                    }
                });
            } else {
                $('#btn_guardar_cambios').hide();
                $(".tipo").hide();
            }

        }
    })
}

jQuery.extend({
    compare: function(arrayA, arrayB) {
        if (arrayA.length != arrayB.length) { return false; }
        // sort modifies original array
        // (which are passed by reference to our method!)
        // so clone the arrays before sorting
        var a = jQuery.extend(true, [], arrayA);
        var b = jQuery.extend(true, [], arrayB);
        a.sort();
        b.sort();
        for (var i = 0, l = a.length; i < l; i++) {
            if (a[i] !== b[i]) {
                return false;
            }
        }
        return true;
    }
});