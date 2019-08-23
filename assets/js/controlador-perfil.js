var nombres = "";
var apellidos = "";
var identidad = "";
var celular = "";
var correo = "";
var cuenta = "";
var carrera = "";
var foto = "";
var cargo="";
var id = $("#idTipoUsuario").val();
if(id == 4){
    READY1();
}else if (id == 1){
    READY2();
}else if (id==2 || id==3){
    READY3();
}

function READY3(){
    $(document).ready(function() {

        ocultar();
        //------------------------------------validaciones------------------------------------------
        $('#txt_identidad').on('input', function() {
            var input = $(this);
            var val = input.val();
            var valid = val.match(/\d{4}-\d{4}-\d{5}/g)
            if (valid) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_nombres').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_apellidos').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_celular').on('input', function() {
            var input = $(this);
            var val = input.val();
            var valid = val.match(/\(504\)\ \d{4}-\d{4}/g)
            if (valid) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_correo').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#cargo').on('contentChanged', function() {
            // re-initialize (update)
            $(this).material_select();

        });
        //-------------------------------------------------------------------------------------------

        $('#btn_cambiar_contrasena').click(function() {
            $('#div-cambiar-contrasena').toggle(1000);
        });

        crearCropper();
        $('#fl_foto_perfil').on('change', function(evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function() {
                    destroyCropper();
                    $('#img_cropper_foto').attr('src', fr.result);
                    crearCropper();
                }
                fr.readAsDataURL(files[0]);
            }

            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        });

        cargarDatosE();
        $('#btn_cancelar').click(function() {
            cargarDatosE();
        });
        
        $('#btn_guardar_cambios').click(function() {
            comprobar_antes_de_guardarE();
        });
        
        $('input').keyup(function() {
            habilitar_deshabilitar_guardar_cancelarE();
        });
        $('select').change(function() {
            habilitar_deshabilitar_guardar_cancelarE();
        });
        //console.log(id);
    }); //AQUI TERMINA EN DOCUMENT READY2
}

function READY2(){
    $(document).ready(function() {

        ocultar();
        //------------------------------------validaciones------------------------------------------
        $('#txt_identidad').on('input', function() {
            var input = $(this);
            var val = input.val();
            var valid = val.match(/\d{4}-\d{4}-\d{5}/g)
            if (valid) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_nombres').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_apellidos').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_celular').on('input', function() {
            var input = $(this);
            var val = input.val();
            var valid = val.match(/\(504\)\ \d{4}-\d{4}/g)
            if (valid) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_correo').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });
        //-------------------------------------------------------------------------------------------

        $('#btn_cambiar_contrasena').click(function() {
            $('#div-cambiar-contrasena').toggle(1000);
        });

        crearCropper();
        $('#fl_foto_perfil').on('change', function(evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function() {
                    destroyCropper();
                    $('#img_cropper_foto').attr('src', fr.result);
                    crearCropper();
                }
                fr.readAsDataURL(files[0]);
            }

            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        });

        cargarDatosA();
        $('#btn_cancelar').click(function() {
            cargarDatosA();
        });
        
        $('#btn_guardar_cambios').click(function() {
            comprobar_antes_de_guardarA();
        });
        
        $('input').keyup(function() {
            habilitar_deshabilitar_guardar_cancelarA();
        });
        //console.log(id);

    }); //AQUI TERMINA EN DOCUMENT READY2
}

