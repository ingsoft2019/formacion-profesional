$(document).ready(function () {
    $('#btn_cambiar_contrasena').click(function () {
        $('#div-cambiar-contrasena').show(1000);
    });

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




    


});





