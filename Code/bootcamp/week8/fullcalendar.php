<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.print.css">
<title>Full Callendar</title>
</head>
<body>

<div id="calendar"></div>
<script src="//code.jquery.com/jquery-2.1.3.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.js"></script>
<script>
$(document).ready(function(){
	$('#calendar').fullCalendar({
	
			events: [
        {
            title  : 'event1',
            start  : '2015-03-01'
        },
        {
            title  : 'event2',
            start  : '2015-03-05',
            end    : '2015-03-07'
        },
        {
            title  : 'event3',
            start  : '2015-03-09T12:30:00',
            allDay : false // will make the time show
        }
    ]
});

	
	});
</script>
</body>
</html>