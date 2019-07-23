$(document).ready(function () {

//funcionalidad guardar cambios
//OJO VERIFICACION DE IGUALDAD DE CONTRASEÑAS PENDIENTE


//---------------------agregar carreras a slc-----------------------
$('select').material_select();
var $selectDropdown = $("#slc-carrera").empty().html(' ');
$.ajax({
        url:"assets/ajax/perfil-peticiones.php",
        method:'GET',
        data:"CODIGO_FUNCION=2",
        dataType:'json',//data para saber que funcion en php usara.
        success:function(respuesta){
               
           for (var i=0; i<respuesta.length ; i++){
             $selectDropdown.append($("<option></option>").attr("value",respuesta[i].idCarrera).text(respuesta[i].nombreCarrera));
                 }
            $selectDropdown.trigger('contentChanged');
         }
        });

//------------------------------------validaciones------------------------------------------
     $('#txt_identidad').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/\d{4}-\d{4}-\d{5}/g)
        if(valid){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#txt_nombres').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#txt_apellidos').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#txt_cuenta').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/\d{11}/g)
        if(valid){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#txt_celular').on('input', function() {
        var input=$(this);
        var val = input.val();
        var valid = val.match(/\(504\)\ \d{4}-\d{4}/g)
        if(valid){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#txt_correo').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

/*
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
*/
//actualizacion de slc carreras dinamico
 $('select').on('contentChanged', function() {
    // re-initialize (update)
    $(this).material_select();
    
  });
//-------------------------------------------------------------------------------------------

    $('#btn_cambiar_contrasena').click(function () {
        $('#div-cambiar-contrasena').show(1000);
    });

    crearCropper();
    $('#fl_foto_perfil').on('change', function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
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
    
cargarDatos();


});//AQUI TERMINA EN DOCUMENT READY
var idNuevacarrera= 0;
$("#slc-carrera").change(function (){
    console.log($("#slc-carrera").val()+"este el valor");
    idNuevacarrera=$("#slc-carrera").val();
});

function guardar_cambios(){
    console.log("entro a la function cambios");
    var parametros="nombres="+$('#txt_nombres').val()+"&"+
                    "apellidos="+ $('#txt_apellidos').val()+"&"+
                    "cuenta="+$('#txt_cuenta').val()+"&"+ 
                    "celular="+$('#txt_celular').val()+"&"+ 
                    "correo="+$('#txt_correo').val()+"&"+
                    "contrasena="+$('#txt_confirmar_nueva').val()+"&"+
                    "no_identidad="+$("#txt_identidad").val()+"&"+
                    "idcarrera="+idNuevacarrera+"&"+
                    "CODIGO_FUNCION=3";
                    console.log(parametros);
    $.ajax({
        url:"assets/ajax/perfil-peticiones.php",
        method:'GET',
        data: parametros,
        dataType:'html',//data para saber que funcion en php usara.
        success:function(respuesta){
               console.log("su informacion a sido actualizada");
               console.log(respuesta);
            }
        });
}


//------------------peticion ajax para cargar datos en el perfil-----------------------------
function cargarDatos(){
    $.ajax({
        url:"assets/ajax/perfil-peticiones.php",
        method:'GET',
        data:"CODIGO_FUNCION=1",
        dataType:'json',//data para saber que funcion en php usara.
        success:function(respuesta){
            console.log(respuesta);
           /* for (var i=0; i<respuesta.length ; i++){
          $("#slc-carrera").append(
                '<option value="'+respuesta[i].idCarrera+'">'+respuesta[i].nombreCarrera+'</option>'
                    );}
                 }*/
            $("label").addClass("active");
            $("#txt_nombres").val(respuesta[0].nombres);
            $("#txt_apellidos").val(respuesta[0].apellidos);
            $("#txt_identidad").val(respuesta[0].no_identidad);
            //$("#txt_fechaNac").val(respuesta[0].nombres);
            $("#txt_celular").val(respuesta[0].celular);
            $("#txt_cuenta").val(respuesta[0].no_cuenta);
            $("#slc-carrera").material_select();
                $("#slc-carrera").val(respuesta[0].idCarrera);
                $("#slc-carrera").material_select();
            $("#txt_contrasena").val(respuesta[0].contrasena);
            $("#txt_correo").val(respuesta[0].correo);
            }
        });

}

var image = $('#img_cropper_foto');
function crearCropper() {    
    image.cropper({
        aspectRatio: 1/1,
        preview: '#div_result_cropImage',
    
    });
}

function destroyCropper(){
    image.cropper('destroy');
}

$('#btn_cancelar').click(function () {
    });

    $('#btn_guardar_cambios').click(function () {
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
        }, function (isConfirm) {
            if (isConfirm) {
                swal("Completo", "Su información ha sido actualizada", "success");
                guardar_cambios();
            } else {
                swal("Cancelado", "Su información no fue actualizada", "error");
                cargarDatos();
            }
        });
    });

 

