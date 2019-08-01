$(document).ready(function() {

    const date_pickers = $(".div_date_time_picker");
    // const time_pickers = $(".div_timepicker");

    dates = date_pickers.flatpickr({
        altFormat: "F j, Y",
        dateFormat: "D j, M Y",
        conjunction: ";",
        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        },
        minDate: "today",
        // enableTime: true
    });

    $(".section_date_picker").flatpickr({
        altFormat: "F j, Y",
        dateFormat: "D j, M Y",
        conjunction: ";",
        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        },
        minDate: "today"
    });

    $(".section_timepicker").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "G:i K",
        minDate: "8:00",
        maxDate: "16:00",
    });

    /*time_pickers.flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "G:i K",
        minDate: "8:00",
        maxDate: "16:00",
    });*/

    $("#btn_agregar_seccion").click(function() {
        render_section(crear_id());
    });

    $(".sections_table_list").click(function(event) {
        if (event.target.className == "material-icons remove_button") {
            remove_section(event.target.getAttribute('data-id'));
        }
    });

    $('#txt_url_thorpe').on('input', function() {
        //TODO
        var input=$(this);
        console.log('on');
        
        var val = input.val();
        var valid = val.match(/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/g)
        if(valid){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
    });

    $('#btn_guardar_cambios').click(function() {
        let camposVacios = false;

        for (let d of dates){
            if(d.selectedDates.length === 0){
                camposVacios = true;
                swal({   
                    title: 'Campos vacíos',   
                    text: 'Llene todos los campos obligatorios.',
                    type: 'error',      
                    confirmButtonText: "Modificar datos",
                    closeOnConfirm: false 
                })
            }
        }
        if(camposVacios) return;
        
        if(dates[0].selectedDates[0].getTime() >= dates[1].selectedDates[0].getTime()){
            mostrarError('Fechas incorrectas','Introduzca un rango de fechas válido para la etapa de Evaluación Grupal.')
            return;
        }

        if(dates[2].selectedDates[0].getTime() > dates[1].selectedDates[0].getTime()){
            if(dates[2].selectedDates[0].getTime() >= dates[3].selectedDates[0].getTime()){
                mostrarError('Fechas incorrectas','Introduzca un rango de fechas válido para la etapa de Test en Línea.')
                return;
            }
        } else{
            mostrarError('Fechas incorrectas', 'La etapa de Test en Línea debe comenzar después de la etapa de Evaluación Grupal.')
            return;
        }

        if(dates[4].selectedDates[0].getTime() > dates[3].selectedDates[0].getTime()){
            if(dates[4].selectedDates[0].getTime() >= dates[5].selectedDates[0].getTime()){
                mostrarError('Fechas incorrectas','Introduzca un rango de fechas válido para la etapa de Entrevista Pedagógica.')
                return;
            }
        } else{
            mostrarError('Fechas incorrectas', 'La etapa de Entrevista Pedagógica debe comenzar después de la etapa de Test en Línea.')
            return;
        }

        if(dates[6].selectedDates[0].getTime() > dates[5].selectedDates[0].getTime()){
            if(dates[6].selectedDates[0].getTime() >= dates[7].selectedDates[0].getTime()){
                mostrarError('Fechas incorrectas','Introduzca un rango de fechas válido para la etapa de Devolución de Resultados.')
                return;
            }
        } else{
            mostrarError('Fechas incorrectas', 'La etapa de Devolución de Resultados debe comenzar después de la etapa de Evalución Pedagógica.')
            return;
        }
        


        //-------------- A partir de aquí se consideran válidas todas las fechas del proceso --------------------------
        console.log('pasa');
        
    })
    
});

function render_section(id) {
    const html = `
        <tr class="section_row" id="${id}">
            <td>${id}</td>
            <td>
                <input data-id="${id}" type="text" class="section_date_picker" placeholder="Seleccione el día">
            </td>
            <td>
                <input data-id="${id}" type="text" class="section_timepicker" placeholder="Hora Inicial">
            </td>
            <td>
                <input data-id="${id}" type="text" class="section_timepicker" placeholder="Hora final">
            </td>
            <td>
                <input data-id="123" type="text" class="section_place" placeholder="Lugar">
            </td>
            <td>
                <input data-id="${id}" type="number" class="section_quota" placeholder="Cupos">
            </td>
            <td><i class="material-icons remove_button" data-id="${id}">remove_circle_outline</i>
            </td>
        </tr>
            `;
    $("#tbody_sections_list").append(html);

    const section = $(`.section_row[id=${id}]`);
    section.hide();
    const date_pickers = section.find(".section_date_picker");
    const time_pickers = section.find(".section_timepicker");
    date_pickers.flatpickr({
        altFormat: "F j, Y",
        dateFormat: "D j, M Y",
        conjunction: ";",
        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        },
        minDate: "today"
    });

    time_pickers.flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "G:i K",
        minDate: "8:00",
        maxDate: "16:00",
    });

    section.show(500);
}

function crear_id() {
    var timestamp = new Date();
    id = "" + timestamp.getFullYear().toString() + timestamp.getMonth().toString() + timestamp.getDate().toString() + timestamp.getHours().toString() + timestamp.getMinutes().toString() + timestamp.getSeconds().toString() + timestamp.getMilliseconds().toString() + "";
    //console.log(id);
    return id;
}

function remove_section(id) {
    const section = $(`.section_row[id=${id}]`);
    section.hide("slow", function() { $(this).remove(); })
}

function mostrarError(titulo, mensaje){
    swal({
        title: titulo,
        text: mensaje,
        type: 'error',
        confirmButtonText: "Modificar datos",
        closeOnConfirm: false
    })
}