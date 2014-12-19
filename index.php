<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar-2.2.3/fullcalendar.css' rel='stylesheet' />
<link rel='stylesheet' href='fullcalendar-2.2.3/lib/cupertino/jquery-ui.min.css' />
<link href='docAppointments.css' rel='stylesheet' />
<link href='fullcalendar-2.2.3/fullcalendar.print.css' rel='stylesheet'
	media='print' />
<script src='fullcalendar-2.2.3/lib/moment.min.js'></script>
<script src='fullcalendar-2.2.3/lib/jquery.min.js'></script>
<script src='fullcalendar-2.2.3/lib/jquery-ui.custom.min.js'></script>
<script src='fullcalendar-2.2.3/fullcalendar.min.js'></script>

<!-- Doc appointments -->
<script src='fullcalendar-2.2.3/lang-all.js'></script>
<script src='docAppointments.js'></script>
</head>

<body>
	<div id='wrap'>

		<div id='external-events'>
			<h4>Draggable Events</h4>
			<div class='fc-event'>My Event 1</div>
			<div class='fc-event'>My Event 2</div>
			<div class='fc-event'>My Event 3</div>
			<div class='fc-event'>My Event 4</div>
			<div class='fc-event'>My Event 5</div>
			<p>
				<input type='checkbox' id='drop-remove' /> <label for='drop-remove'>remove
					after drop</label>
			</p>
		</div>

		<div id='calendar'></div>

		<div style='clear: both'></div>

	</div>
</body>
</html>
