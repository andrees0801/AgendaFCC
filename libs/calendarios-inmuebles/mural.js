!function($) {

	var CalendarApp = function() {
        this.$body = $("body")
        this.$calendar = $('#calendar-mural')
	};
	
	/* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date) { 
        var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
	},
	
	/* Initializing */
    CalendarApp.prototype.init = function() {

        
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

		var $this = this;

		$.ajax({
			method: 'GET',
			url: "obtener_fechas_solicitadas",
			data: { inmueble: 'Mural' }

		}).done(function(eventos) {
			eventos = JSON.parse(eventos);
			obtener_fechas($this, eventos);
		});

	},
	//init CalendarApp
	$.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
	

}(window.jQuery),

function($) {
	$.CalendarApp.init()
}(window.jQuery);


function obtener_fechas($this, defaultEvents)
{

	$this.$calendarObj = $this.$calendar.fullCalendar({

		//slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
		minTime: '08:00:00',
		maxTime: '19:00:00',  
		defaultView: 'month',  
		handleWindowResize: true,   
		
		header: {
			//left: 'prev,next today',
			//center: 'title'
			//right: 'month,agendaWeek,agendaDay'
		},
		events: defaultEvents,
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		eventLimit: true, // allow "more" link when too many events
		selectable: true,
		drop: function(date) { $this.onDrop($($this), date); }
	});
}
