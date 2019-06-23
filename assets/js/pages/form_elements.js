$(document).ready(function(){
    $('.datepicker').pickadate({
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysLetter: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        labelMonthNext: 'Mes siguiente',
        labelMonthPrev: 'Mes anterior',
        labelMonthSelect: 'Seleccione un mes',
        labelYearSelect: 'Seleccione un año',
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Cerrar',
        min: new Date(1960,1,1),
        max: new Date(2002,11,31),
        format: 'd !de mmmm !de yyyy',
        formatSubmit: 'yyyy/mm/dd',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 30 // Creates a dropdown of 15 years to control year
    });

    $('input.autocomplete').autocomplete({
        data: {
            "Apple": null,
            "Microsoft": null,
            "Google": 'assets/images/google.png'
        }
    });
});