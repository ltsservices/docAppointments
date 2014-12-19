$(document).ready(function() {

	/*
	 * initialize the external events
	 * -----------------------------------------------------------------
	 */

	$('#external-events .fc-event').each(function() {

		// store data so the calendar knows to render an event upon drop
		$(this).data('event', {
			title : $.trim($(this).text()), // use the element's text as the
											// event title
			stick : true
		// maintain when user navigates (see docs on the renderEvent method)
		});

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex : 999,
			revert : true, // will cause the event to go back to its
			revertDuration : 0
		// original position after the drag
		});

	});

	/*
	 * initialize the calendar
	 * -----------------------------------------------------------------
	 */

	$('#calendar').fullCalendar({
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
		droppable : true, // this allows things to be dropped onto the
							// calendar
		drop : function() {
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
		},
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
				$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
			}
			$('#calendar').fullCalendar('unselect');
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
		}

	});

});