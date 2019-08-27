$(document).ready(function() {
    cargarSecciones();
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
                $.ajax({
                    url: 'assets/ajax/eliminar_inscripcion.php',
                    data : "idsecciones="+ID_Seccion,
                    method: 'POST',
                    dataType: 'json ',
                    success: function(respuesta){}
                });
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

function cargarSecciones(){
    $.ajax({
            url: 'assets/ajax/obtener_secciones.php',
            method: 'POST',
            dataType: 'json ',
            success: function(respuesta){
                //console.log(respuesta);
                //console.log(respuesta.length);
                for (var i = 0; i < respuesta.length; i++) {
                    $("#Secciones_matriculadas").append(
                        '<div class="col s12 m4 l3" id="'+respuesta[0].idsecciones+'">'+
                                    '<div class="card">'+
                                        '<div class="card-content">'+
                                            '<ul class="collection">'+
                                                '<li class="collection-item valign-wrapper">'+
                                                    '<i class="material-icons">event_note</i>&emsp;'+
                                                    'Proceso <br>&emsp;'+
                                                    respuesta[0].idprocesos+
                                                '</li>'+
                                                '<li class="collection-item valign-wrapper">'+
                                                    '<i class="material-icons">fingerprint</i>&emsp;'+
                                                    'Sección  <br>&emsp;'+
                                                   respuesta[0].idsecciones+
                                                '</li>'+
                                                '<li class="collection-item valign-wrapper">'+
                                                    '<i class="material-icons">today</i>&emsp;'+
                                                    respuesta[0].dia+
                                                '</li>'+
                                                '<li class="collection-item valign-wrapper">'+
                                                    '<i class="material-icons">schedule</i>&emsp;'+
                                                    respuesta[0].horainicial+' - '+respuesta[0].horafinal +
                                                '</li>'+
                                                '<li class="collection-item valign-wrapper">'+
                                                    '<i class="material-icons">room</i>&emsp;'+
                                                    respuesta[0].lugar+
                                               ' </li>'+
                                            '</ul>'+
                                        '</div>'+
                                        '<div class="card-action right-align">'+
                                            '<a class="waves-effect waves-light red btn btn_eliminar_inscripcion" data-section="'+respuesta[i].idsecciones+'" data-process="'+respuesta[0].idprocesos+'">Eliminar</a>'+
                                        '</div>'+
                                   ' </div>'+
                                '</div>'
                        );
                }
            }
        });

}