function READY1(){
    $(document).ready(function() {


        //---------------------agregar carreras a slc-----------------------
        $('select').material_select();
        var $selectDropdown = $("#slc-carrera").empty().html(' ');
        $.ajax({
            url: "assets/ajax/perfil-peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=2",
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {

                for (var i = 0; i < respuesta.length; i++) {
                    $selectDropdown.append($("<option></option>").attr("value", respuesta[i].idCarrera).text(respuesta[i].nombreCarrera));
                }
                $selectDropdown.trigger('contentChanged');
            }
        });
        ocultar();
        //------------------------------------validaciones------------------------------------------
        $('#txt_identidad').on('input', function() {
            var input = $(this);
            var val = input.val();
            var valid = val.match(/\d{4}-\d{4}-\d{5}/g)
            if (valid) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_nombres').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_apellidos').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_cuenta').on('input', function() {
            var input = $(this);
            var val = input.val();
            var valid = val.match(/\d{11}/g)
            if (valid) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_celular').on('input', function() {
            var input = $(this);
            var val = input.val();
            var valid = val.match(/\(504\)\ \d{4}-\d{4}/g)
            if (valid) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        $('#txt_correo').on('input', function() {
            var input = $(this);
            var is_name = input.val();
            if (is_name) { input.removeClass("invalid").addClass("valid"); } else { input.removeClass("valid").addClass("invalid"); }
        });

        //actualizacion de slc carreras dinamico
    $('select').on('contentChanged', function() {
            // re-initialize (update)
            $(this).material_select();

        });
        //-------------------------------------------------------------------------------------------

        $('#btn_cambiar_contrasena').click(function() {
            $('#div-cambiar-contrasena').toggle(1000);
        });

        crearCropper();
        $('#fl_foto_perfil').on('change', function(evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function() {
                    destroyCropper();
                    $('#img_cropper_foto').attr('src', fr.result);
                    crearCropper();
                }
                fr.readAsDataURL(files[0]);
            }

            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        });

        var idNuevacarrera = 0;
        $("#slc-carrera").change(function() {
            //console.log($("#slc-carrera").val() + "este el valor");
            idNuevacarrera = $("#slc-carrera").val();
        });

        cargarDatos();
        $('#btn_cancelar').click(function() {
            cargarDatos();
        });
        
        $('#btn_guardar_cambios').click(function() {
            comprobar_antes_de_guardar();
        });
        
        $('input').keyup(function() {
            habilitar_deshabilitar_guardar_cancelar();
        });
        
        
        $('select').change(function() {
            habilitar_deshabilitar_guardar_cancelar();
        });

    }); //AQUI TERMINA EN DOCUMENT READY
}

function ocultar(){
    document.getElementById('idTipoUsuario').style.display = 'none';
}

function guardar_cambiosE() {
    //console.log("entro a la function cambios");
    var parametros = "nombres=" + $('#txt_nombres').val() + "&" +
        "apellidos=" + $('#txt_apellidos').val() + "&" +
        "contrasena_actual=" + $('#txt_contrasena_actual').val() + "&" +
        "celular=" + $('#txt_celular').val() + "&" + "cargo="+ $("#cargo").val()
        + "&" +"correo=" + $('#txt_correo').val() + "&" +
        "contrasena=" + $('#txt_confirmar_nueva').val() + "&" +
        "no_identidad=" + $("#txt_identidad").val() + "&" +
        "CODIGO_FUNCION=7";
    console.log(parametros);
    $.ajax({
        url: "assets/ajax/perfil-peticiones.php",
        method: 'GET',
        data: parametros,
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            if (respuesta.codigo_resultado == 1) {
                swal("Completo", respuesta.mensaje, "success");
                $("#lbl_menu_nombres").html(respuesta.nombreActualizado);
                cargarDatosE();
            } else if (respuesta.codigo_resultado == 0) {
                swal("Error", respuesta.mensaje, "error");
                cargarDatosE();
            }
        }
    });
}

function guardar_cambiosA() {
    //console.log("entro a la function cambios");
    var parametros = "nombres=" + $('#txt_nombres').val() + "&" +
        "apellidos=" + $('#txt_apellidos').val() + "&" +
        "contrasena_actual=" + $('#txt_contrasena_actual').val() + "&" +
        "celular=" + $('#txt_celular').val() + "&" +
        "correo=" + $('#txt_correo').val() + "&" +
        "contrasena=" + $('#txt_confirmar_nueva').val() + "&" +
        "no_identidad=" + $("#txt_identidad").val() + "&" +
        "CODIGO_FUNCION=5";
    //console.log(parametros);
    $.ajax({
        url: "assets/ajax/perfil-peticiones.php",
        method: 'GET',
        data: parametros,
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            if (respuesta.codigo_resultado == 1) {
                swal("Completo", respuesta.mensaje, "success");
                $("#lbl_menu_nombres").html(respuesta.nombreActualizado);
                cargarDatosA();
            } else if (respuesta.codigo_resultado == 0) {
                swal("Error", respuesta.mensaje, "error");
                cargarDatosA();
            }
        }
    });
}

