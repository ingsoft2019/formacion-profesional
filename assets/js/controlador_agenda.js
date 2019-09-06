var idhorariosorientador='';
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

    $('label').on('contentChanged', function() {

    });

    $("[name='rb_hora']").click(function() {
        var label = $(this).prop("labels");
        text = $(label).text();
        //console.log(text)
        $("#spn_time").text(text);
    })

    /*$('#slc_proceso').on('change', function() {
        var optionsText = this.options[this.selectedIndex].text;
        //console.log(optionsText);
        $("#spn_proceso").text(optionsText);
    });

    $('#slc_evento').on('change', function() {
        var optionsText = this.options[this.selectedIndex].text;
        //console.log(optionsText);
        $("#spn_evento").text(optionsText);
    });*/

    $('#slc_evento').on('change', function() {
        if($("#slc_proceso").val()!=0 && $("#slc_evento").val()!=0){
            llenarOrientadores();
        }
    });

    $('#slc_proceso').on('change', function() {
        if($("#slc_proceso").val()!=0 && $("#slc_evento").val()!=0){
            llenarOrientadores();
        }
    });

    $('#calendario_orientador').on('change', function() {
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=4&idhorariosorientador="+idhorariosorientador,
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                console.log(respuesta);
                document.getElementById('Ltest').innerHTML = respuesta[0].h_inicial+" - "+ respuesta[0].h_final;
            }
        });
       
    });
    
    $('#slc_orientador').on('change', function() {
        if($("#slc_orientador").val()!=0){
            llenarFechas();
        }
    });

    $("#btn_agendar").click(function() {
        swal("Completo", "Citar reservada", "success");
    });

    $(".btn_eliminar").click(function() {
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
                swal("Completo", "Cita eliminada", "success");
            }
        });
    });

    function llenarOrientadores(){
        console.log($("#slc_proceso").val());
        console.log($("#slc_evento").val());
        var idproceso=$("#slc_proceso").val();
        var tipoevento=$("#slc_evento").val();
        //$('select').material_select();
        var $selectDropdown = $("#slc_orientador").empty().html(' ');
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=2&idproceso="+idproceso+"&tipoevento="+tipoevento,
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                console.log(respuesta);
                $selectDropdown.append($("<option></option>").attr("value", 0).text("Seleccione un orientador"));
                for (var i = 0; i < respuesta.length; i++) {
                    $selectDropdown.append($("<option></option>").attr("value", respuesta[i].idorientador).text(respuesta[i].orientador));
                }
                $selectDropdown.trigger('contentChanged');
            }
        });
    }

    function llenarFechas(){
        console.log($("#slc_proceso").val());
        console.log($("#slc_evento").val());
        console.log($("#slc_orientador").val());
        var idproceso=$("#slc_proceso").val();
        var tipoevento=$("#slc_evento").val();
        var orientador=$("#slc_orientador").val();
        $.ajax({
            url: "assets/ajax/agenda_peticiones.php",
            method: 'GET',
            data: "CODIGO_FUNCION=3&idproceso="+idproceso+"&tipoevento="+tipoevento+"&orientador="+orientador,
            dataType: 'json', //data para saber que funcion en php usara.
            success: function(respuesta) {
                console.log(respuesta);
                //var res=JSON.parse(respuesta);
              
                for (var i = 0; i < respuesta.length; i++) {
                    idhorariosorientador=respuesta[i].idhorariosorientador;
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

});