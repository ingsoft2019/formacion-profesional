jQuery(document).ready(function($) {

    $("#btn_nueva_tarjeta").click(function() {
        renderTarjeta(crear_id());
    });

    $("#btn_guardar_cambios").click(function() {
        obtenerHorarios();
    });

    $(".mn-content").click(function(event) {
        if (event.target.className == "material-icons icon-button") {
            //console.log(event.target.id);
            removeTarjeta(event.target.id);
        }
    });


    $(".btn_entrevista").click(function(event) {
        //console.log(event.target.getAttribute('data-id'));
        setModalData(event.target.getAttribute('data-id'), 2);
    });
    $(".btn_resultados").click(function(event) {
        //console.log(event.target.getAttribute('data-id'));
        setModalData(event.target.getAttribute('data-id'), 3);
    });

});

// render tarjetas horarios
const renderTarjeta = (id) => {
    const html = `
        <div class="col s12 m12 l4 tarjeta_horario" id="${id}">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 right-align">
                                    <i class="material-icons icon-button" id="${id}">clear</i>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">date_range</i>
                                    <input id="txt_fecha" type="text" class="div_datepicker"
                                        placeholder="Seleccione el día(s)">
                                    <label for="txt_fecha" class="active">Fecha(s)</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="txt_hinicial" type="text" class="div_timepicker"
                                        placeholder="Hora inicial">
                                    <label for="txt_hinicial" class="active">Desde</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="txt_hfinal" type="text" class="div_timepicker"
                                        placeholder="Hora final">
                                    <label for="txt_hfinal" class="active">Hasta</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    `;
    $("#contenedor_tarjetas").append(html);


    const tarjeta = $(`.tarjeta_horario[id=${id}]`);
    tarjeta.hide();
    const date_pickers = tarjeta.find(".div_datepicker");
    const time_pickers = tarjeta.find(".div_timepicker");

    date_pickers.flatpickr({
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        //inline: true,
        mode: "multiple",
        conjunction: ";",
        "disable": [
            function(date) {
                // return true to disable
                return (date.getDay() === 0 || date.getDay() === 6);

            }
        ],
        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        },

        enable: [{
                from: "2019-07-01",
                to: "2019-08-01"
            },
            {
                from: "2025-09-01",
                to: "2025-12-01"
            }
        ]
    });

    time_pickers.flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "G:i K",
        minDate: "8:00",
        maxDate: "16:00",
    });

    tarjeta.show(500);
};


//eliminar tarjeta
const removeTarjeta = (id) => {
    const tarjeta = $(`.tarjeta_horario[id=${id}]`);
    tarjeta.hide("slow", function() { $(this).remove(); })
};

function crear_id() {
    var timestamp = new Date();
    id = "" + timestamp.getFullYear().toString() + timestamp.getMonth().toString() + timestamp.getDate().toString() + timestamp.getHours().toString() + timestamp.getMinutes().toString() + timestamp.getSeconds().toString() + timestamp.getMilliseconds().toString() + "";
    //console.log(id);
    return id;
}

function setModalData(idProceso, idTipoEvento) { // 2>Entrevista   3>Dev. Resultados
    switch (idTipoEvento) {
        case 2:
            $("#mdl_title").html("Gestionar horarios para Entrevistas");
            break;
        case 3:
            $("#mdl_title").html("Gestionar horarios para Devolución de Resultados");
            break;
        default:
            break;
    }
    $("#mdl_subtitle").html("Proceso " + idProceso);
    // ESCRIBIR CODIGO PARA RENDERIZAR TARJETAS DE HORARIOS EXISTENTES EN LA BASE DE DATOS
}

function obtenerHorarios() {
    var tarjetaHorario = $('#contenedor_tarjetas').children();
    for (var i = 0; i < tarjetaHorario.length; i++) {
        console.log($(tarjetaHorario[i]).find("#txt_fecha").val());
        //console.log(flatpickr.parseDate(, "d/m/Y"));
        console.log($(tarjetaHorario[i]).attr("id"));

    }

}