function guardar_cambios() {
    //console.log("entro a la function cambios");
    var parametros = "nombres=" + $('#txt_nombres').val() + "&" +
        "apellidos=" + $('#txt_apellidos').val() + "&" +
        "contrasena_actual=" + $('#txt_contrasena_actual').val() + "&" +
        "cuenta=" + $('#txt_cuenta').val() + "&" +
        "celular=" + $('#txt_celular').val() + "&" +
        "correo=" + $('#txt_correo').val() + "&" +
        "contrasena=" + $('#txt_confirmar_nueva').val() + "&" +
        "no_identidad=" + $("#txt_identidad").val() + "&" +
        "idcarrera=" + idNuevacarrera + "&" +
        "CODIGO_FUNCION=3";
    //console.log(parametros);
    $.ajax({
        url: "assets/ajax/perfil-peticiones.php",
        method: 'GET',
        data: parametros,
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            if (respuesta.codigo_resultado == 1) {
                swal("Completo", respuesta.mensaje, "success");
                $("#lbl_menu_nombres").html(respuesta.nombreActualizado);
                cargarDatos();
            } else if (respuesta.codigo_resultado == 0) {
                swal("Error", respuesta.mensaje, "error");
                cargarDatos();
            }
        }
    });
}


//------------------peticion ajax para cargar datos en el perfil-----------------------------
function cargarDatos() {
    //console.log(id);
    $.ajax({
        url: "assets/ajax/perfil-peticiones.php",
        method: 'GET',
        data: "CODIGO_FUNCION=1",
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            //console.log(respuesta);
            $("label").addClass("active");
            $("#txt_nombres").val(respuesta[0].nombres);
            $("#txt_apellidos").val(respuesta[0].apellidos);
            $("#txt_identidad").val(respuesta[0].no_identidad);
            $("#txt_celular").val(respuesta[0].celular);
            $("#txt_cuenta").val(respuesta[0].no_cuenta);
            $("#slc-carrera").material_select();
            $("#slc-carrera").val(respuesta[0].idCarrera);
            $("#slc-carrera").material_select();
            $("#txt_correo").val(respuesta[0].correo);
            $("#img_editar_perfil").attr("src", respuesta[0].fotoPerfil);
            $("#txt_contrasena_actual").val("");
            $("#txt_contrasena_nueva").val("");
            $("#txt_confirmar_nueva").val("");
            nombres = respuesta[0].nombres;
            apellidos = respuesta[0].apellidos;
            identidad = respuesta[0].no_identidad;
            celular = respuesta[0].celular;
            correo = respuesta[0].correo;
            cuenta = respuesta[0].no_cuenta;
            carrera = respuesta[0].idCarrera;
            foto = respuesta[0].fotoPerfil;
            habilitar_deshabilitar_guardar_cancelar();
            $('#div-cambiar-contrasena').hide(1000);
        }
    });
}
function cargarDatosA() {
    //console.log(id);
    $.ajax({
        url: "assets/ajax/perfil-peticiones.php",
        method: 'GET',
        data: "CODIGO_FUNCION=4",
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            //console.log(respuesta);
            $("label").addClass("active");
            $("#txt_nombres").val(respuesta[0].nombres);
            $("#txt_apellidos").val(respuesta[0].apellidos);
            $("#txt_identidad").val(respuesta[0].no_identidad);
            $("#txt_celular").val(respuesta[0].celular);
            $("#txt_correo").val(respuesta[0].correo);
            $("#img_editar_perfil").attr("src", respuesta[0].fotoPerfil);
            $("#txt_contrasena_actual").val("");
            $("#txt_contrasena_nueva").val("");
            $("#txt_confirmar_nueva").val("");
            nombres = respuesta[0].nombres;
            apellidos = respuesta[0].apellidos;
            identidad = respuesta[0].no_identidad;
            celular = respuesta[0].celular;
            correo = respuesta[0].correo;
            foto = respuesta[0].fotoPerfil;
            habilitar_deshabilitar_guardar_cancelarA();
            $('#div-cambiar-contrasena').hide(1000);
        }
    });
}

function cargarDatosE() {
    //console.log(id);
    $.ajax({
        url: "assets/ajax/perfil-peticiones.php",
        method: 'GET',
        data: "CODIGO_FUNCION=6",
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            //console.log(respuesta);
            $("label").addClass("active");
            $("#txt_nombres").val(respuesta[0].nombres);
            $("#txt_apellidos").val(respuesta[0].apellidos);
            $("#txt_identidad").val(respuesta[0].no_identidad);
            $("#txt_celular").val(respuesta[0].celular);
            $("#txt_correo").val(respuesta[0].correo);
            $("#img_editar_perfil").attr("src", respuesta[0].fotoPerfil);
            $("#txt_contrasena_actual").val("");
            $("#txt_contrasena_nueva").val("");
            $("#txt_confirmar_nueva").val("");
            $("#cargo").material_select();
            $("#cargo").val(respuesta[0].cargo);
            $("#cargo").material_select();
            
            cargo=respuesta[0].cargo;
            nombres = respuesta[0].nombres;
            apellidos = respuesta[0].apellidos;
            identidad = respuesta[0].no_identidad;
            celular = respuesta[0].celular;
            correo = respuesta[0].correo;
            foto = respuesta[0].fotoPerfil;
            habilitar_deshabilitar_guardar_cancelarE();
            $('#div-cambiar-contrasena').hide(1000);
        }
    });
}

