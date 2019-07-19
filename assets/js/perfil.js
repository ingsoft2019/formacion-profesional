$(document).ready(function () {
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

//peticion ajax para mostrar carreras en perfil
$.ajax({
        url:"assets/ajax/perfil-peticiones.php",
        method:'GET',
        data:"CODIGO_FUNCION=1",
        dataType:'json',//data para saber que funcion en php usara.
        success:function(respuesta){
            console.log(respuesta);
            for (var i=0; i<respuesta.length ; i++){
            $("#slc-carrera").append(
                '<option value="'+respuesta[i].idCarrera+'">'+respuesta[i].nombreCarrera+'</option>'
                    );

                }
        }
        });



});




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
            } else {
                swal("Cancelado", "Su información no fue actualizada", "error");
            }
        });
    });




