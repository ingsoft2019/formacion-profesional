$(document).ready(function() {

    $("#div_secciones_matriculadas").click(function(event) {
        if (event.target.className == "waves-effect waves-light red btn btn_eliminar_inscripcion") {
            ID_Proceso = event.target.getAttribute('data-process');
            ID_Seccion = event.target.getAttribute('data-section');
            console.log(ID_Proceso); //ID SECCION
            console.log(ID_Seccion); //ID PROCESO

            swal({
                title: "¿Seguro que desea eliminar la sección matriculada?",
                text: "No podrá deshacer ésta acción.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2196F3",
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm) {
                const section = $('#' + ID_Seccion);
                section.hide("slow", function() { $(this).remove(); })
                if (isConfirm) {
                    swal("Completo", "Inscripción eliminada.", "success");
                }
            });
        }
    });
    $(".btn_inscribirse").click(function(event) {
        swal("Completo", "Tu inscripción ha sido completada.", "success");
    });
});