function existenCambios() {
    var identidadActual = $("#txt_identidad").val();
    identidadActual = identidadActual.replace(/-/g, "");
    var celularActual = $("#txt_celular").val();
    celularActual = celularActual.replace(/-/g, "");
    celularActual = celularActual.replace("(504) ", "");
    //console.log(identidad);
    if ($("#txt_nombres").val() == nombres &&
        $("#txt_apellidos").val() == apellidos &&
        identidadActual == identidad &&
        celularActual == celular &&
        $("#txt_cuenta").val() == cuenta &&
        $("#slc-carrera").val() == carrera &&
        $("#txt_correo").val() == correo &&
        $("#img_editar_perfil").attr('src') == foto &&
        $("#txt_contrasena_actual").val() == "" &&
        $("#txt_contrasena_nueva").val() == "" &&
        $("#txt_confirmar_nueva").val() == ""
    ) {
        return false;
    } else {
        return true;
    }
}

function existenCambiosA() {
    var identidadActual = $("#txt_identidad").val();
    identidadActual = identidadActual.replace(/-/g, "");
    var celularActual = $("#txt_celular").val();
    celularActual = celularActual.replace(/-/g, "");
    celularActual = celularActual.replace("(504) ", "");
    
    if ($("#txt_nombres").val() == nombres &&
        $("#txt_apellidos").val() == apellidos &&
        identidadActual == identidad &&
        celularActual == celular &&
        $("#txt_correo").val() == correo &&
        $("#img_editar_perfil").attr('src') == foto &&
        $("#txt_contrasena_actual").val() == "" &&
        $("#txt_contrasena_nueva").val() == "" &&
        $("#txt_confirmar_nueva").val() == ""
    ) {
        return false;
    } else {
        return true;
    }
}

function existenCambiosE() {
    var identidadActual = $("#txt_identidad").val();
    identidadActual = identidadActual.replace(/-/g, "");
    var celularActual = $("#txt_celular").val();
    celularActual = celularActual.replace(/-/g, "");
    celularActual = celularActual.replace("(504) ", "");
    
    if ($("#txt_nombres").val() == nombres &&
        $("#txt_apellidos").val() == apellidos &&
        identidadActual == identidad &&
        celularActual == celular &&
        $("#txt_correo").val() == correo &&
        $("#cargo").val() == cargo &&
        $("#img_editar_perfil").attr('src') == foto &&
        $("#txt_contrasena_actual").val() == "" &&
        $("#txt_contrasena_nueva").val() == "" &&
        $("#txt_confirmar_nueva").val() == ""
    ) {
        return false;
    } else {
        return true;
    }
}

function comprobar_antes_de_guardarA() {
    var form_data = $("#frm_perfil").serializeArray();
    var error_free = true;
    var mensaje = '';
    console.log(form_data)
    for (var input in form_data) {
        var element = $("#" + form_data[input]['name']);

        switch (Number(input)) {
            case 1:
                if (element.val() == '') {
                    mensaje = 'Introduzca su nombre.';
                    error_free = false;
                }
                break;
            case 2:
                if (element.val() == '') {
                    mensaje = 'Introduzca su apellido.';
                    error_free = false;
                }
                break;
            case 3:
                if (!element.val().match(/\d{4}-\d{4}-\d{5}/g)) {
                    mensaje = 'Número de identidad incompleto.';
                    error_free = false;
                }
                break;
            case 4:
                if (!element.val().match(/\(504\)\ \d{4}-\d{4}/g)) {
                    mensaje = 'Número de teléfono incompleto.';
                    error_free = false;
                }
                break;


            case 5:
                if (!element.val().match(/[a-z]+/g)) {
                    mensaje = 'Correo institucional no válido.';
                    error_free = false;
                }
                if (element.val() == '') {
                    mensaje = 'Introduzca su correo institucional.';
                    error_free = false;
                }
                break;
            case 6:
                if (element.val() == '' && $('#txt_contrasena_actual').val() != "") {
                    mensaje = 'Introduzca su nueva contraseña.';
                    error_free = false;
                    break;
                }
                if (!element.val().match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g) && $('#txt_contrasena_actual').val() != "") {
                    mensaje = 'Introduzca una nueva contraseña de al menos 8 caracteres incluyendo letras mayúsculas, minúsculas, números y caracteres especiales como #?!@$%^&*-.';
                    error_free = false;
                }
                break;
            case 7:

                break;
            case 8:
                if (element.val() !== $('#txt_contrasena_nueva').val()) {
                    mensaje = 'Las contraseñas deben ser iguales.';
                    error_free = false;
                }
                break;
            default:
                break;
        }
        if (!error_free) break;

    }
    if (!error_free) {
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
    } else {
        event.preventDefault();

        swal({
            title: "¿Seguro que desea guardar los cambios?",
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
                //swal("Completo", "Su información ha sido actualizada", "success");
                guardar_cambiosA();
                cargarDatosA();
            } else {
                swal("Cancelado", "Su información no fue actualizada", "error");
                cargarDatosA();
            }
        });
    }
}

