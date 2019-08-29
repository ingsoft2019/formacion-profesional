var contador = 0;
$(document).ready(function() {
    render_section(crear_id(), "unique" + contador.toString());

    const date_pickers = $(".div_date_time_picker");
    // const time_pickers = $(".div_timepicker");

    dates = date_pickers.flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d", //mismo formato en funcion mySql
        conjunction: ";",
        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        },
        minDate: "today",
        // enableTime: true
    });


    $(".section_date_picker").flatpickr({
        altFormat: "F j, Y",
        dateFormat: "F j, Y",
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
        render_section(crear_id(), "unique" + contador.toString());
    });

    $(".sections_table_list").click(function(event) {
        if (event.target.className == "material-icons remove_button") {
            remove_section(event.target.getAttribute('data-id'));
            contador--;
        }
    });

    $('#txt_url_thorpe').on('input', function() {
        var input = $(this);
        console.log(input.val());

        var val = input.val();
        var valid = val.match(/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi)
        if (valid) { input.removeClass("invalid").addClass("valid");
            console.log('valid') } else { input.removeClass("valid").addClass("invalid");
            console.log('invalid') }
    });

    $('#txt_url_holland').on('input', function() {
        var input = $(this);
        console.log(input.val());

        var val = input.val();
        var valid = val.match(/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi)
        if (valid) { input.removeClass("invalid").addClass("valid");
            console.log('valid') } else { input.removeClass("valid").addClass("invalid");
            console.log('invalid') }
    });

    $('#btn_guardar_cambios').click(function() {
        let camposVacios = false;

        for (let d of dates) {
            if (d.selectedDates.length === 0) {
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
        if (camposVacios) return;

        if (dates[0].selectedDates[0].getTime() >= dates[1].selectedDates[0].getTime()) {
            mostrarError('Fechas incorrectas', 'Introduzca un rango de fechas válido para la etapa de Evaluación Grupal.')
            return;
        }

        if (dates[2].selectedDates[0].getTime() > dates[1].selectedDates[0].getTime()) {
            if (dates[2].selectedDates[0].getTime() >= dates[3].selectedDates[0].getTime()) {
                mostrarError('Fechas incorrectas', 'Introduzca un rango de fechas válido para la etapa de Test en Línea.')
                return;
            }
        } else {
            mostrarError('Fechas incorrectas', 'La etapa de Test en Línea debe comenzar después de la etapa de Evaluación Grupal.')
            return;
        }

        if (dates[4].selectedDates[0].getTime() > dates[3].selectedDates[0].getTime()) {
            if (dates[4].selectedDates[0].getTime() >= dates[5].selectedDates[0].getTime()) {
                mostrarError('Fechas incorrectas', 'Introduzca un rango de fechas válido para la etapa de Entrevista Pedagógica.')
                return;
            }
        } else {
            mostrarError('Fechas incorrectas', 'La etapa de Entrevista Pedagógica debe comenzar después de la etapa de Test en Línea.')
            return;
        }

        if (dates[6].selectedDates[0].getTime() > dates[5].selectedDates[0].getTime()) {
            if (dates[6].selectedDates[0].getTime() >= dates[7].selectedDates[0].getTime()) {
                mostrarError('Fechas incorrectas', 'Introduzca un rango de fechas válido para la etapa de Devolución de Resultados.')
                return;
            }
        } else {
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
                if (j === 1) {
                    secciones_correctas = true;
                    $(this).children().each(function(i) {
                        if ($(this).val() === '') {
                            mostrarError('Fecha de sección incorrecta', 'Ingrese una fecha para la sección: ' + id)
                            secciones_correctas = false
                        }
                    })
                    return secciones_correctas;
                }
                if (j === 2) {
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
                if (j === 3) {
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
                if (j === 4) {
                    secciones_correctas = true;
                    $(this).children().each(function(i) {
                        if ($(this).val() === '') {
                            mostrarError('Lugar de sección incorrecto', 'Ingrese un lugar para la sección: ' + id)
                            secciones_correctas = false
                        }
                    })
                    return secciones_correctas;
                }
                if (j === 5) {
                    secciones_correctas = true;
                    $(this).children().each(function(i) {
                        if ($(this).val() === '') {
                            mostrarError('Cupos de sección incorrectos', 'Ingrese una cantidad de cupos para la sección: ' + id)
                            secciones_correctas = false
                        }
                    })
                    return secciones_correctas;
                }
                // console.log(final, inicio)
                if ((final - inicio) !== 100) {
                    mostrarError('Horas de secciones erróneas', 'Corregir sección: ' + id);
                    secciones_correctas = false;
                }
            })
        })

        if (!secciones_correctas) return;


        //-------------- A partir de aquí se consideran válidas todas las fechas del proceso --------------------------
        console.log('pasa');
        //__________________________________________guardar datos de nuevo proceso_______________________________
        guardar_nuevo_proceso();
    })

});

