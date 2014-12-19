$(document).ready(function () {
    var cal = $( '#calendar' );

    /*
     * initialize the calendar
     * -----------------------------------------------------------------
     */

    cal.fullCalendar({
        header : {
            left : 'prev,next today',
            center : 'title',
            right : 'month,agendaWeek,agendaDay'
        },
        titleFormat: {
            month: 'MMMM YYYY', // like "September 1986". each language will override this
            week: 'll', // like "Sep 4 1986"
            day: 'LL' // like "September 4 1986"
        },
        columnFormat: {
            month: 'ddd', // like "Sat"
            week: 'ddd D',
            day: 'dddd D' // like "Saturday"
        },

        editable : true,
        droppable : false,
        // Specific values
        theme : true,
        defaultView : 'agendaDay',
        slotDuration : '0:20:0',
        minTime : '9:00',
        maxTime : '20:00',
        dow : [ 1, 2, 3, 4, 5, 6 ],
        hiddenDays : [ 0 ],
        axisFormat: 'HH:mm',
        timeFormat: 'HH:mm',
        timezone : 'local',
        lang: 'fr',

        // ------------------------------------------------------
        // Add selection events
        // ------------------------------------------------------
        selectable: true,
        selectHelper: true,
        select: function(start, end) {
            var title = prompt('Event Title:');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end
                };
                cal.fullCalendar('renderEvent', eventData, true); // stick? = true
            }
            cal.fullCalendar('unselect');
        },


        // ------------------------------------------------------
        // Loads events
        // ------------------------------------------------------
        eventLimit : true, // allow "more" link when too many events
        events : {
            url : 'data/events.php?action=list',
            error : function() {
                $('#script-warning').show();
            }
        },
        loading : function(bool) {
            $('#loading').toggle(bool);
        },

        // ------------------------------------------------------
        // Events rendering
        // ------------------------------------------------------


    });
});