function comprobar_antes_de_guardarE() {
    var form_data = $("#frm_perfil").serializeArray();
    var error_free = true;
    var mensaje = '';
    console.log(form_data)
    for (var input in form_data) {
        var element = $("#" + form_data[input]['name']);

        switch (Number(input)) {
            case 1:
                if (element.val() == '') {
                    mensaje = 'Introduzca su nombre.';
                    error_free = false;
                }
                break;
            case 2:
                if (element.val() == '') {
                    mensaje = 'Introduzca su apellido.';
                    error_free = false;
                }
                break;
            case 3:
                if (!element.val().match(/\d{4}-\d{4}-\d{5}/g)) {
                    mensaje = 'Número de identidad incompleto.';
                    error_free = false;
                }
                break;
            case 4:
                if (!element.val().match(/\(504\)\ \d{4}-\d{4}/g)) {
                    mensaje = 'Número de teléfono incompleto.';
                    error_free = false;
                }
                break;


            case 5:
                if (!element.val().match(/[a-z]+/g)) {
                    mensaje = 'Correo institucional no válido.';
                    error_free = false;
                }
                if (element.val() == '') {
                    mensaje = 'Introduzca su correo institucional.';
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
                if (element.val() == '' && $('#txt_contrasena_actual').val() != "") {
                    mensaje = 'Introduzca su nueva contraseña.';
                    error_free = false;
                    break;
                }
                if (!element.val().match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g) && $('#txt_contrasena_actual').val() != "") {
                    mensaje = 'Introduzca una nueva contraseña de al menos 8 caracteres incluyendo letras mayúsculas, minúsculas, números y caracteres especiales como #?!@$%^&*-.';
                    error_free = false;
                }
                break;
            case 8:

                break;
            case 9:
                if (element.val() !== $('#txt_contrasena_nueva').val()) {
                    mensaje = 'Las contraseñas deben ser iguales.';
                    error_free = false;
                }
                break;
            default:
                break;
        }
        if (!error_free) break;

    }
    if (!error_free) {
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
    } else {
        event.preventDefault();

        swal({
            title: "¿Seguro que desea guardar los cambios?",
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
                //swal("Completo", "Su información ha sido actualizada", "success");
                guardar_cambiosE();
                cargarDatosE();
            } else {
                swal("Cancelado", "Su información no fue actualizada", "error");
                cargarDatosE();
            }
        });
    }
}

