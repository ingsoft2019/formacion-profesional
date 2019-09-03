$(document).ready(function() {

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
        onChange: function(selectedDates, formatDate, instance) {
            selectedDates.forEach(function(date) {
                fecha = flatpickr.formatDate(new Date(date), "F j, Y");
                //console.log(fecha);
                $("#spn_date").text(fecha);
            })
        }
    });


    $("[name='rb_hora']").click(function() {
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

    $('#slc_orientador').on('change', function() {
        var optionsText = this.options[this.selectedIndex].text;
        //console.log(optionsText);
        $("#spn_orientador").text(optionsText);
    });

    $("#btn_agendar").click(function() {
        swal("Completo", "Citar reservada", "success");
    });

    $("#btn_eliminar").click(function() {
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

});