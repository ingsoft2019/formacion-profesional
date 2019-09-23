$(document).ready(function() {
    cargarProcesoExamen();
});

function cargarProcesoExamen() {
    // alert("holamundn");
    $.ajax({
        url: "assets/ajax/cargar_examenes.php", //po quie
        method: "GET",
        dataType: 'json',
        success: function(respuesta) {
            console.log(respuesta);
            for (let i = 0; i < respuesta.length; i++) {
                $("#examenes_inscritos").append(
                    '<main class="mn-inner">' +



                    '<div class="card" id="Card-row">' +
                    '<div class="card-content  row">' +
                    ' <div class="row">' +
                    '<div class="col s3 m1 red darken-1 phase_icon valign-wrapper">' +
                    '<i class="material-icons white-text center" style="width: 100%;">event</i>' +
                    '</div>' +
                    '<div class="col s9 m11">' +
                    '<h4>Proceso ' + respuesta[i].idprocesos + '</h4>' +
                    '<br>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col s12 m12 l6">' +
                    '<div class="row valign-wrapper">' +
                    '<div class="col s2 hide-on-small-only">' +
                    '<img src="assets/images/test_holland.png" alt="" class="circle responsive-img">' +
                    '<!-- notice the "circle" class -->' +
                    '</div>' +
                    '<div class="col s12 m10">' +
                    '<h5>Test de Holland</h5>' +
                    '<h6>Personalidad</h6>' +
                    '<a href="' + respuesta[i].urltestline2 + '">' + respuesta[i].urltestline2 + '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +

                    '<div class="col s12 m12 l6">' +
                    '<div class="row valign-wrapper">' +
                    '<div class="col s2 hide-on-small-only">' +
                    '<img src="assets/images/test_lee.png" alt="" class="circle responsive-img">' +
                    '<!-- notice the "circle" class -->' +
                    '</div>' +
                    '<div class="col s12 m10">' +
                    '<h5>Test Lee-Thorpe</h5>' +
                    '<h6>Intereses Vocacionales</h6>' +
                    '<a href="' + respuesta[i].urltestlinea1 + '">' + respuesta[i].urltestlinea1 + '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col s12">' +
                    '<br>' +
                    '<h5>Clave de Acceso:' + respuesta[i].clavetest + '</h5>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +



                    '</main>'
                );

            }
            //
        }

    })
}