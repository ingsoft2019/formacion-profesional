var idhorariosorientador = '';
$(document).ready(function() {

    $('select').material_select();
    var $selectDropdown = $("#slc_proceso").empty().html(' ');
    $.ajax({
        url: "assets/ajax/agenda_peticiones.php",
        method: 'GET',
        data: "CODIGO_FUNCION=1",
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            console.log(respuesta);
            $selectDropdown.append($("<option></option>").attr("value", 0).text("Seleccione un Proceso"));
            for (var i = 0; i < respuesta.length; i++) {
                $selectDropdown.append($("<option></option>").attr("value", respuesta[i].idprocesos).text(respuesta[i].proceso));
            }
            $selectDropdown.trigger('contentChanged');
        }
    });
    const date_pickers = $(".div_date_picker");
    dates = date_pickers.flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d", //mismo formato en funcion mySql
        conjunction: ";",
        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        },
        minDate: "today",
        inline: true,
        // enableTime: true,
        /*onChange: function(selectedDates, formatDate, instance) {
            selectedDates.forEach(function(date) {
                fecha = flatpickr.formatDate(new Date(date), "F j, Y");
                //console.log(fecha);
                $("#spn_date").text(fecha);
            })
        }*/
    });


    $('select').on('contentChanged', function() {
        // re-initialize (update)
        $(this).material_select();

    });

    cargarDatos();

    $('label').on('contentChanged', function() {

    });

   /* $("[name='rb_hora']").click(function() {
        var label = $(this).prop("labels");
        text = $(label).text();
        //console.log(text)
        $("#spn_time").text(text);
    })

    $('#slc_proceso').on('change', function() {
        var optionsText = this.options[this.selectedIndex].text;
        //console.log(optionsText);
        $("#spn_proceso").text(optionsText);
    });

    $('#slc_evento').on('change', function() {
        var optionsText = this.options[this.selectedIndex].text;
        //console.log(optionsText);
        $("#spn_evento").text(optionsText);
    });
*/
    $('#slc_evento').on('change', function() {
        if ($("#slc_proceso").val() != 0 && $("#slc_evento").val() != 0) {
            llenarOrientadores();
        }
    });

    $('#slc_proceso').on('change', function() {
        if ($("#slc_proceso").val() != 0 && $("#slc_evento").val() != 0) {
            llenarOrientadores();
        }
    });

    $('#calendario_orientador').on('change', function() {
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=4&idhorariosorientador=" + idhorariosorientador,
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                console.log(respuesta);
                document.getElementById('Ltest').innerHTML = respuesta[0].h_inicial + " - " + respuesta[0].h_final;
            }
        });

    });

    $('#slc_orientador').on('change', function() {
        if ($("#slc_orientador").val() != 0) {
            llenarFechas();
        }
    });

    $("#btn_agendar").click(function() {
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=5&" + "idhorariosorientador=" + idhorariosorientador,
            dataType: 'json',
            success: function(respuesta) {
                console.log(respuesta);
            }
        });
        swal("Completo", "Citar reservada", "success");
        location.reload();
    });

    function cargarDatos() {
        $.ajax({
            url: "./assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=6",
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                console.log(respuesta);
                if(respuesta.length!=0){
                    console.log(respuesta.length)
                    for (var i = 0; i < respuesta.length; i++) {
                        renderTarjeta(respuesta[i].horariosorientador, respuesta[i]);   
                    }
                }
            }
        });
    }

    function llenarOrientadores() {
        // console.log("este es" + $("#slc_proceso").val());
        //console.log("este es" + $("#slc_evento").val());
        var idproceso = $("#slc_proceso").val();
        var tipoevento = $("#slc_evento").val();
        //$('select').material_select();
        var $selectDropdown = $("#slc_orientador").empty().html(' ');
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=2&idproceso=" + idproceso + "&tipoevento=" + tipoevento,
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                //console.log(respuesta);
                $selectDropdown.append($("<option></option>").attr("value", 0).text("Seleccione un orientador"));
                for (var i = 0; i < respuesta.length; i++) {
                    $selectDropdown.append($("<option></option>").attr("value", respuesta[i].idorientador).text(respuesta[i].orientador));
                }
                $selectDropdown.trigger('contentChanged');
            }
        });
    }

    function llenarFechas() {
        console.log($("#slc_proceso").val());
        console.log($("#slc_evento").val());
        console.log($("#slc_orientador").val());
        var idproceso = $("#slc_proceso").val();
        var tipoevento = $("#slc_evento").val();
        var orientador = $("#slc_orientador").val();
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=3&idproceso=" + idproceso + "&tipoevento=" + tipoevento + "&orientador=" + orientador,
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                console.log(respuesta);
                //var res=JSON.parse(respuesta);

                for (var i = 0; i < respuesta.length; i++) {
                    idhorariosorientador = respuesta[i].idhorariosorientador;
                    const date_pickers = $(".div_date_picker");
                    dates = date_pickers.flatpickr({
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d", //mismo formato en funcion mySql
                        conjunction: ";",
                        "locale": {
                            "firstDayOfWeek": 1 // start week on Monday
                        },
                        minDate: respuesta[i].fecha,
                        maxDate: respuesta[i].fecha,
                        inline: true,
                        //enableTime: true,
                        /*onChange: function(selectedDates, formatDate, instance) {
                            selectedDates.forEach(function(date) {
                                fecha = flatpickr.formatDate(new Date(date), "F j, Y");
                                //console.log(fecha);
                                $("#spn_date").text(fecha);
                            })
                        }*/
                    });
                }
            }
        });
    }

    const renderTarjeta = (id, data) => {

        const html = `
        <div class="col s12 m12 l4 tarjeta_cita" id="${id}">
            <div class="card-content row">
                <i class="material-icons icon-button" id="${id}" onclick="eliminarCita(${id})">clear</i>
                <div class="col s12 m6 l2">
                    <h6 class="vertical_align">
                        <i class="material-icons">loop</i>
                        <span id="spn_proceso">sin datos</span>
                    </h6>
                </div>
                <div class="col s12 m6 l2">
                    <h6 class="vertical_align">
                        <i class="material-icons">collections_bookmark</i>
                        <span id="spn_evento">Sin datos</span>
                    </h6>
                </div>
                <div class="col s12 m6 l2">
                    <h6 class="vertical_align">
                        <i class="material-icons">face</i>
                        <span id="spn_orientador">Sin datos</span>
                    </h6>
                </div>
                <div class="col s12 m6 l2">
                    <h6 class="vertical_align">
                        <i class="material-icons">event</i>
                        <span id="spn_date">Sin datos</span>
                    </h6>
                </div>
                <div class="col s12 m6 l2">
                    <h6 class="vertical_align">
                        <i class="material-icons">schedule</i>
                        <span id="spn_time">Sin datos</span>
                    </h6>
                </div>
                <div class="col s12 m6 l2">
                    <h6 class="vertical_align">
                        <i class="material-icons">location_on</i>
                        <span id="spn_lugar">Edificio de Registro</span>
                    </h6>
                </div>
            </div>
        </div>`;
        $("#Card-row").append(html);
        console.log(`${id}`);
        var tarjeta = $(`.tarjeta_cita[id=${id}]`).children()
        
        tarjeta.find("#spn_proceso").text(data.idprocesos);
        tarjeta.find("#spn_evento").text(data.tipoevento);
        tarjeta.find("#spn_orientador").text(data.nombres);
        tarjeta.find("#spn_date").text(data.fecha);
        tarjeta.find("#spn_time").text(data.h_inicial+"-"+data.h_final);
    }

});

function eliminarCita(id) {
    swal({
        title: "¿Seguro que desea eliminar la cita?",
        text: "Es posible que no pueda volver a agendar la misma cita.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2196F3",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: 'assets/ajax/agenda_peticiones.php',
                method: 'GET',
                data: 'CODIGO_FUNCION=7&idhorariosorientador=' + id,
                success: function(data) {
                    console.log(data);
                }
            })
            swal("Completo", "Cita eliminada", "success");
        }
    });
    location.reload();
}