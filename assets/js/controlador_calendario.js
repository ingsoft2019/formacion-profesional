$(document).ready(function () {

    var calendarEl = document.getElementById('calendar');

    $.ajax({
        url: 'assets/ajax/calendario.php',
        method: 'POST',
        data: 'id-orientador=' + $('#idPersona').val(),
        success: function (data) {
            console.log(data);

            data = JSON.parse(data)

            for (let horario of data) {
                if (horario.tipoevento == 2) {
                    horario.color = '#FCBE00'
                    horario.title = 'Entrevista'
                } else {
                    horario.title = 'Dev. Resultados'
                }
                horario.extendedProps = {
                    ID_Proceso: horario.idprocesos,
                    ID_Estudiante: horario.idPersona,
                    Nombre_Estudiante: horario.nombres + horario.apellidos,
                    celular: horario.celular
                }
                horario.start = moment(horario.fecha + ' ' + horario.h_inicial, 'YYYY-M-D HH:mm:ss').format().substr(0,19);
                horario.end = moment(horario.fecha + ' ' + horario.h_final, 'YYYY-M-D HH:mm:ss').format().substr(0,19);
                horario.classNames = ['cursorPointer'];

                delete horario['nombres'];
                delete horario['apellidos'];
                delete horario['celular'];
                delete horario['h_inicial'];
                delete horario['h_final'];
                delete horario['idPersona'];
                delete horario['idprocesos'];
            }
            console.log(data[0]);

            showCalendar(data);
        }
    })

    var events_array = [{
        id: '25',
        title: 'Entrevista',
        start: '2019-09-02T15:00:00',
        end: '2019-09-02T16:00:00',
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
            defaultView: 'timeGridWeek',
            columnHeaderFormat: { weekday: 'short', day: 'numeric' },
            allDaySlot: false,
            titleFormat: {
                year: 'numeric',
                month: 'short'
            },
            header: {
                left: 'title',
                right: 'prev,next today'
            },
            footer: {
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            locale: 'es',
            height: "parent",
            weekends: false,
            events: data,
            eventRender: function (info) {
                var tooltip = new Tooltip(info.el, {
                    title: `
                                <div class="event_tooltip">
                                    <div class="info_list row left-align">
                                        <div class="valign-wrapper">
                                            <i class="material-icons col s2 m2 l2">fingerprint</i>
                                            <span class="col s10 m10 l10 Identidad">${info.event.extendedProps.ID_Estudiante}</span>
                                        </div>
                                        <div class="valign-wrapper">
                                            <i class="material-icons col s2 m2 l2">person</i>
                                            <span class="col s10 m10 l10 nombre">${info.event.extendedProps.Nombre_Estudiante}</span>
                                        </div>   
                                        <div class="valign-wrapper">
                                            <i class="material-icons col s2 m2 l2">local_phone</i>
                                            <span class="col s10 m10 l10 Celular">${info.event.extendedProps.celular}</span>
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