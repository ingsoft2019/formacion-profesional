var idhorariosorientador = '';
$(document).ready(function() {
    
    $('select').material_select();

    $.ajax({
        url: "assets/ajax/agenda_peticiones.php",
        method: 'GET',
        data: "CODIGO_FUNCION=1",
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            console.log(respuesta);
            $('#txt-proceso').val(respuesta[0].proceso);
            $('#idprocesos').val(respuesta[0].idprocesos);
            $.ajax({
                url: "assets/ajax/agenda_peticiones.php",
                method: 'GET',
                data: "CODIGO_FUNCION=8",
                dataType: 'json', //data para saber que funcion en php usara.
                success: function(respuesta2) {
                    console.log(respuesta2)
                    $('#evento').val(respuesta2);
                    if (respuesta2 == 2) {
                        $('#txt-evento').val('Entrevista');
                    } else if(respuesta2 == 3) {
                        $('#txt-evento').val('Dev de resultados');
                    } else {
                        $('#txt-evento').val('No hay eventos disponibles');
                    }
                    if (respuesta2 != -1) {
                        llenarOrientadores(respuesta[0].idprocesos, respuesta2);
                    }
                    Materialize.updateTextFields();
                }
            });
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
        maxDate: "today",
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



    $('#calendario_orientador').on('change', function() {
        if (idhorariosorientador == '') {
            return;
        }
        
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=4&idhorariosorientador=" + idhorariosorientador + "&evento=" + $('#evento').val() + "&idprocesos=" + $('#idprocesos').val(),
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                console.log(respuesta);
                
                if(respuesta[1]) {
                    $("#btn_agendar").addClass('disabled');
                    $("#btn_agendar").attr('data-disabled', true);
                } else {
                    $("#btn_agendar").removeClass('disabled');
                    $("#btn_agendar").attr('data-disabled', false);
                }
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
        if ($(this).attr('data-disabled') == 'true') {
            return;
        }
        
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=5&" + "idhorariosorientador=" + idhorariosorientador,
            dataType: 'json',
            success: function(respuesta) {
                console.log(respuesta);
            }
        });
        swal({
            title: "Completo",
            text: "Cita reservada.",
            type: "success",
            showCancelButton: false,
            confirmButtonColor: "#2196F3",
            confirmButtonText: "Ok"
        }, function(isConfirm) {
                if (isConfirm) {
                    location.reload();
                }
            }
        );
        
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

    function llenarOrientadores(idProceso, tipoEvento) {
        var idproceso = idProceso;
        var tipoevento = tipoEvento;
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
        console.log($("#idprocesos").val());
        console.log($("#evento").val());
        console.log($("#slc_orientador").val());
        var idproceso = $("#idprocesos").val();
        var tipoevento = $("#evento").val();
        var orientador = $("#slc_orientador").val();
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=3&idproceso=" + idproceso + "&tipoevento=" + tipoevento + "&orientador=" + orientador,
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                console.log(respuesta);

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
                <div class="col s12 m6 l1">
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
                <div class="col s12 m12 l1">
                    <h6 class="vertical_align">
                        <i class="material-icons icon-button red-text" id="${id}" onclick="eliminarCita(${id})">clear</i>
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
                    swal({
                        title: "Completo", 
                        text: "Cita eliminada", 
                        type: "success"},
                        function() {
                            location.reload()
                        })
                }
            })
        }
    });
}