var horasSecciones = [];

function render_section(id, conta) {

    const html = `
        <tr class="section_row" id="${id}">
            <td  class="getDatos" id="${conta}">${id}</td>
            <td class="getDatos">
                <input data-id="${id}" type="text" class="section_date_picker" placeholder="dia">
            </td>
            <td class="getDatos">
                <input data-id="${id}" type="text" class="section_timepicker horaInicio" placeholder="Hora Inicial">
            </td>
            <td class="getDatos">
                <input data-id="${id}" type="text" class="section_timepicker horaFin" placeholder="Hora final">
            </td>
            <td class="getDatos">
                <input data-id="${id}" type="text" class="section_place" placeholder="Lugar">
            </td>
            <td class="getDatos">
                <input data-id="${id}" type="number"  min="5" max="20" class="section_quota" placeholder="Cupos">
            </td>
            <td><i class="material-icons remove_button" data-id="${id}">remove_circle_outline</i>
            </td>
        </tr>
            `;
    $("#tbody_sections_list").append(html);
    contador++;

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

function mostrarError(titulo, mensaje) {
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

function guardar_nuevo_proceso() {
    var parametros = get_datos_procesos();
    console.log(parametros);
    $.ajax({
        url: "assets/ajax/transacciones_procesos.php",
        method: 'GET',
        data: parametros,
        dataType: 'html',
        success: function(respuesta) {
            console.log(respuesta);
            swal("Completo", "Procesos guardado.", "success");
        }
    });
}

function get_datos_procesos() {
    /*___________datos de evaluacion grupal______________________*/
    var secciones = get_secciones();
    /* 
    var ev_grupal = "id_ev_grup=" + $("#id_ev_grup").val()+ "&" +
                    "fecha_ev_grup=" + $("#fecha_ev_grup").val()+ "&" +
                    "hora_inicial_ev_grup=" + $("#hora_inicial_ev_grup").val()+ "&" +
                    "hora_final_ev_grup=" + $("#hora_final_ev_grup").val()+ "&" +
                    "lugar_ev_grup=" + $("#lugar_ev_grup").val()+ "&" +
                    "cupos_ev_grup=" + $("#cupos_ev_grup").val();*/
    /*___________datos de test en linea______________________*/

    var test = "fecha_inicio_test=" + $("#fecha_inicio_test").val() + "&" +
        "fecha_fin_test=" + $("#fecha_fin_test").val() + "&" +
        "url_test_vocacional=" + $("#txt_url_thorpe").val() + "&" +
        "url_test_personalidad=" + $("#txt_url_holland").val() + "&" +
        "clave_acceso=" + $("#txt_clave_acceso").val() + "&";
    /*___________datos de test en linea______________________*/
    var entrev = "fecha_inicio_entrev=" + $("#fecha_inicio_entrev").val() + "&" +
        "fecha_fin_entrev=" + $("#fecha_fin_entrev").val() + "&";
    /*___________datos de test en linea______________________*/
    var devoluc = "fecha_inicio_devoluc=" + $("#fecha_inicio_devoluc").val() + "&" +
        "fecha_fin_devoluc=" + $("#fecha_fin_devoluc").val();
    var inscripciones = "fecha_inicio_incripcion=" + $("#txt_inicio_inscrip").val() + "&" +
        "fecha_fin_incripcion=" + $("#txt_fin_inscrip").val() + "&"

    return secciones + inscripciones + test + entrev + devoluc;
}

function get_secciones() {
    var valores = "";
    var cantidad;
    $('#tbody_sections_list tr').each(function(i) {
            var x = 0;
            var celdas = $(this).find('input');

            celdas.each(function(j) {
                if (x == 0) {
                    idSeccionActual = $(this).attr("data-id");
                }
                var a = $(this).attr("placeholder");
                var b = a.replace(/ /g, "_");
                valores += b + i + "=" + $(this).val() + "&";
                x++;
            });
            cantidad = i;
            valores += "idSeccion" + i + "=" + idSeccionActual + "&"; //salta a la otra fila
            x = 0;
        })
        //console.log(valores)
    valores += "cantidadProcesosGuardar=" + cantidad + "&"
        //var respuesta = valores.replace(/ /g, "_");
        //console.log(valores)
    return valores;
}

/*############################################SECCION DE PRUEBAS#################################*/
/*$("#prueba").click(function(){
    guardar_nuevo_proceso();
});*/






















//inntancia 

/*$("#prueba").click(function(){
  $('#tbody_sections_list').each(function(i) {//secciones generales
          $(this).find("tr").each(function(i) {//los hijos son cada section_row
              valores +="idSeccion"+contador.toString()+"="+$(".tr").attr("id")+"&"+
                        "dia"+contador.toString()+"="+$(".section_date_picker").val()+"&"+
                        "horainicial"+contador.toString()+"="+$(".horaInicio").val()+"&"+
                        "horafinal"+contador.toString()+"="+$(".horaFin").val()+"&"+
                        "lugar"+contador.toString()+"="+$(".section_place").val()+"&"+
                        "cupos"+contador.toString()+"="+$(".section_quota").val() +"\n";
            contador++;
           })
          contador=0;
      })*/
/* $('#tbody_sections_list .section_row').each(function(i) {
        
        var idSeccionActual = $("td.obtenerIdSeccion#unique"+contador)[i].text();
        console.log(i+" ID de actual indice"+idSeccionActual);
        valores +="idSeccion"+numeroProceso.toString()+"="+$("input[data-id='"+idSeccionActual+"'] tr.section_row").attr("id")+"&"+
                          "dia"+numeroProceso.toString()+"="+$("input[data-id='"+idSeccionActual+"'].section_date_picker").val()+"&"+
                          "horainicial"+numeroProceso.toString()+"="+$("input[data-id='"+idSeccionActual+"'].horaInicio").val()+"&"+
                          "horafinal"+numeroProceso.toString()+"="+$("input[data-id='"+idSeccionActual+"'].horaFin").val()+"&"+
                          "lugar"+numeroProceso.toString()+"="+$("input[data-id='"+idSeccionActual+"'].section_place").val()+"&"+
                          "cupos"+numeroProceso.toString()+"="+$("input[data-id='"+idSeccionActual+"'].section_quota").val() +"\n";
        numeroProceso++; 
     })
        console.log(valores);
    var valores = "";
    var cantidad;
    $('#tbody_sections_list tr').each(function(i){
        var x=0;
        var celdas = $(this).find('input');
        
        celdas.each(function(j){ 
            if (x==0) {
                idSeccionActual=$(this).attr("data-id");
            }
            var a =$(this).attr("placeholder");
            var b =a.replace(/ /g, "_");
            valores+=b+i+"="+$(this).val()+"&";
            x++;
         });
        cantidad=i;
        valores+="idSeccion"+i+"="+idSeccionActual+"&";//salta a la otra fila
        x=0;
 })
    //console.log(valores)
    valores+="cantidadProcesosGuardar="+cantidad+"&"
    //var respuesta = valores.replace(/ /g, "_");
    console.log(valores)
    return valores;           

});

*/


/*

dia0=Mie_14,_Ago_2019&Hora_Inicial0=03:00_PM&Hora_final0=10:00_AM&Lugar0=B1&Cupos0=11&idSeccion0=201972235615862
&dia1=Mie_14,_Ago_2019&Hora_Inicial1=03:00_PM&Hora_final1=08:00_AM&Lugar1=C2&Cupos1=10&idSeccion1=201972235628779
&dia2=Mie_28,_Ago_2019&Hora_Inicial2=10:00_AM&Hora_final2=04:00_PM&Lugar2=B2&Cupos2=8&idSeccion2=201972235639280&cantidadProcesosGuardar=2&*/