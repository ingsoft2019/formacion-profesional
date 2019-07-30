$(document).ready(function() {

    const date_pickers = $(".div_date_time_picker");
    // const time_pickers = $(".div_timepicker");

    date_pickers.flatpickr({
        altFormat: "F j, Y",
        dateFormat: "D j, M Y h:i K",
        conjunction: ";",
        "locale": {
            "firstDayOfWeek": 1 // start week on Monday
        },
        minDate: "today",
        enableTime: true
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