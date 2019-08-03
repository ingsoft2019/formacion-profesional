$(document).ready(function() {

    render_section(crear_id());

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
        var input=$(this);
        console.log(input.val());
        
        var val = input.val();
        var valid = val.match(/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi)
        if(valid){input.removeClass("invalid").addClass("valid"); console.log('valid')}
        else{input.removeClass("valid").addClass("invalid"); console.log('invalid')}
    });

    $('#txt_url_holland').on('input', function() {
        var input=$(this);
        console.log(input.val());
        
        var val = input.val();
        var valid = val.match(/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi)
        if(valid){input.removeClass("invalid").addClass("valid"); console.log('valid')}
        else{input.removeClass("valid").addClass("invalid"); console.log('invalid')}
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

        var valid_thorpe = $('#txt_url_thorpe').val().match(/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi)
        if (!valid_thorpe) {
            mostrarError('URL incorrecta', 'Introduzca una URL válida para el primer test.');
            return;
        }
        
        var valid_holland = $('#txt_url_holland').val().match(/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi)
        if (!valid_holland) {
            mostrarError('URL incorrecta', 'Introduzca una URL válida para el segundo test.');
            return;
        }

        let secciones_correctas = true;
        $('.section_row').each(function(i) {
            let inicio;
            let final;
            let id;
            $(this).children().each(function(j) {
                // console.log(j)
                if (j === 0) {
                    id = this.innerHTML;
                    return true;
                }
                if (j === 1){
                    secciones_correctas = true;
                    $(this).children().each(function(i) {
                        if ($(this).val() === ''){
                            mostrarError('Fecha de sección incorrecta', 'Ingrese una fecha para la sección: ' + id)
                            secciones_correctas = false
                        }
                    })
                    return secciones_correctas;
                }
                if (j === 2){
                    secciones_correctas = true;
                    $(this).children().each(function(k) {
                        try {
                            inicio = parseInt($(this).val().split(':')[0]);
                            inicio = parseInt(horasMapeadas[inicio] + $(this).val().split(':')[1].split(' ')[0])
                        } catch (error) {
                            mostrarError('Horas de secciones vacías', 'Ingrese una hora en los campos de hora de la sección: ' + id);
                            secciones_correctas = false;
                        }
                    })
                    return secciones_correctas;
                }
                if (j === 3){
                    secciones_correctas = true;
                    $(this).children().each(function(k) {
                        try {
                            final = parseInt($(this).val().split(':')[0]);
                            final = parseInt(horasMapeadas[final] + $(this).val().split(':')[1].split(' ')[0])    
                        } catch (error) {
                            mostrarError('Horas de secciones vacías', 'Ingrese una hora en los campos de hora de la sección: ' + id);
                            secciones_correctas = false;
                        }
                    })
                    return secciones_correctas;
                }
                if (j === 4){
                    secciones_correctas = true;
                    $(this).children().each(function(i) {
                        if ($(this).val() === ''){
                            mostrarError('Lugar de sección incorrecto', 'Ingrese un lugar para la sección: ' + id)
                            secciones_correctas = false
                        }
                    })
                    return secciones_correctas;
                }
                if (j === 5){
                    secciones_correctas = true;
                    $(this).children().each(function(i) {
                        if ($(this).val() === ''){
                            mostrarError('Cupos de sección incorrectos', 'Ingrese una cantidad de cupos para la sección: ' + id)
                            secciones_correctas = false
                        }
                    })
                    return secciones_correctas;
                }
                // console.log(final, inicio)
                if((final - inicio) !== 100){
                    mostrarError('Horas de secciones erróneas', 'Corregir sección: ' + id);
                    secciones_correctas = false;
                }
            })
        })

        if(!secciones_correctas) return;


        //-------------- A partir de aquí se consideran válidas todas las fechas del proceso --------------------------
        console.log('pasa');
        
    })
    
});

var horasSecciones = [];

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
    
    let a = time_pickers.flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "G:i K",
        minDate: "8:00",
        maxDate: "16:00",
    });
    horasSecciones.push(a);
    
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

var horasMapeadas = {
    8: 8,
    9: 9,
    10: 10,
    11: 11,
    12: 12,
    1: 13,
    2: 14,
    3: 15,
    4: 16
}

function get_datos_procesos(){
    /*___________datos de evaluacion grupal______________________*/
    var ev_grupal = "id_ev_grup=" + $("#id_ev_grup").val()+ "&" +
                    "fecha_ev_grup=" + $("#fecha_ev_grup").val()+ "&" +
                    "hora_inicial_ev_grup=" + $("#hora_inicial_ev_grup").val()+ "&" +
                    "hora_final_ev_grup=" + $("#hora_final_ev_grup").val()+ "&" +
                    "lugar_ev_grup=" + $("#lugar_ev_grup").val()+ "&" +
                    "cupos_ev_grup=" + $("#cupos_ev_grup").val();
    /*___________datos de test en linea______________________*/
    var test = "fecha_inicio_test=" + $("#fecha_inicio_test").val()+ "&" +
               "fecha_fin_test=" + $("#fecha_fin_test").val()+ "&" +
               "url_test_vocacional=" + $("#txt_url_thorpe").val()+ "&" +
               "url_test_personalidad=" + $("#txt_url_holland").val()+ "&" +
               "clave_acceso=" + $("#txt_clave_acceso").val();
    /*___________datos de test en linea______________________*/
    var entrev = "fecha_inicio_entrev=" + $("#fecha_inicio_entrev").val()+ "&" +
                 "fecha_fin_entrev=" + $("#fecha_fin_entrev").val();
    /*___________datos de test en linea______________________*/
    var devoluc = "fecha_inicio_devoluc=" + $("#fecha_inicio_devoluc").val()+ "&" +
                 "fecha_fin_devoluc=" + $("#fecha_fin_devoluc").val();

    return ev_grupal+test+entrev+devoluc;
}

$("btn_guardar_cambios").click(function(){
        var parametros = get_datos_procesos();
        $.ajax({
        url: "assets/ajax/transacciones_procesos.php",
        method: 'GET',
        data: parametros,
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
        }
    });
});