function comprobar_antes_de_guardar() {
    var form_data = $("#frm_perfil").serializeArray();
    var error_free = true;
    var mensaje = '';
    console.log(form_data)
    for (var input in form_data) {
        var element = $("#" + form_data[input]['name']);

        switch (Number(input)) {
            case 0:
                if (element.val() == '') {
                    mensaje = 'Introduzca su nombre.';
                    error_free = false;
                }
                break;
            case 1:
                if (element.val() == '') {
                    mensaje = 'Introduzca su apellido.';
                    error_free = false;
                }
                break;
            case 2:
                if (!element.val().match(/\d{4}-\d{4}-\d{5}/g)) {
                    mensaje = 'Número de identidad incompleto.';
                    error_free = false;
                }
                break;
            case 3:
                if (!element.val().match(/\(504\)\ \d{4}-\d{4}/g)) {
                    mensaje = 'Número de teléfono incompleto.';
                    error_free = false;
                }
                break;


            case 4:
                if (!element.val().match(/[a-z]+/g)) {
                    mensaje = 'Correo institucional no válido.';
                    error_free = false;
                }
                if (element.val() == '') {
                    mensaje = 'Introduzca su correo institucional.';
                    error_free = false;
                }
                break;
            case 5:
                if (!element.val().match(/\d{11}/g)) {
                    mensaje = 'Número de cuenta incompleto.';
                    error_free = false;
                }
                break;
            case 6:
                if (element.val() == 0) {
                    mensaje = 'Seleccione una carrera.';
                    error_free = false;
                }
                break;
            case 7:

                break;
            case 8:
                if (element.val() == '' && $('#txt_contrasena_actual').val() != "") {
                    mensaje = 'Introduzca su nueva contraseña.';
                    error_free = false;
                    break;
                }
                if (!element.val().match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g) && $('#txt_contrasena_actual').val() != "") {
                    mensaje = 'Introduzca una nueva contraseña de al menos 8 caracteres incluyendo letras mayúsculas, minúsculas, números y caracteres especiales como #?!@$%^&*-.';
                    error_free = false;
                }
                break;
            case 9:
                if (element.val() !== $('#txt_contrasena_nueva').val()) {
                    mensaje = 'Las contraseñas deben ser iguales.';
                    error_free = false;
                }
                break;
            default:
                break;
        }
        if (!error_free) break;

    }
    if (!error_free) {
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
    } else {
        event.preventDefault();

        swal({
            title: "¿Seguro que desea guardar los cambios?",
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
                //swal("Completo", "Su información ha sido actualizada", "success");
                guardar_cambios();
                cargarDatos();
            } else {
                swal("Cancelado", "Su información no fue actualizada", "error");
                cargarDatos();
            }
        });
    }
}

var image = $('#img_cropper_foto');

function crearCropper() {
    image.cropper({
        aspectRatio: 1 / 1,
        preview: '#div_result_cropImage',

    });
}

function destroyCropper() {
    image.cropper('destroy');
}

function habilitar_deshabilitar_guardar_cancelarA() {
    //alert("The text has been changed.");
    //console.log(existenCambios());
    //console.log($('#div_btn_guardar_cancelar').attr('hidden'));
    if (existenCambiosA() && $("#div_btn_guardar_cancelar").is(":hidden")) {
        $('#div_btn_guardar_cancelar').attr("hidden", false);
        $('#div_btn_guardar_cancelar').hide();
        $('#div_btn_guardar_cancelar').show(500);
    } else if (existenCambiosA() == false && $("#div_btn_guardar_cancelar").is(":hidden") == false) {
        $('#div_btn_guardar_cancelar').attr("hidden", true);
        $('#div_btn_guardar_cancelar').show();
        $('#div_btn_guardar_cancelar').hide(500);
    }
}

function habilitar_deshabilitar_guardar_cancelar() {
    //alert("The text has been changed.");
    //console.log(existenCambios());
    //console.log($('#div_btn_guardar_cancelar').attr('hidden'));
    if (existenCambios() && $("#div_btn_guardar_cancelar").is(":hidden")) {
        $('#div_btn_guardar_cancelar').attr("hidden", false);
        $('#div_btn_guardar_cancelar').hide();
        $('#div_btn_guardar_cancelar').show(500);
    } else if (existenCambios() == false && $("#div_btn_guardar_cancelar").is(":hidden") == false) {
        $('#div_btn_guardar_cancelar').attr("hidden", true);
        $('#div_btn_guardar_cancelar').show();
        $('#div_btn_guardar_cancelar').hide(500);
    }
}

function habilitar_deshabilitar_guardar_cancelarE() {
    //alert("The text has been changed.");
    //console.log(existenCambios());
    //console.log($('#div_btn_guardar_cancelar').attr('hidden'));
    if (existenCambiosE() && $("#div_btn_guardar_cancelar").is(":hidden")) {
        $('#div_btn_guardar_cancelar').attr("hidden", false);
        $('#div_btn_guardar_cancelar').hide();
        $('#div_btn_guardar_cancelar').show(500);
    } else if (existenCambiosE() == false && $("#div_btn_guardar_cancelar").is(":hidden") == false) {
        $('#div_btn_guardar_cancelar').attr("hidden", true);
        $('#div_btn_guardar_cancelar').show();
        $('#div_btn_guardar_cancelar').hide(500);
    }
}