$(document).ready(function() {

    $(".frm_etapas").click(function(event) {
        var datosEtapa = [];
        if (event.target.type == "checkbox") {
            var id_proceso = event.target.getAttribute('data-process');
            var id_user = event.target.getAttribute('data-user');
            var id_etapa = event.target.getAttribute('id');
            var estado_etapa = $("#" + id_etapa).is(':checked');
            var progreso = parseInt($("#porcentaje_user" + id_user).text());
            if (estado_etapa) {
                progreso += 25;
            } else {
                progreso -= 25;
            }

            datosEtapa["id_proceso"] = id_proceso;
            datosEtapa["id_user"] = id_user;
            datosEtapa["id_etapa"] = id_etapa;
            datosEtapa["estado_etapa"] = estado_etapa;
            datosEtapa["progreso"] = progreso;

            $("#porcentaje_user" + id_user).text(progreso);
            $('#bar_user' + id_user).css('width', progreso + "%");

            console.log(datosEtapa);
            console.log("en cada click");
            var etapaCambios = JSON.stringify(datosEtapa);
            var etapa = id_etapa.substr(1, 1);
            actualizarProgreso(etapaCambios, etapa);
            /*console.log(id_proceso);
            console.log(id_user);
            console.log(id_etapa);
            console.log(estado_etapa);*/
        }
    });


});
 function actualizarProgreso(etapaCambios, etapa){
    $.ajax({
            url: "assets/ajax/actualizar_progresos.php",
            method: "POST",
            data: "JsonCambios="+etapaCambios+&+"etapa="+etapa,
            dataType: 'html', 
            success: function(respuesta) {

            }
        }
        );
 }

