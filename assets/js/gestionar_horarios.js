jQuery(document).ready(function($) {



    $("#btn_nueva_tarjeta").click(function() {

        $.ajax({
            url: 'assets/ajax/obtener_procesos.php',
            method: 'GET',
            data: 'idProceso=' + $('#id-proceso').val() + '&tipoEvento=' + idTipoEvento,
            success: function(data) {
                console.log(JSON.parse(data))
                renderTarjeta(crear_id(), JSON.parse(data));
            }
        })

    });

    $("#btn_guardar_cambios").click(function() {
        //console.log(obtenerHorarios());
        guardarCambios(obtenerHorarios());
        swal({
            title: "¿Seguro que desea guardar los cambios realizados?",
            text: "Los horarios para este proceso serán actualizados.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2196F3",
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm) {
            if (isConfirm) {
                swal("Completo", "Horarios Actualizados.", "success");
                $('#mdl_horarios').closeModal();
                $('body').attr('style', 'overflow-y: auto !important');
                $("#contenedor_tarjetas").html("");
            } else {}
        });

    });

    $("#btn_cancelar_cambios").click(function() {
        swal({
            title: "¿Seguro que desea cerrar el editor de horarios?",
            text: "Perderá la información que no ha guardado.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2196F3",
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm) {
            if (isConfirm) {
                $('#mdl_horarios').closeModal();
                $('body').attr('style', 'overflow-y: auto !important');
                $("#contenedor_tarjetas").html("");
            }
        });
    });

    $(".mn-content").click(function(event) {
        if (event.target.className == "material-icons icon-button") {
            //console.log(event.target.id);
            removeTarjeta(event.target.id);

        }
    });


    $(".btn_entrevista").click(function(event) {
        //console.log(event.target.getAttribute('data-id'));
        $('#id-proceso').val(event.target.getAttribute('data-id'))
        setModalData(event.target.getAttribute('data-id'), 2);
        cargarDatos()
    });
    $(".btn_resultados").click(function(event) {
        //console.log(event.target.getAttribute('data-id'));
        $('#id-proceso').val(event.target.getAttribute('data-id'))
        setModalData(event.target.getAttribute('data-id'), 3);
        cargarDatos()
    });

    $('.modal_Trigger').click(function(event) {
        setTimeout(function() { $('body').attr('style', 'overflow-y: hidden !important'); }, 10);
        $('#mdl_horarios').openModal({ dismissible: false });
    });


});




// render tarjetas horarios

const renderTarjeta2 = (id, data) => {

    const html = `
        <div class="col s12 m12 l4 tarjeta_horario" id="${id}">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 right-align">
                                    <i class="material-icons icon-button" id="${id}" onclick="eliminarHorario(${id})">clear</i>
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
    console.log(data.fecha);

    const tarjeta = $(`.tarjeta_horario[id=${id}]`);
    tarjeta.hide();
    const date_pickers = tarjeta.find(".div_datepicker");
    const time_pickers = tarjeta.find(".div_timepicker");

    date_pickers.flatpickr({
        altFormat: "F j, Y",
        dateFormat: "F j, Y",
        //inline: true,
        mode: "multiple",
        minDate: data.fecha.charAt(0).toUpperCase() + data.fecha.slice(1),
        maxDate: data.fecha.charAt(0).toUpperCase() + data.fecha.slice(1),

        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        }
    });

    time_pickers.flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "G:i K",
        minDate: "8:00",
        maxDate: "16:00",
    });

    var tarjetaHorario = $(`.tarjeta_horario[id=${id}]`).children()
    tarjetaHorario.find("#txt_fecha").val(data.fecha);
    tarjetaHorario.find("#txt_hinicial").val(data.inicial);
    tarjetaHorario.find("#txt_hfinal").val(data.final);
    tarjeta.show(500);
}

const renderTarjeta = (id, proceso) => {

    const html = `
        <div class="col s12 m12 l4 tarjeta_horario" id="${id}">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 right-align">
                                    <i class="material-icons icon-button" id="${id}" onclick="eliminarHorario(${id})">clear</i>
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
        dateFormat: "F j, Y",
        //inline: true,
        mode: "multiple",
        conjunction: ";",
        /* "disable": [
             function(date) {
                 // return true to disable
                 return (date.getDay() === 0 || date.getDay() === 6);

             }
         ],*/
        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        },
        minDate: proceso.inicio.charAt(0).toUpperCase() + proceso.inicio.slice(1),
        maxDate: proceso.fin.charAt(0).toUpperCase() + proceso.fin.slice(1),

        /* enable: [{
                  from: "2019-01-01",
                  to: "2019-02-01"
              }]*/
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

var idProceso = 0;
var idTipoEvento = 0;

