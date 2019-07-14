
jQuery(document).ready(function ($) {

   /* $('.div_datepicker').datepicker({
        language: 'es',    
        //range: true,
        multipleDates: true,
        minDate: new Date(), // Now can select only dates, which goes after today
        onRenderCell: function (date, cellType) {
            var disabledDays = [0, 6];
            if (cellType == 'day') {
                var day = date.getDay(),
                    isDisabled = disabledDays.indexOf(day) != -1;
    
                return {
                    disabled: isDisabled
                }
            }
        },
        onSelect: function (formattedDate, date, inst) {
            //alert(date);
        }
    });

    var time = new Date();
    time.setHours(8);
    time.setMinutes(0);

    $('.div_timepicker').datepicker({
        language: 'es',
        timepicker: true,
        classes: 'only-timepicker',
        minutesStep: 5,
        minHours: 8,
        maxHours: 16,
        startDate: time
    });


    $('.timepicker').timepicker({
        step:30,
        at_row:5,
        active_from:'08:00',
        active_to:'10:00',
        alarm_color:'#e73626'
    }); */


    $(".div_datepicker").flatpickr(
        {
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            //inline: true,
            mode: "multiple",
            conjunction: ";",
            "disable": [
                function(date) {
                    // return true to disable
                    return (date.getDay() === 0 || date.getDay() === 6);
        
                }
            ],
            "locale": {
                "firstDayOfWeek": 1 // start week on Monday
            },
            
            enable: [
                {
                    from: "2019-07-01",
                    to: "2019-08-01"
                },
                {
                    from: "2025-09-01",
                    to: "2025-12-01"
                }
            ]
        }
    );

    $(".div_timepicker").flatpickr(
        {
            enableTime: true,
            noCalendar: true,
            dateFormat: "G:i K",
            minDate: "8:00",
            maxDate: "16:00",
        }
    );


});