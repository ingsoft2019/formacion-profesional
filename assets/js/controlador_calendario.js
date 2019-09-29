$(document).ready(function() {

    var calendarEl = document.getElementById('calendar');

    $.ajax({
        url: 'assets/ajax/calendario.php',
        method: 'POST',
        data: 'id-orientador=' + $('#idPersona').val(),
        success: function(data) {
            //console.log(data);
            data = JSON.parse(data)
            var urlResultados = 'calendario.php';
            var fechaActual = moment();
            var Check_enable = false;
            for (let horario of data) {

                if (horario.tipoevento == 2) {
                    horario.color = '#FCBE00'
                    horario.title = 'Entrevista: ' + (horario.nombres.split(" "))[0] + ' ' + (horario.apellidos.split(" "))[0]
                    horario.estado = horario.etapa3 == 1 ? true : false
                    horario.resultados = false
                    Check_enable = moment(fechaActual).isBetween(horario.fechainicioentrevista, horario.fechafinentrevista, 'day', '[]');
                } else {
                    horario.title = 'Dev. Resultados: ' + (horario.nombres.split(" "))[0] + ' ' + (horario.apellidos.split(" "))[0]
                    horario.estado = horario.etapa4 == 1 ? true : false
                    horario.resultados = true
                    Check_enable = moment(fechaActual).isBetween(horario.fechainiciodevuelveresultado, horario.fechafindevuelveresultado, 'day', '[]');
                    $.ajax({
                        url: 'assets/ajax/resultados_calendario.php',
                        method: 'POST',
                        data: "idProceso=" + horario.idprocesos + "&" + "idEstudiante=" + horario.idPersona,
                        dataType: 'json',
                        success: function(resultado) {
                            //console.log(horario.PdfUrl);                            
                            //console.log(resultado[0].urlPdf);
                            //return resultado[0].urlPdf;
                            urlResultados = resultado[0].urlPdf;
                        },
                        async: false
                    });
                }
                horario.start = moment(horario.fecha + ' ' + horario.h_inicial, 'YYYY-M-D HH:mm:ss').format().substr(0, 19);
                horario.end = moment(horario.fecha + ' ' + horario.h_final, 'YYYY-M-D HH:mm:ss').format().substr(0, 19);
                horario.classNames = ['cursorPointer'];
                horario.extendedProps = {
                    Id_check: 'e_' + horario.tipoevento + '_' + horario.idprocesos + '_' + horario.idPersona,
                    ID_Proceso: horario.idprocesos,
                    No_Identidad: horario.no_identidad,
                    ID_Estudiante: horario.idPersona,
                    Tipo_Evento: horario.tipoevento,
                    Estado_evento: horario.estado,
                    Mostrar_resultados: horario.resultados,
                    Pdf_Url: urlResultados,
                    Porcentaje: horario.porcentaje,
                    Nombre_Estudiante: horario.nombres + ' ' + horario.apellidos,
                    celular: horario.celular,
                    Proceso_inicio: moment(horario.fechainicio, 'YYYY-M-D', 'es').format('ddd, D MMM YYYY'),
                    Proceso_fin: moment(horario.fechafindevuelveresultado, 'YYYY-M-D', 'es').format('ddd, D MMM YYYY'),
                    Check_enable: Check_enable
                }


                delete horario['nombres'];
                delete horario['apellidos'];
                delete horario['celular'];
                delete horario['h_inicial'];
                delete horario['h_final'];
                delete horario['idPersona'];
                delete horario['idprocesos'];
                //console.log(horario);                
                //console.log(fechaActual);
                //console.log(horario.fechainicioentrevista);
                //console.log(horario.fechafinentrevista);
                //console.log(horario.fechainiciodevuelveresultado);
                //console.log(horario.fechafindevuelveresultado);
                //console.log(horario.extendedProps.Check_enable);

            }
            //console.log(data[0]);

            showCalendar(data);
        }
    })

    var events_array = [{
            id: '25',
            title: 'Entrevista',
            start: '2019-09-22T15:00:00',
            end: '2019-09-22T16:00:00',
            color: '#FCBE00',
            extendedProps: {
                ID_Proceso: '12',
                ID_Estudiante: '0801199833654',
                Nombre_Estudiante: 'Maria Elena Perez Costa',
                celular: '32304897',
            },
            classNames: ['cursorPointer']
        },
        {
            id: '26',
            title: 'Dev. Resultados',
            start: '2019-09-02T08:00:00',
            end: '2019-09-02T09:00:00',
            extendedProps: {
                ID_Proceso: '12',
                ID_Estudiante: '0801199833658',
                Nombre_Estudiante: 'Pedro Arturo Chavez Romero',
                celular: '32304897',
            },
            classNames: ['cursorPointer']
        }
    ];

    function showCalendar(data) {

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
            defaultView: 'listMonth',
            columnHeaderFormat: { weekday: 'short', day: 'numeric' },
            allDaySlot: false,

            views: {
                listDay: { buttonText: 'Día' },
                listWeek: { buttonText: 'Semana' },
                listMonth: { buttonText: 'Mes' }
            },
            header: {
                left: 'title',
                right: 'prev,next today'
            },
            footer: {
                right: 'listDay,listWeek,listMonth'
            },
            locale: 'es',
            height: "parent",

            events: data,
            eventRender: function(info) {
                var tooltip = new Tooltip(info.el, {
                    title: `
                                <div class="event_tooltip">
                                    <div class="info_list row left-align">
                                        <div class="valign-wrapper">
                                            <i class="material-icons col s2 m2 l2">donut_large</i>
                                            <span class="col s10 m10 l10 Identidad">Proceso No. ${info.event.extendedProps.ID_Proceso}</span>
                                        </div>
                                        <!--<div>
                                            <div class="chip">
                                                ${info.event.extendedProps.Proceso_inicio}
                                            </div>
                                            <div class="chip">
                                                ${info.event.extendedProps.Proceso_fin}
                                            </div>                                            
                                        </div>-->
                                        <!--<hr>-->
                                        <div class="valign-wrapper">
                                            <i class="material-icons col s2 m2 l2">fingerprint</i>
                                            <span class="col s10 m10 l10 Identidad">${info.event.extendedProps.No_Identidad}</span>
                                        </div>
                                        <div class="valign-wrapper">
                                            <i class="material-icons col s2 m2 l2">person</i>
                                            <span class="col s10 m10 l10 nombre">${info.event.extendedProps.Nombre_Estudiante}</span>
                                        </div>   
                                        <div class="valign-wrapper">
                                            <i class="material-icons col s2 m2 l2">local_phone</i>
                                            <span class="col s10 m10 l10 Celular">${info.event.extendedProps.celular}</span>
                                        </div>
                                        <div class="valign-wrapper"                                         
                                        ${info.event.extendedProps.Mostrar_resultados ? '':'style="display: none;"'}
                                        >
                                            <i class="material-icons col s2">done_all</i>
                                            <span class="col s10">                                                
                                                <a href="${info.event.extendedProps.Pdf_Url}" target="_blank">
                                                    Ver Resultados
                                                </a>
                                            </span>                                       
                                        </div>
                                        <div class="left-align chk_option" style="padding-left:10.5px">
                                                <input type="checkbox" class="filled-in" 
                                                    id="${info.event.extendedProps.Id_check}"
                                                    data-process="${info.event.extendedProps.ID_Proceso}" 
                                                    data-user="${info.event.extendedProps.ID_Estudiante}" 
                                                    data-event="${parseInt(info.event.extendedProps.Tipo_Evento) + 1}" 
                                                    data-progress="${info.event.extendedProps.Porcentaje}"
                                                    ${info.event.extendedProps.Estado_evento ?'checked="checked"':''}
                                                    onclick="actualizarProgreso()"
                                                    ${info.event.extendedProps.Check_enable? '':'disabled'}/>
                                                <label for="${info.event.extendedProps.Id_check}" class="black-text">
                                                    Confirmar Asistencia
                                                </label>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            `,
                    placement: 'bottom',
                    trigger: 'click',
                    container: 'body',
                    closeOnClickOutside: true,
                    html: true
                });
            }
        });

        calendar.render();
    }
});

function actualizarProgreso() {
    //estado_etapa, etapa, progreso, id_user, id_proceso
    var id_proceso = event.target.getAttribute('data-process');
    var id_user = event.target.getAttribute('data-user');
    var id_etapa = event.target.getAttribute('id');
    var estado_etapa = $("#" + id_etapa).is(':checked');
    var etapa = event.target.getAttribute('data-event');
    var progreso = parseInt(event.target.getAttribute('data-progress'));
    if (estado_etapa) {
        progreso += 25;
    } else {
        progreso -= 25;
    }
    $("#" + id_etapa).attr("data-progress", progreso);
    /* console.log(estado_etapa);
    console.log(etapa);
    console.log(progreso);
    console.log(id_user);
    console.log(id_proceso); */

    $.ajax({
        url: "assets/ajax/actualizar_progresos.php",
        method: "POST",
        data: "estado_etapa=" + estado_etapa + "&" + "etapa=" + etapa + "&" + "progreso=" + progreso + "&" + "id_user=" + id_user + "&id_proceso=" + id_proceso,
        dataType: 'html',
        success: function(respuesta) {
            //console.log(respuesta);
        }
    });
}