function setModalData(IDProceso, IDTipoEvento) { // 2>Entrevista   3>Dev. Resultados
    switch (IDTipoEvento) {
        case 2:
            $("#mdl_title").html("Gestionar horarios para Entrevistas");
            idTipoEvento = 2;
            break;
        case 3:
            $("#mdl_title").html("Gestionar horarios para Devolución de Resultados");
            idTipoEvento = 3;
            break;
        default:
            break;
    }
    $("#mdl_subtitle").html("Proceso " + IDProceso);
    idProceso = IDProceso;
    // ESCRIBIR CODIGO PARA RENDERIZAR TARJETAS DE HORARIOS EXISTENTES EN LA BASE DE DATOS
}

function cargarDatos() {
    $.ajax({
        url: 'assets/ajax/obtener_horarios_orientador.php',
        method: 'GET',
        data: 'idProceso=' + $('#id-proceso').val() + '&tipoEvento=' + idTipoEvento,
        success: function(data) {
            var datos = JSON.parse(data);
            console.log(datos)
            console.log(datos.length)
            if (!data.match(/Sin/g)) {
                for (var i = 0; i < datos.length; i++) {
                    renderTarjeta2(datos[i].codigohorario, datos[i]);
                }
            }
        }
    })


}

function obtenerHorarios() {
    var array_Horarios = [];
    var tarjetaHorario = $('#contenedor_tarjetas').children();
    for (var i = 0; i < tarjetaHorario.length; i++) {
        var fecha = $(tarjetaHorario[i]).find("#txt_fecha").val();
        var array_fechas = fecha.split(";");
        var h_inicial = $(tarjetaHorario[i]).find("#txt_hinicial").val();
        var h_final = $(tarjetaHorario[i]).find("#txt_hfinal").val();

        if (!fecha || !h_inicial || !h_final) {
            continue;
        }

        id_horario = $(tarjetaHorario[i]).attr("id");
        h_inicial = formatear_hora(h_inicial);
        h_final = formatear_hora(h_final);

        for (var m = 0; m < array_fechas.length; m++) {
            fecha = formatear_Fecha(array_fechas[m]);
            array_Horarios.push({
                "id_horario": id_horario,
                "idProceso": idProceso,
                "idTipoEvento": idTipoEvento,
                "fecha": fecha,
                "h_inicial": h_inicial,
                "h_final": h_final
            });
        }
        /*console.log(id_horario);
        console.log(idProceso);
        console.log(idTipoEvento);
        console.log(fecha);
        console.log(h_inicial);
        console.log(h_final);*/
    }
    var resultado = JSON.stringify(array_Horarios);

    return resultado;

}

function formatear_hora(hora) {
    var time = hora;
    var hours = Number(time.match(/^(\d+)/)[1]);
    var minutes = Number(time.match(/:(\d+)/)[1]);
    var AMPM = time.match(/\s(.*)$/)[1];
    if (AMPM == "PM" && hours < 12) hours = hours + 12;
    if (AMPM == "AM" && hours == 12) hours = hours - 12;
    var sHours = hours.toString();
    var sMinutes = minutes.toString();
    if (hours < 10) sHours = "0" + sHours;
    if (minutes < 10) sMinutes = "0" + sMinutes;
    return (sHours + ":" + sMinutes);
}

function formatear_Fecha(fecha) {
    Objeto_fecha = flatpickr.parseDate(fecha, "F j, Y");
    let fecha_con_formato = Objeto_fecha.getFullYear() + "-" + (Objeto_fecha.getMonth() + 1) + "-" + Objeto_fecha.getDate();
    return fecha_con_formato;
}

function guardarCambios(JsonHorarios) {
    console.log(JsonHorarios);
    $.ajax({
        url: "assets/ajax/guardar_horarios.php",
        method: "POST",
        data: "JsonHorarios=" + JsonHorarios,
        dataType: 'html',
        success: function(respuesta) {
            //$("#depuracion").html(respuesta);
            console.log(respuesta);
        }
    });
}

function eliminarHorario(id) {
    $.ajax({
        url: 'assets/ajax/eliminar_horario.php',
        method: 'POST',
        data: 'codigohorario=' + id,
        success: function(data) {
            console.log(data);
            if (!data.match(/Error/g)) {
                swal({
                    title: "Bien hecho!",
                    text: data,
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#2196F3",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                });
                
            }else{
                swal({
                    title: "Alerta!",
                    text: data,
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#2196F3",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                }, function(isConfirm) {
                    if (isConfirm) {
                        $('#mdl_horarios').closeModal();
                        $('body').attr('style', 'overflow-y: auto !important');
                        $("#contenedor_tarjetas").html("");
                    }
                });
            }
        }
    })
}